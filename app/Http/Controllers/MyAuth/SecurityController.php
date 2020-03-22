<?php

namespace App\Http\Controllers\MyAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyModel\UserModel;
class SecurityController extends Controller
{
  public function getRegister(Request $request)
  {
    $data  = array(
      "email"    => $request->post('email'),
      "password" => $request->post('password')
     );


     UserModel::updateOrCreate(['email' => $request->post('email'), 'password' => $request->post('password')]);        
   
        return response()->json(['success'=>'Product saved successfully.']);


      // return $data;
  }
}
