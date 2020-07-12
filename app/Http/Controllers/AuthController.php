<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function userAdd() {
        return view('user.add');
    }


    public function saveUser(CreateUserRequest $request)
    {


//        $user =  [
//            'name'=> $request->input('name'),
//            'password' => $request->input('password'),
//            'email' => $request->input('email'),
//            'phone' => $request->input('phone')
//        ];
//        (new User())->addUsers($user);
        User::create($request->validated());

        return redirect()->route('allUser');
    }

    public function allUser() {
        return view('user.all',['users' => User::all()]);
    }
}
