<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// Use App\Models\Admin\UserModel;
// Use App\Models\Admin\RoleModel;
// use App\Models\Admin\RolerightModel;
// use App\Models\Admin\MenuModel;
// use App\Models\Admin\ControllersOtherActionModel;
// use App\Models\Admin\UserTypeModel;
// use App\Models\Admin\ControllerModel;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Redirect;
use Waavi\Sanitizer\Sanitizer;
use DB;
use Mail;
use Config;
use URL;
class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user_roles;
     public function __construct()
    {
        $this->user_roles = Session::get('user_roles');
    }

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRegister(Request $request)
    {
        return 1;
    }
//     public function getLogin(Request $request)
//     {
//        $data  = array(
//          "email"    => $request->get('email'),
//          "password" => $request->get('password')
//         );
//         $filters = [
//          'email'    => 'trim|escape',
//          'password' => 'trim|escape'
//         ];
//         $sanitizer  = new Sanitizer($data, $filters);
//         $data=$sanitizer->sanitize();
//         $rules = array(
//             'email'     => 'Required',
//             'password'  => 'Required|Between:6,20'
//         );
//         $v = Validator::make($data, $rules);
//         if( $v->fails() ){
//             $errors = $v->errors()->toArray();
//             $data = array(  'status'  => false,
//                             'message' => 'invalid',
//                             'error'   => $errors  );
//             echo json_encode($data);
//         } else {
//             $key="naacproject";
//             $email = $data['email'];
//             $pass  = md5($data['password'].$key);
//             $admin = new UserModel();
//             $adin = $admin->checkAdminUser($email,$pass);
//             if($adin['user_id'] !="")
//              {

//                 $admin = UserModel::find($adin['user_id']);

//                 if($adin['user_status'] == '1') {
//                     $roles = $admin->getRoleIdsAttribute();
//                     if(count($roles) >0) {
//                     //getting modules
//                     $role_ids = join("','",$roles);
//                     /*$modules =   DB::select("select distinct admin_menus.module_id,admin_modules.module_name,admin_modules.module_icon
//                                             from admin_rolerights
//                                             join admin_menus on admin_menus.controller_id = admin_rolerights.controller_id
//                                             join admin_modules on admin_modules.module_id = admin_menus.module_id
//                                             where admin_rolerights.role_id in ('$role_ids')"); */

//                     $modules = DB::table('admin_rolerights')
//                             ->join('admin_menus', 'admin_menus.controller_id', '=', 'admin_rolerights.controller_id')
//                             ->join('admin_modules', 'admin_modules.module_id', '=', 'admin_menus.module_id')
//                             ->wherein('admin_rolerights.role_id',$roles)->distinct()
//                             ->select('admin_menus.module_id','admin_modules.module_name','admin_modules.module_icon')->get();
//                     $modules = json_decode(json_encode($modules),True);
//                     if(count($modules)>0) {
//                       $default_mod = $modules[0]['module_id'];
// //                      $default_mod = 76;
//                       Session::put('default_module'   , $default_mod);
//                     }
//                     Session::put('modules'   , $modules);
//                    }
//                     $user_type = UserTypeModel::find($adin['usertype']);
//                     Session::put('userid'   , $adin['user_id']);
//                     Session::put('email_address' , $adin['email_address']);
//                     Session::put('user_name' , $adin['name']);
//                     Session::put('user_type', $adin['usertype']);
//                     Session::put('user_type_name', $user_type['user_type_name']);
//                     Session::put('user_roles', $roles);

//                     $this->save_login_history();

//                     $data = array( 'status'  => true,
//                                    'message'  => 'valid',
//                                    'status'   =>  $adin['user_status'] );
//                     echo json_encode($data);
//                 } else {
//                     $data = array( 'status'  => true,
//                                    'message'  => 'valid',
//                                    'status'   =>  $adin['user_status'] );
//                     echo json_encode($data);
//                 }
//              } else {
//                  $errors = array("msg"=> "Invalid Email/Username Or Password");
//                  $data   = array( 'status'  => false,
//                                 'message'  => 'invalid',
//                                 'error'      => $errors );
//                  echo json_encode($data);
//              }
//         }
//     }
//     public function logout()
//     {
//       $this->save_logout_history();
//       Session::flush();
//       return Redirect::to('/');
//     }
//     public function generate_OTP(Request $request)
//     {
//         if($request->generate == 1) {
//              $string = '0123456789';
//              $string_shuffled = str_shuffle($string);
//              $otp = substr($string_shuffled, 1, 6);
//              Session::put('otp', $otp);

