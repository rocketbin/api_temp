<?php
namespace App\Services;

class hpService {

  public static function GetConfig ($conf) {
    
      $config = config('homeprezzo.driver');
      $disk = config('homeprezzo.default.driver');
      return $config[$disk][$conf];
  }

  public static function GetAll () {

      $config = config('homeprezzo.driver');
      $disk = config('homeprezzo.default.driver');
      return $config[$disk];
  }

  public static function GetUser () {

      return config('homeprezzo.firstuser');
  }
}
