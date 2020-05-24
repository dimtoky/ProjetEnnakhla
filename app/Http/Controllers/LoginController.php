<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect()->route('main');
}
}