//              //send OTP via email

//              $user_id = Session::get('userid');
//              $user_details = UserModel::find($user_id);

//              $email_from = Config::get('mail.from');
//              $data = array('email_to' => $user_details->email_address ,
//                            'email_name' => $user_details->username ,
//                            'otp' => $otp);
//              $sent = Mail::send('test.otpmail',compact('data','email_from'), function($message) use ($data,$email_from) {
//                $message->to($data['email_to'],$data['email_name'])->subject('OTP Verification Naac');
//                $message->from($email_from['address'],$email_from['name']);
//              });
//              //$user_details->otp    = $otp;
//             /// $user_details->save();
//              $data = array( 'status' => true,
//                             'message'  => 'OTP Send Successfully via Email',
//                             'otp' => $otp );
//              echo json_encode($data);

//         }
//     }
//     public function check_otp(Request $request)
//     {
//       if($request->otp_number != '') {
//             $otp = Session::get('otp');
//             if($request->otp_number == $otp)
//             {
//               $data = array( 'status' => true,
//                              'message'  => 'OTP verified Successfully');
//             } else {
//               $data = array( 'status' => false,
//                              'message'  => 'OTP verification failed');
//             }
//             echo json_encode($data);
//           }

//     }
//     public function save_login_history()
//     {
//         $user_roles = Session::get('user_roles');
//         $user_roles = implode(',', $user_roles);
//         $ipaddress  = request()->server('REMOTE_ADDR');
//         $useragent = request()->server('HTTP_USER_AGENT');
//         $device = $this->systemInfo();
//         $data = array("user_id"     => Session::get('userid'),
//                        "login_time" => "'".date('Y-m-d H:i:s')."'",
//                        "roles_string" => $user_roles,
//                        "ipaddress" => $ipaddress,
//                        "useragent" => $useragent,
//                       "device_type" =>$device);
//         DB::table('admin_login_history')->insert($data);
//       }
//     public function save_logout_history()
//     {
//         $last_login_id = DB::table('admin_login_history')->select('login_id')->orderBy('login_id', 'desc')->where('user_id',Session::get('userid'))->value('login_id');

//         DB::table('admin_login_history')
//           ->where('login_id',$last_login_id )
//           ->update(['logout_time' => "'".date('Y-m-d H:i:s')."'"]);
//             echo json_encode(array('status' => true,'message'  => 'Updated'));
//     }
//     public function get_last_login_details()
//     {
//        $last_login_entry = DB::table('admin_login_history')->orderBy('login_id', 'desc')->where('user_id',Session::get('userid'))->first();
//        $last_login_entry = json_decode(json_encode($last_login_entry), True);
//        echo json_encode(array('status' => true,'last_login_details'  => $last_login_entry));
//     }

//     public function generate_password_reset(Request $request)
//     {
//       if($request->email_address != '') {
//          $data  = array('email'  => $request->email_address);
//          $rules = array('email'  => 'Required|email');
//          $v = Validator::make($data, $rules);
//          if( $v->fails() ){
//               $errors = $v->errors()->toArray();
//               $data = array( 'status'   => false,
//                              'message'  => 'invalid',
//                              'error'    =>  $errors   );
//               echo json_encode($data);
//          } else {
//               $user_details = UserModel::where('email_address', $request->email_address)->first()->toArray();
//               //->value('user_id','user_status');
//               if($user_details['user_id'] != '') {
//                   if($user_details['user_status'] == '0') {
//                     $data = array( 'status'   => false,
//                                    'message'  => 'inactive',
//                                    'error'    => 'There is no account is not active'   );
//                   } else {
//                         $KEY = "somethingreallylonglonglonglonglongandsecret";
//                         $email = $user_details['email_address'];
//                         $time = time();
//                         $hash = md5( $user_details['user_id'] . $time . $KEY);
//                         $url  = URL::to("/admin/reset_password_form?id=".$user_details['user_id']."&timestamp=".$time."&hash=".$hash);
//                         $email_from = Config::get('mail.from');
//                         $data1 = array('email_to' => $email ,
//                                       'email_name' => $user_details['username'] ,
//                                       'url' => $url);
//                         $sent = Mail::send('test.passwordresetmail',compact('data1','email_from'), function($message) use ($data1,$email_from) {
//                            $message->to($data1['email_to'],$data1['email_name'])->subject('Naac - Link to reset your password');
//                            $message->from($email_from['address'],$email_from['name']);
//                          });

