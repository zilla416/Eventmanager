<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginPage()
    {
        return view('login'); // login.blade.php inside resources/views/auth/
    }
}
