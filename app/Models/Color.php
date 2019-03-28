<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Synch;
use App\Models\HP\Color as HPColor;


class Color extends Model implements Synch
{
    protected $guarded = [];
    public function synch(HPColor $hpc) {
      $hpcolor = HPColor::get();
      $errors = [];
      foreach ($hpcolor as $hp) {
        try {
          $this->create([
            'name' => $hp->name,
            'colors' => $hp->colors,
            'agency' => $hp->agencygroup,
            'active' => $hp->active,
            'type' => $hp->type,
          ]);
        } catch (Exception $e) {
          array_push($errors,[
            'name' => $hp->name,
            'colors' => $hp->colors,
            'message' => $e->getMessage()
          ]);
        }
      }
       $this->pushSynch($errors);
    }

    public function pushSynch(array $errors) {
      if(!empty($errors)) {
        return [
          'errors'    => sizeof($days),
          'status'    => 'incomplete',
          'messages'  => $errors,
        ];
      }
      return [
        'status' => 'complete'
      ];
    }
    
}
