<?php

namespace App\Models\HP;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $connection = 'oldhp';
    protected $table = "config_colors";

}
