<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

use App\Models\User;
class Scene extends Model
{
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:l, F d, Y',
        'updated_at' => 'date:l, F d, Y',
    ];

    public static function validate (Request $request) {
      $request->validate([
        'data'  => 'required',
        'init'  => 'required',
      ]);
    }

    public function user () {
      return $this->belongsTo(User::class, 'user_id');
    }
}
