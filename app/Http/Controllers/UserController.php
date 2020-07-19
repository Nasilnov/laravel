<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function save(Request $request)
    {
        $user = \Auth::user();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['sometimes', 'nullable', 'string', 'min:8', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id ],
            'password' => ['required'],
            'newpassword' => ['sometimes', 'nullable', 'string', 'min:8'],
        ]);

        if(Hash::check($request->input('password'), $user->password)) {
            $password = ($request->input('newpassword') !== NULL) ? $request->input('newpassword') : $request->input('password');
            $user->fill([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => Hash::make($password),
            ]);
        }

        else {
            $errors['password'][] = 'Неверно введен текущий пароль';
            return redirect()->route('account')->withErrors($errors);
        }

        $user->save();
        return redirect()->route('account')->with('message', 'Сохранено');
    }
}
