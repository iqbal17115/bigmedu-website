<?php

namespace App\Http\Controllers\Frontend\Blog\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/blog_user/home';

    protected function redirectTo()
    {
        if(session()->get('came_from_login_page') == 1) {
            $url = session()->get('blog_details_page_url');
            session()->forget('came_from_login_page');
            session()->forget('blog_details_page_url');
            return $url;
        } 
        session()->forget('came_from_login_page');
        session()->forget('blog_details_page_url');
        return "/blog_user/home";
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $urlPrev = url()->previous();
        //dd($urlPrev);
        if(session()->get('blog_details_page_url') == $urlPrev)
        {
            session()->put('came_from_login_page',1);
        }
        return view('frontend.blog.auth.blog_login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('blog_user')->logout();

        $request->session()->invalidate();

        session()->forget('came_from_blog_details_page');
        session()->forget('blog_details_page_url');

        return $this->loggedOut($request) ?: redirect()->route('blog_user.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('blog_user');
    }
    
}

