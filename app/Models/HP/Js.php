<?php

namespace App\Models\HP;

use Illuminate\Database\Eloquent\Model;

class Js extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'js_id';
    protected $connection = 'oldhp';
    protected $table = 'js';
    public $timestamps = false;
    
}
