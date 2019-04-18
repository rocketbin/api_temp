<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use Hash;

use Illuminate\Http\Request;
use App\Services\hpService;
use App\Models\User;

class AuthController extends Controller
{

  protected function login(Request $request) {
      $credentials = $request->only('email', 'password');
      $user = User::where('email', $request->email)->first();
      if ($token = JWTAuth::attempt($credentials)) {
        return $this->returnToken($token,$user);
      } else {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
  }

  private function attempt ($password, $hash) {
    $crypt = crypt($password, hpService::GetConfig('hashkey'));
    return $crypt === $hash;
  }

  public function returnToken ($token, User $user) {
      return response()->json([
          'token' => $token,
          'user' => $user,
          'expires' => auth('api')->factory()->getTTL() * 60,
      ]);
  }

}

