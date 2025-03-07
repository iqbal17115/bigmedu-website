<?php

namespace App\Http\Controllers\Frontend\Blog\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Model\BlogUser;
use App\Model\ResourcePerson;
use App\Model\UserRole;
use Auth;
use Cookie;
use Session;

class PasswordResetController extends Controller
{
    //
	public function resetPassword()
	{
		return view('frontend.blog.auth.reset_password.reset-email');
	}

	public function checkEmail(Request $request)
	{
		$check_email = BlogUser::where('email',$request->email)->first();

		Session::put('email',$request->email);
		if($check_email)
		{
			$code = rand(0000,9999);
			$minutes = 10;
			$value = Cookie::queue('name', $code, $minutes);
			$data['name'] = $check_email['name'];
			return view('frontend.blog.auth.reset_password.reset-code')->with($data);

		}
		else
		{
			session()->flash('msg', 'User Email does not match! Please try again.');
			return redirect()->back();
		}
	}

	public function checkName(Request $request)
	{
		$data['code'] = $request->cookie('name');
		$email = Session::get('email');
		$data['user_email'] = $email;
		$user_id = BlogUser::where('email',$email)->first();
		$data['name'] = $user_id['name'];
		Mail::send('frontend.blog.auth.email.reset-password-page', $data, function ($message) use ($data){
			// $message->from('bcsaa.bd@gmail.com','BCSAA');
			$message->to($data['user_email']);
			$message->subject('Password reset code.');
		});
		return view('frontend.blog.auth.reset_password.check-code');

	}

	public function submitCode(Request $request)
	{
		$email = Session::get('email');
		$cookie_code = $request->cookie('name');
		if($cookie_code == $request->code)
		{
			return redirect()->route('blog_user.new.password');
		} 
		else
		{
			session()->flash('msg', 'Security Code does not match! Please Try again.');
			return redirect()->back();
		}
	}

	public function newPassword()
	{
		return view('frontend.blog.auth.reset_password.new-password');
	}

	public function newPasswordStore(Request $request)
	{
		$request->validate([
			'new_password' => 'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[\d])\S*$/',
			'confirm_password' => 'required|same:new_password',
		]);
		$email = Session::get('email');
		$user = User::where('email',$email)->first();
		if($request->new_password == $request->confirm_password)
		{
			$password = Hash::make($request->new_password);
			$user->password = $password;
			$user->update();
   //  		session()->flash('info', 'Your password Successfully Updated.');
			// Session::put('update_info','Your password Successfully Updated.');
			return redirect()->route('login')->with('info','Your password Successfully Updated.');	
		}
		else
		{
			session()->flash('msg', 'Password and Confirm password does not match.');
			return redirect()->back();
		}
	}
}
