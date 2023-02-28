<?php

namespace App\Http\Controllers\Panel;

use Str;
use Auth;
use App\Models\User\Qr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
      $qr_codes = Qr::where('user_id', Auth::id())->latest()->get();
      return view('panel.qr.index', compact('qr_codes'));
   }

   public function create()
   {
      return view('panel.qr.create');
   }

   public function store(Request $request)
   {
      //Crear las reglas de validación
      $rules = [
         'content' => 'required'
      ];

      //Validar que sí se esté pasando información
      $customMessages = [
         'required' => 'Este campo es requerido.'
      ];

      $this->validate($request, $rules, $customMessages);

      //Obtener el último QR creado
      $id = Qr::latest()->first();

      if ($id) {
         $id = $id->id + 1;
      } else {
         $id = 1;
      }

      //Asignar una URL y un código de manera aleatoria
      $str = Str::random(4);
      $code = $id . $str;
      //$slug = 'https://qr.bepro.digital/code/' . $code; 
      $slug = env('APP_URL') . $code;

      //Asignar el nombre a la imagen (QR)
      $imageName = 'img-' . $code . '.svg';

      //Especificar/Obtener el tipo de QR a generar 
      switch ($request->qrType) {
         case ('email'):
            //Crear las reglas de validación
            $rules = [
               'content' => 'required|email',
               'subject' => 'required|min:4|max:50',
               'message' => 'required|min:5|max:300'
            ];

            //Validar que sí se esté pasando información
            $customMessages = [
               'required' => 'Este campo es requerido.',
               'email' => 'Este campo debe ser un correo electrónico válido',
               'subject.min' => 'Este campo requiere mínimo 4 caracteres',
               'subject.max' => 'Este campo requiere máximo 50 caracteres',
               'message.min' => 'Este campo requiere mínimo 5 caracteres',
               'message.max' => 'Este campo requiere máximo 300 caracteres'
            ];

            $this->validate($request, $rules, $customMessages);

            //email, subject, message
            $image = QrCode::margin(2)->format('svg')->size(500)->errorCorrection('H')->email($request->content, $request->subject, $request->message);
            break;
         default:
            $image = QrCode::margin(2)->format('svg')->size(500)->errorCorrection('H')->generate($slug);
      }

      $content = $request->content;

      //Guardar la imagen
      $path = 'images/' . $imageName;
      Storage::disk('public')->put($path, $image);

      //Guardar el registro en la base de datos
      $qr_code = Qr::create([
         'code' => $code,
         'slug' => $slug,
         'path' => $path,
         'redirect_to' => $content, //Website, Text,...
         'type' => $request->qrType,
         'user_id' => Auth::id(),
      ]);

      //Informar al usuario que se ha creado el QR
      Session::flash('info', ['success', 'Se ha creado el código QR']);
      return back();
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {
      //
   }

   public function update(Request $request, $id)
   {
      //
   }

   public function destroy($id)
   {
      //
   }
}