//                   }
//                   $data = array( 'status'   => true,
//                                  'message'  => 'valid',
//                                  'success'  => 'Please check your registered email for password reset option');
//                   echo json_encode($data);
//               } else {
//                 $data = array( 'status'   => false,
//                                'message'  => 'invalid',
//                                'error'    => 'There is no account is present in this email address');
//                 echo json_encode($data);
//               }
//         }
//      }

//     }
//     public function reset_password_form(Request $request)

//     {
//       $KEY       = "somethingreallylonglonglonglonglongandsecret";
//       $user_id   =  $request->id;
//       $timestamp =  $request->timestamp;
//       $hash      =  $request->hash;
//       $method = $request->method();
//       if ($hash == md5( $user_id . $timestamp . $KEY ))
//       {
//           if ( time() - $timestamp > (3600*24) ) {
//               echo 'link expired';exit;
//           }

//       } else if ($request->isMethod('post')) {
//         $data  = array('password'  => $request->password , 'password_confirmation'  => $request->password_confirmation );
//         $rules = array('password' => 'required|min:6'    , 'password_confirmation' => 'required|min:6|same:password');
//         $v = Validator::make($data, $rules);
//         if( $v->fails() ){
//              $errors = $v->errors()->toArray();
//              $data = array( 'status'   =>  false,
//                             'message'  => 'invalid',
//                             'error'    =>  $errors   );
//              echo json_encode($data);exit;
//         } else {
//           UserModel::where('user_id', $request->user_id)->limit(1)->update(array('password' => $request->password));
//           $data = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Your password updated Successfully'   );
//           echo json_encode($data);exit;
//         }
//       } else {
//           echo 'invalid parameters';exit;
//       }
//       return view('test.reset_password_form')->with('user_id',$user_id);
//     }
//     public function change_password(Request $request)
//     {
//       $data  = array('password'  => $request->password , 'password_confirmation'  => $request->password_confirmation );
//       $filters = [
//          'password'    => 'trim|escape',
//          'password_confirmation' => 'trim|escape'
//         ];
//         $sanitizer  = new Sanitizer($data, $filters);
//         $data=$sanitizer->sanitize();
//       $rules = array('password' => 'required|min:6'    , 'password_confirmation' => 'required|min:6|same:password');
//       $v = Validator::make($data, $rules);
//        if( $v->fails() ){
//            $errors = $v->errors()->toArray();
//            $data = array( 'status'   =>  false,
//                           'message'  => 'invalid',
//                           'error'    =>  $errors   );
//            echo json_encode($data);exit;
//        } else {
//          $key="naacproject";
//          $pass  = md5($request->old_password.$key);
//         $exist_user = UserModel::where(array('user_id' => $request->user_id , 'password' => $pass))->value('user_id');
//         if($exist_user != '') {
//           $newpass=md5($request->password.$key);
//           UserModel::where('user_id', $request->user_id)->limit(1)->update(array('password' =>$newpass));
//           $message = 'A Request to reset  Password has been made for your account,
//           your password is reset You may now use new Password to login ';
//           //mail
//           $show_pass=$request->password;
//           $email_from = Config::get('mail.from');
//           $data1 = array('email_to' => Session::get('email_address') ,
//                         'email_name' => Session::get('user_name') ,
//                         'pass_word'  => $show_pass,
//                         'message' => $message);
//           $sent = Mail::send('hei.change_password_mail',compact('data1','email_from'), function($message) use ($data1,$email_from) {
//              $message->to($data1['email_to'],$data1['email_name'])->subject('NAAC - Password Change Mail');
//              $message->from($email_from['address'],$email_from['name']);
//            });
//           $data = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'You password updated Successfully'   );

