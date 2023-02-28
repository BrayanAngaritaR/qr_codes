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

      //Generar la imagen
      $image = QrCode::margin(2)->format('svg')->size(500)->errorCorrection('H')->generate($slug);

      //Guardar la imagen
      $path = 'images/' . $imageName;
      Storage::disk('public')->put($path, $image);

      //Especificar/Obtener el tipo de QR a generar 
      switch ($request->qrType) {
         case ('email'):
            dd("Es un email, agregar nuevos campos");
            break;
         default:
            $content = $request->content;
      }

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
