<?php

namespace App\Http\Controllers\Panel;

use App\Models\User\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
      $user = Auth::user();
      $qr_count = $user->qr_codes->count();
      $user_codes_ids = $user->qr_codes->pluck('id')->toArray();
      $visits = Visit::whereIn('code_id', $user_codes_ids)->get()->sum('view_count');

      return view('dashboard', compact([
         'user', 'qr_count', 'visits'
      ]));
   }
}
