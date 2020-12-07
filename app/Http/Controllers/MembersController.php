<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class MembersController extends Controller
{
    //
      public function __construct(){

      }
    //
    public function edit(Request $request){
      $this->middleware('auth');
      $data['user'] = $request->user();
      $data['luggage_num'] = session('luggage_num');
      $data['emptycar_num'] = session('emptycar_num');
      return view('pages.memberedit', $data);
    }
    //
    public function memberedit_old(Request $request){
      $this->middleware('auth');
      $data['user'] = $request->user();
      $data['luggage_num'] = session('luggage_num');
      $data['emptycar_num'] = session('emptycar_num');
      return view('pages.memberedit_old', $data);
    }
    //
    public function forget(Request $request){
      $data['luggage_num'] = session('luggage_num');
      $data['emptycar_num'] = session('emptycar_num');
        return view('pages.forget', $data);
    }

    //
    public function resetPassword(Request $request){
      $data['luggage_num'] = session('luggage_num');
      $data['emptycar_num'] = session('emptycar_num');
      $this->validate($request, array(
        'corp_name' => 'required',
        'hello' => 'required',
        'tel' => 'required',
        'email_address' => 'required|string|email|max:255',
      ));

      $memberToReset = User::where('corp_name', $request->corp_name)
        ->where('hello', $request->hello)
        ->where('tel', $request->tel)
        ->where('email_address', $request->email_address)
        ->first();
      $ramdomPassword = str_random(8);
      $memberToReset->password = bcrypt($ramdomPassword);
      $memberToReset->save();
      $data['user'] = $memberToReset;
      $data['password'] = $ramdomPassword;
      if($memberToReset){
        return view('pages.reseted', $data);
      }
      else{
        return view('pages.forget', $data);
      }
    }

    //
    public function update(Request $request){
      $this->middleware('auth');
      $update_employee = User::find($request->user()->id);

      $this->validate($request, array(
        'corp_name' => 'required',
        'second_input' => 'required',
        'post_address' => 'required',
        'hello' => 'required',
        'third_input' => 'required',
        'tel' => 'required',
        'fax' => 'required',
        'email_address' => 'required|string|email|max:255',
        'register_pwd'  => 'min:5|required_with:confirm_pwd|same:confirm_pwd',
        'confirm_pwd' => 'required',
        'contact_address' => 'required',
        'meeting_part' =>'required',
      ));


      $update_employee->corp_name = $request->corp_name;
      $update_employee->second_input = $request->second_input;
      $update_employee->hello = $request->hello;
      $update_employee->third_input = $request->third_input;
      $update_employee->post_address = $request->post_address;
      $update_employee->tel = $request->tel;
      $update_employee->fax = $request->fax;
      $update_employee->email_address = $request->email_address;
      $update_employee->contact_address = $request->contact_address;
      $update_employee->password = bcrypt($request->register_pwd);
      $update_employee->meeting_part = $request->meeting_part;
      $update_employee->second_address = $request->second_address;
      $update_employee->third_address = $request->third_address;
      $update_employee->fourth_address = $request->fourth_address;
      $update_employee->save();

      $this->redirectTo = '/register_check/'.$request->user()->id;
      return redirect($this->redirectTo);
    }

    //
    public function membership(){
      $data['luggage_num'] = session('luggage_num');
      $data['emptycar_num'] = session('emptycar_num');
      return view('pages.membership', $data);
    }
}
