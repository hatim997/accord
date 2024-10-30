<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function indext()
  {
    return view('content.authentications.auth-login-t');
  }
  public function indexf()
  {
    return view('content.authentications.auth-loginf');
  }
  public function indexs()
  {
    return view('content.authentications.auth-login-s');
  }

}
