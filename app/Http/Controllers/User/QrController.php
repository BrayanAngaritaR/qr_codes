<?php

namespace App\Http\Controllers\User;

use App\Models\User\Qr;
use App\Models\User\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class QrController extends Controller
{
   public function show(Qr $code)
   {
      //Verificar si ya tenemos una visita
      $code_visit = Visit::where('code_id', $code->id)->first();

      if ($code_visit) {
         $view_count = $code_visit->view_count + 1;

         //Generar esa visita
         $code_visit->update([
            'view_count' => $view_count
         ]);
      } else {
         //Registrar esa primera visita
         $visit = Visit::create([
            'view_count' => 1,
            'code_id' => $code->id
         ]);
      }

      //Procede a mostrar la información del QR
      switch ($code->type) {
         case ('website'):
            return Redirect::to($code->redirect_to);
            break;

         default:
            return view('user.qr.show', compact('code'));
      }
   }
}
