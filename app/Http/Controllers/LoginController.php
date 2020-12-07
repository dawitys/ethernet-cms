<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->body['username'])->first();
        if(!isset($user) || !$user) {
            return [
                'success'   => false,
                'errors'    => ['User not found']
            ];
        }

        if(!Hash::check($request->body['password'], $user->password)) {
            return [
                'success'   => false,
                'errors'    => ['Password do not match']
            ];
        }

        $token = $this->generateRandomString(100);
        $user->token = $token;
        $user->save();

        return [
            'success'   => true,
            'data'      => [
                'token'         => $token,
                'username'      => $user->username
            ]
        ];
    }

    /**
     * Genrate random string
     */
    private function generateRandomString($length = 10): string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_"}[]\;[';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
