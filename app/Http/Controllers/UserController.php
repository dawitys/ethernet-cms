<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    protected $model = User::class;
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', '!=', $request->user['id'])->select('username as title', 'id', 'updated_at')->get();

        return [
            'success'   => true,
            'data'      => $users
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('username', $request->body["username"])->first();

        if(isset($user)) {
            return  response([
                'success'   => false,
                'errors'    => ["Username already taken"]
            ]);
        }


        $user = new User;
        $user->username = $request->body["username"];
        $user->password = Hash::make($request->body["password"]);
        $user->save();
        return  response([
            'success'   => true,
            'data'      => $user
        ]);
    }
}
