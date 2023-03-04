<?php

namespace App\Http\Controllers\User;

use App\Models\User\Qr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class QrController extends Controller
{
   public function show(Qr $code)
   {
      switch ($code->type) {
         case ('website'):
            return Redirect::to($code->redirect_to);
            break;

         default:
            return view('user.qr.show', compact('code'));
      }
   }
}
