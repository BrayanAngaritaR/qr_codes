<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
   use HasFactory;

   protected $table = 'qr_codes';
   protected $fillable = ['code', 'slug', 'path', 'redirect_to', 'type', 'user_id'];

   public function getRouteKeyName()
   {
      return 'code';
   }
}
