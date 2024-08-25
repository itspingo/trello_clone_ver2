<?php
  
namespace App\Http\Controllers\Frontend;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\settings;
use App\Models\user_settings_model;
use Illuminate\Support\Facades\DB;
use Session; 
use App\Models\User;
use Hash;
  
class Websiteauth extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
       
    }


    public function index()
    {
        
        // set_country_info();

        // $vsettings=settings::first();
        // if($vsettings->enable_maintenance_mode=='Y'){
        //     return redirect(url('under_maintenance'));
        // }
        // session()->put('sess_settings', $vsettings);

       
        return view('frontend.login');
    }  
      
   
    public function postLogin(Request $request)
    {
        // dd($request->post());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if (Auth::attempt($credentials)) {
                if(auth()->user()->account_type == 'Admin'){
                     //return redirect()->intended('frontend/dashboard');
                     Session::flush();
                     Auth::logout();
               
                     return Redirect('login')->with('flash_failure', 'Invalid login credentials');
                }else{

                    $userAgent = $request->userAgent();
                    $user_settings = user_settings_model::where('web_user_id',auth()->user()->id)->first(); 
                    session()->put('sess_user_settings',$user_settings);
                    
                    User::where('id',auth()->user()->id)->update([
                                                                    'browser_agent' => $userAgent,
                                                                    'login_date_time' => date('Y-m-d H:i:s'),
                                                                    'login_ip'=> getenv("REMOTE_ADDR")
                                                                ]);
                    if(auth()->user()->account_type == 'teacher'){
                        return redirect()->intended('dashboard');
                    }elseif(auth()->user()->account_type == 'student'){
                        return redirect()->intended('diary');
                    }
                        //->withSuccess('You have Successfully loggedin');
                   
                }
               
            }
        }else{
            return redirect(route("login"))->with('flash_failure','You have entered invalid credentials');
        }
  
        return redirect(route("login"))->with('flash_failure','You have entered invalid credentials');
    }
      
    
    public function register()
    {
        // $vsettings=settings::first();
        // if($vsettings->enable_maintenance_mode=='Y'){
        //     return redirect(url('under_maintenance'));
        // }
        // session()->put('sess_settings', $vsettings);
        
        //dd($data);

        return view('frontend.register');
    }

    public function postRegister(Request $request)
    {  
        // $vsettings=settings::first();
        // if($vsettings->enable_maintenance_mode=='Y'){
        //     return redirect(url('under_maintenance'));
        // }
        // session()->put('sess_settings', $vsettings);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        // dd($data);
        //  DB::enableQueryLog();
        // $check = User::create($data)->id;



        $upperCaseRegex = '/[A-Z]/';
        $specialCharRegex = '/[^a-zA-Z0-9]/'; // Matches any character that is not alphanumeric
        $numberRegex = '/[0-9]/';
        $lengthRegex = '/^.{7,}$/'; // Matches strings of at least 7 characters
        $pasword_errors=[];

        // if(null != session('sess_settings') && session()->get('sess_settings')->password_min_length != ''){
        //     if(!preg_match($lengthRegex, $data['password'])){
        //         $pasword_errors[] = "Password must be at least ".session()->get('sess_settings')->password_min_length." characters";    
        //     }        
        // }
        // if(null != session('sess_settings') && session()->get('sess_settings')->required_uppercase == 'Y'){
        //     if(!preg_match($upperCaseRegex, $data['password'])){
        //         $pasword_errors[] = "Password must have at least one upper case character";
        //     }
        // }

        // if(null != session('sess_settings') && session()->get('sess_settings')->required_digit == 'Y'){
        //     if(!preg_match($numberRegex, $data['password'])){
        //         $pasword_errors[] = "Password must have at least one digit";
        //     }
        // }

        // if(null != session('sess_settings') && session()->get('sess_settings')->required_special_char == 'Y'){
        //     if(!preg_match($specialCharRegex, $data['password'])){
        //         $pasword_errors[] = "Password must have at least one special character";
        //     }
        // }

        if(!empty($pasword_errors)){
            return redirect()->back()->with('flash_failure',$pasword_errors);
        }



        $validation_code = randomWord(10); 
        $usrData = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'account_type' => $data['account_type'],
            'state' => $data['state'],
            'city' => $data['city'],
            'street_address' => $data['street_address'],
            'zip_post_code' => $data['zip_post_code'],
            'phone' => $data['phone'],
            'validation_code'=>$validation_code
        );

        // dd($usrData);

    
        $usrId =  User::create($usrData)->id;
        if($usrId){
            generate_invoice('signup', $usrId);
            $emailData = array(
                'user_name'=>$data['name'],
                'user_email'=>$data['email'],
                'validation_code'=>$validation_code
            );
            if(null != session('sess_settings') && session()->get('sess_settings')->signup_confirmation == 'Y'){
                $retval = sendEmail('user_registration',$emailData);
                if($retval){
                    $mesg = 'An email is sent for validation';
                }else{
                    $mesg = 'Email could not be sent for verifiation';
                }

            }else{
                $mesg = 'Registration is successful, plase login';
            }

            return redirect("login")->with('flash_success',);
        }

        //   dd(DB::getQueryLog());
        
    }
    
    
    public function validate_user($validation_code)
    {
      $user = User::where('validation_code', $validation_code)->first();
        if ($user) {
            $user->email_verified_at = now(); 
            $user->validation_code = NULL; 
            $user->save();
            return redirect(url("login"))->with('flash_success','Your account is validated. Please login');
        } else {
            return redirect(url("login"))->with('flash_failure','Invalid validation code');
        }
    }


    public function dashboard()
    {
        // $vsettings=settings::first();
        // if($vsettings->enable_maintenance_mode=='Y'){
        //     return redirect(url('under_maintenance'));
        // }
        // session()->put('sess_settings', $vsettings);

        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
   
    public function logout() {
       
        User::where('id',auth()->user()->id)->update([
                                                        'browser_agent' => NULL,
                                                        'login_date_time'=>NULL,
                                                        'login_ip'=>NULL
                                                    ]);
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
