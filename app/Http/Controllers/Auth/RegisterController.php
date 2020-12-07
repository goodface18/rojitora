<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    private $userdata;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    //begin:: customize register page
    public function showRegistrationForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)?: redirect($this->redirectPath());

    }

    // end:: customize register page
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'corp_name' => 'required',
            'second_input' => 'required',
            'post_address' => 'required',
            'hello' => 'required',
            'third_input' => 'required',
            'tel' => 'required',
            'fax' => 'required',
            'email_address' => 'required|string|email|max:255|unique:users',
            'register_pwd'  => 'min:6|required_with:confirm_pwd|same:confirm_pwd',
            'confirm_pwd' => 'required',
            'contact_address' => 'required',
            'meeting_part' =>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $digits = 4;
        do {
            $digits_number = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $member_cnt = DB::table('users')->select('member_id')->where('member_id', '=',$digits_number)->get()->count();
        }while ($member_cnt <> 0);
        
       $this->userdata = User::create([
            'member_id' => $digits_number,
            'corp_name' => $data['corp_name'],
            'second_input' => $data['second_input'],
            'post_address' => $data['post_address'],
            'first_address' => $data['first_address'],
            'second_address' => $data['second_address'],
            'third_address' => $data['third_address'],
            'hello' => $data['hello'],
            'third_input' => $data['third_input'],
            'tel' => $data['tel'],
            'fax' => $data['fax'],
            'email_address' => $data['email_address'],
            'password' => bcrypt($data['register_pwd']),
            'contact_address' => $data['contact_address'],
            'meeting_part' => $data['meeting_part'],
        ]);
        return $this->userdata;

    }

    public function register_check($member_id){
        $data["userdata"] = User::where("member_id", $member_id)->first();
        return view("pages.register_check",$data);
    }

    public function forget(){
        $data['luggage_num'] = session('luggage_num');
        $data['emptycar_num'] = session('emptycar_num');
        return view("pages.forget",$data);
    }

    public function redirectTo(){
        $member_id = $this->userdata->member_id;
        $this->redirectTo = '/register_check/'.$member_id;
        return $this->redirectTo;
    }
}
