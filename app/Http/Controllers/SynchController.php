<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\HP\Color as HPColor;
use App\Services\SynchService;
class SynchController extends Controller
{

  /*
  *
  * boot synch colors 
  */
  public function synchColors (Color $color) {
    $synch = new SynchService((new HPColor) , $color);
    return response()->json($synch->Synch(),200);

  }
}
