<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;
class KsuAuthController extends Controller
{
	
	// public function __construct()
    // {
    //     $this->middleware('ceklogin');
    // }
	public function index(Request $request)
	{
		$role=session('roles');
		//dd($role[0]['roleId']);
		if($role[0]['roleId']=='7'){
			return view('checker_dashboard');
		}elseif($role[0]['roleId']=='6'){
			return view('approval_dashboard');	
		}else{
			return view('staff_dashboard');	
		}
	}

	public function login()
	{
		return view('auth.login');
	}

	public function cekUser()
	{
		//dd(session()->has('access_token'));
		if(session()->has('access_token')){	
			return view('index');
		}
		
		return redirect('login');
		
	}

	public function logout(Request $request)
	{
		session()->flush();
		return redirect('login');
	}
	

	


	public function getToken(Request $request) {
		
		
		$response = Http::withHeaders([
			'Authorization'=>'Basic ZGV2Y2xpZW50OnNlY3JldFBhc3N3b3Jk',
			'Content-Type' => 'application/x-www-form-urlencoded',
			'Connection' => 'keep-alive'
		])->asForm()->post(env('API_URL').'authorization/oauth/token', [
			'username' => $request->username,
			'password' => $request->password,
			'grant_type' => 'password',
		])->json();

		
		if(isset($response['access_token'])){

			session(['access_token' => $response['access_token']]);
			session(['token_type' => $response['token_type']]);
			session(['refresh_token' => $response['refresh_token']]);
			session(['expires_in' => $response['expires_in']]);
			session(['email' => $response['email']]);
			session(['member_id' => $response['member_id']]);
			session(['user_type_id' => $response['user_type_id']]);
			session(['is_first_login' => $response['is_first_login']]);
			session(['jti' => $response['jti']]);
			
			$this->getUser();
			
			return redirect('dashboard');
		}else{
			return redirect('login')->with('message','Username atau Password salah');
		}
		
		
		//dd($response);

	}

	public function getUser() {
		
		$response = Http::withToken(session('access_token'))->get(env('API_URL').'user/current', [])->json();
		
		
			session(['id' => $response['id']]);
			session(['email' => $response['email']]);
			session(['username' => $response['username']]);
			session(['fullName' => $response['fullName']]);
			session(['enabled' => $response['enabled']]);
			session(['fullName' => $response['fullName']]);
			session(['memberId' => $response['memberId']]);
			session(['roles' => collect($response['roles'])]);
			session(['autorities' => collect($response['autorities'])]);
			
		return true;	
		
		//echo "Success";
		//dd($response);

	}

	

	public function register()
	{
		return view('auth.register');
	}


}

?>