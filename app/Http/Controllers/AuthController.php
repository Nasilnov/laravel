<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function userAdd() {
        return view('user.add');
    }

    public function saveUser(CreateUserRequest $request)
    {

        $userArr = include storage_path('app/public/users.php');
        $userArr[] =  [
            'login' => $request->input('login'),
            'name'=> $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ];

        $string = "<?php\n return ".var_export($userArr, true).';';
        file_put_contents(storage_path('app/public/users.php'),  $string);

//        return view('news.edit', ['news' => $newsArr[$id], 'id' => $id, 'save' => '1']) ;
        return redirect()->route('allUser');
    }

    public function allUser() {
        $userArr = include storage_path('app/public/users.php');
        return view('user.all',['users' => $userArr]);
    }
}
