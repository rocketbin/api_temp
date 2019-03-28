<?php
namespace App\Services;

use App\Models\HP\Color as HPColor;
use App\Models\Color;

class SynchService {

  private $hpc;
  protected $model;

  public function __construct (HPColor $hpc, $model) {
    $this->hpc = $hpc;
    $this->model = $model;
  }

  public function Synch () {
    return $this->model->synch($this->hpc);
  }

}