//         } else {
//           $error['password'] = 'Invalid Old Password';
//           $data = array( 'status'   =>  true , 'message'  => 'invalid', 'error'  =>  $error  );
//         }
//         echo json_encode($data);exit;
//        }
//     }
//     public function is_user_active(Request $request)
//     {
//         $user_details = UserModel::find($request->user_id)->toArray();
//         if($user_details['user_status'] == '1')
//           echo json_encode(array('status'   =>  true,  "user_status"=> 1 , 'message'=>'User is active'));
//         else
//           echo json_encode(array('status'   =>  false, "user_status" => 0 ,'message' =>'User is inactive'));
//     }
//     public function is_super_user(Request $request)
//     {
//         $user_details = UserModel::find($request->user_id)->toArray();
//         if($user_details['usertype'] == '1')
//             echo json_encode(array("status"=> true   ,'message'=>'Super User'));
//         else
//             echo json_encode(array("status" => false ,'message' =>'Not a super user'));
//     }
//     public function is_email_verified(Request $request)
//     {
//           $user_id   =  $request->id;
//           if($user_id != '') {
//             UserModel::where('user_id', $request->user_id)->limit(1)->update(array('email_verified' => 1));
//             $data = array( 'status'   =>  true , 'success'=> 'You email verified Successfully');
//           } else {
//             $data = array( 'status'   =>  false , 'success' => 'Invalid Parameters');
//           }
//           echo json_encode($data);exit;

//     }
//     public function get_external_link(Request $request)
//     {
//           $user_id   =  $request->id;
//           if($user_id != '') {
//             $user_details =  UserModel::find($request->user_id)->toArray();
//             $data = array( 'status'   =>  true, 'ext_id' => $user_details['ext_id'] , 'ext_type' => $user_details['ext_type']);
//           }
//     }
//     public function get_assigned_roles(Request $request)
//     {
//       $admin = UserModel::find($request->user_id);
//        $roles = array();
//        foreach($admin->adminroles as $adminroles) {
//              $roles['role_ids'][] = $adminroles->role_id;
//              $roles['role_names'][] =$adminroles->role_name;
//        }
//       echo json_encode(array("status"=> true,'roles' =>$roles));

