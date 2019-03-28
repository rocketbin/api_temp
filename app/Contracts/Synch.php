<?php
namespace App\Contracts;

use App\Models\HP\Color as HPColor;

interface Synch {

    /**
     * Synch to old HP colors
     *
     * @param  string  $event
     * @param  array  $data
     * @return void
     */
    public function synch(HPColor $hpc);

}