//     }
//     public function get_controller_right($controller_id,$action)
//     {
//       $user_roles = Session::get('user_roles');
//       foreach($user_roles as $user_role) {
//           switch($action)
//           {
//             case 'view'   :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id , 'role_id' => $user_role))->value('view_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'insert' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('insert_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'delete' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('delete_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'update' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('update_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'index' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('index_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'verify' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('verify_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'approve':
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('approve_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             default       :
//                           $action_id = ControllersOtherActionModel::where(array('controller_id'=> $controller_id,'action_name' => $action))->value('controller_action_id');
//                           if($action_id == '')
//                              $right = 0;
//                           else
//                              $right = 1;
//                           break;
//           }
//       if($right == 1) break;
//     }
//        return $right;
//       //echo json_encode(array("status"=> true,'right' =>$right));
//     }
//     public function get_menu_right(Request $request)
//     {
//       $menu_id       =  $request->menu_id;
//       $action        =  $request->action;
//       $controller_id = MenuModel::where('menu_id' ,$menu_id)->value('controller_id');
//       $user_roles = Session::get('user_roles');
//       if($controller_id != '') {
//       foreach($user_roles as $user_role) {
//           switch($action)
//           {
//             case 'view'   :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id , 'role_id' => $user_role))->value('view_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'insert' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('insert_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'delete' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('delete_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'update' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('update_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'index' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('index_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'verify' :
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('verify_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             case 'approve':
//                           $right = RolerightModel::where(array('controller_id'=> $controller_id, 'role_id' => $user_role))->value('approve_flg');
//                           $right = (($right == 1) ? 1 : 0);
//                           break;
//             default       :
//                           $action_id = ControllersOtherActionModel::where(array('controller_id'=> $controller_id,'action_name' => $action))->value('controller_action_id');
//                           if($action_id == '')
//                              $right = 0;
//                           else
//                              $right = 1;
//                           break;
//           }
//           if($right == 1) break;
//         }
//         echo json_encode(array("status"=> true,'right' =>$right));
//       } else {
//         echo json_encode(array("status"=> false,'message' =>'Invalid Parameters'));
//       }

//     }
//     public function get_rights_given_menu(Request $request)
//     {
//       $menu_id       =  $request->menu_id;
//       $controller_id = MenuModel::where('menu_id' ,$menu_id)->value('controller_id');
//       $actions = array();
//       $user_roles = Session::get('user_roles');
//       if($controller_id != '') {
//         foreach($user_roles as $user_role) {
//           $userRights = RolerightModel::where(array('controller_id'=> $controller_id,'role_id' => $user_role))->first();
//           if($userRights['insert_flg'] == 1 && !in_array('insert',$actions))
//                 array_push($actions, 'insert');
//           if($userRights['update_flg'] == 1 && !in_array('update',$actions))
//                 array_push($actions, 'update');
//           if($userRights['delete_flg'] == 1 && !in_array('delete',$actions))
//                 array_push($actions, 'delete');
//           if($userRights['view_flg'] == 1 && !in_array('view',$actions))
//                 array_push($actions, 'view');
//           if($userRights['index_flg'] == 1 && !in_array('index',$actions))
//                 array_push($actions, 'index');
//           if($userRights['verify_flg'] == 1 && !in_array('verify',$actions))
//                 array_push($actions, 'verify');
//           if($userRights['approve_flg'] == 1 && !in_array('approve',$actions))
//                 array_push($actions, 'approve');

//           $action_name = DB::table('admin_controllers_otheractions as ACO')
//                   ->join('admin_rolerights_other_actions as AROA', 'AROA.controller_action_id', '=', 'ACO.controller_action_id')
//                   ->where('ACO.controller_id', '=', $controller_id)
//                   ->where('AROA.role_id', '=', $user_role)
//                   ->select('ACO.action_name')->get();
//                   $action_name = json_decode(json_encode($action_name),True);
//                   foreach ($action_name as $k => $v){
//                     if(!in_array($v['action_name'],$actions))
//                        array_push($actions, $v['action_name']);
//                   }
//         }
//           echo json_encode(array("status"=> true,'actions' =>$actions));
//       } else {
//         echo json_encode(array("status"=> false,'message' =>'Invalid Parameters'));
//       }
//     }
//     public function get_rights_given_controller($controller_id=0,$controller_name=null)
//     {
//       if($controller_name != '')
//       {
//         $controller_id       =  ControllerModel::where('controller_name' ,$controller_name)->value('controller_id');
//       }
//       $actions = array();
//       $user_roles = Session::get('user_roles');
//       if($controller_id != '') {
//         foreach($user_roles as $user_role) {
//           $userRights = RolerightModel::where(array('controller_id'=> $controller_id,'role_id' => $user_role))->first();
//           if($userRights['insert_flg'] == 1 && !in_array('insert',$actions))
//                 array_push($actions, 'insert');
//           if($userRights['update_flg'] == 1 && !in_array('update',$actions))
//                 array_push($actions, 'update');
//           if($userRights['delete_flg'] == 1 && !in_array('delete',$actions))
//                 array_push($actions, 'delete');
//           if($userRights['view_flg'] == 1 && !in_array('view',$actions))
//                 array_push($actions, 'view');
//           if($userRights['index_flg'] == 1 && !in_array('index',$actions))
//                 array_push($actions, 'index');
//           if($userRights['verify_flg'] == 1 && !in_array('verify',$actions))
//                 array_push($actions, 'verify');
//           if($userRights['approve_flg'] == 1 && !in_array('approve',$actions))
//                 array_push($actions, 'approve');

//           $action_name = DB::table('admin_controllers_otheractions as ACO')
//                   ->join('admin_rolerights_other_actions as AROA', 'AROA.controller_action_id', '=', 'ACO.controller_action_id')
//                   ->where('ACO.controller_id', '=', $controller_id)
//                   ->where('AROA.role_id', '=', $user_role)
//                   ->select('ACO.action_name')->get();
//                   $action_name = json_decode(json_encode($action_name),True);
//                   foreach ($action_name as $k => $v){
//                     if(!in_array($v['action_name'],$actions))
//                        array_push($actions, $v['action_name']);
//                   }
//         }
//         if(count($actions)>0)
//           return json_encode(array("status"=> true,'actions' =>$actions));
//         else
//           return json_encode(array("status"=> false,'message' =>'Permission Denied'));
//       } else {
//          return json_encode(array("status"=> false,'message' =>'Invalid Parameters'));
//       }

//     }
//     public function get_available_menus($module_id)
//     {

//       if($module_id)
//       {
//           $menus = MenuModel::tree($module_id)->toArray();
//           echo json_encode(array("status"=> true,'menus' =>$menus));
//       } else {
//           echo json_encode(array("status"=> false,'message' =>'Invalid Parameters'));
//       }
//     }
//     public function get_menu_text($module_id)
//     {
//          Session::put('default_module'   , $module_id);
//          $menus = MenuModel::tree($module_id)->toArray();
//          $module_name = DB::table('admin_modules')->where('module_id',$module_id)->value('module_name');
//          echo $this->render_menu($menus,$module_name);
//     }
//     public function render_menu($menus,$module_name='') {

//       $html = '';
//       if($module_name != '')
//         $html =  '<ul class="sidebar-menu sidebar-custom-menu"> <li class="header">'.strtoupper($module_name).'</li>';

//       foreach($menus as $menu){
//         if(count($menu['children'])>0) {
//           $html.=  '<li class="treeview">';
//           $html.=  '<a href="#"><span>'.$menu['menu_name'].'</span> <i class="fa fa-angle-left pull-right"></i></a>';
//           $html.=  '<ul  class="treeview-menu" id="myTab">';
//             foreach($menu['children'] as $child) {
//                 if(isset($child['children']) && count($child['children'])>0) {
//                   $html.=  $this->render_menu1($child);
//                 } else {
//                   $html.=  "<li>";
//                   $html.=  '<a href="'.URL::to($child['route_path']).'">'.$child['menu_name'].'</a>';
//                   $html.=  "</li>";
//                 }
//             }
//               $html.=  "</li>";
//             $html.=  '</ul>';
//         }
//         else{
//           $html.=  '<li>'.'<a href="'.URL::to($menu['route_path']).'"><span>'.$menu['menu_name'].'</span> </a>';
//         }
//       }
//       $html.=  '</ul>';
//       return $html;
//     }
//     public function render_menu1($menus) {  //print_r($menus);exit;
//               $html='<li class="treeview">';
//               $html.=  '<a href="#"><span>'.$menus['menu_name'].'</span> <i class="fa fa-angle-left pull-right"></i></a>';
//               $html.=  '<ul  class="treeview-menu" id="myTab">';
//                 foreach($menus['children'] as $child) {
//                   if(isset($child['children']) && count($child['children'])>0) {
//                     $html.=  $this->render_menu1($child);
//                   } else {
//                     $html.=  "<li>";
//                     $html.=  '<a href="'.URL::to($child['route_path']).'">'.$child['menu_name'].'</a>';
//                     $html.=  "</li>";
//                   }
//                 }
//                 $html.=  "</li>";
//                 $html.=  '</ul>';
//               $html.=  '</li>';
//         return $html;
//     }
//     public function adminerror()
//     {
//         return view('errors.adminerr');
//     }
//     public static function systemInfo()
//     {
//       $user_agent = $_SERVER['HTTP_USER_AGENT'];
//       $os_platform    = "Unknown OS Platform";
//       $os_array       = array('/windows phone 8/i'    =>  'Windows Phone 8',
//                               '/windows phone os 7/i' =>  'Windows Phone 7',
//                               '/windows nt 6.3/i'     =>  'Windows 8.1',
//                               '/windows nt 6.2/i'     =>  'Windows 8',
//                               '/windows nt 6.1/i'     =>  'Windows 7',
//                               '/windows nt 6.0/i'     =>  'Windows Vista',
//                               '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
//                               '/windows nt 5.1/i'     =>  'Windows XP',
//                               '/windows xp/i'         =>  'Windows XP',
//                               '/windows nt 5.0/i'     =>  'Windows 2000',
//                               '/windows me/i'         =>  'Windows ME',
//                               '/win98/i'              =>  'Windows 98',
//                               '/win95/i'              =>  'Windows 95',
//                               '/win16/i'              =>  'Windows 3.11',
//                               '/macintosh|mac os x/i' =>  'Mac OS X',
//                               '/mac_powerpc/i'        =>  'Mac OS 9',
//                               '/linux/i'              =>  'Linux',
//                               '/ubuntu/i'             =>  'Ubuntu',
//                               '/iphone/i'             =>  'iPhone',
//                               '/ipod/i'               =>  'iPod',
//                               '/ipad/i'               =>  'iPad',
//                               '/android/i'            =>  'Android',
//                               '/blackberry/i'         =>  'BlackBerry',
//                               '/webos/i'              =>  'Mobile');
//       $found = false;

//       $device = '';
//       foreach ($os_array as $regex => $value)
//       {
//           if($found)
//            break;
//           else if (preg_match($regex, $user_agent))
//           {
//               $os_platform    =   $value;
//               $device = !preg_match('/(windows|mac|linux|ubuntu)/i',$os_platform)
//                         ?'MOBILE':(preg_match('/phone/i', $os_platform)?'MOBILE':'SYSTEM');
//           }
//       }
//       $device = !$device? 'SYSTEM':$device;
//       return $device.'-'.$os_platform;
//       //return array('os'=>$os_platform,'device'=>$device);
//    }
}
