<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/admin/dashboard');
        }else{
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email'  => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator->errors());
        }else{
            $email = $request->get('email');
            $password = $request->get('password');
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/')->with('error','wrong email or password');
            }
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function apiEmail($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result,true);
    }

    // public function getValid()
    // {
    //     $data = 'alvian@gmhhail.com';
    //     $url = 'https://api.trumail.io/v2/lookups/json?email='.$data.'';
    //     $url = $this->apiEmail($url);
    //     $url = $url['deliverable'];
    //     if($url == 'true'){
    //         echo 'valid';
    //     }else{
    //         echo 'not valid';
    //     }
    // }

    public function postregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
            $data = $user->email;
            $url = 'https://api.trumail.io/v2/lookups/json?email='.$data.'';
            $url = $this->apiEmail($url);
            if(strpos(json_encode($url),'No response received from mail server')){
                return back()->with('fail','please use real email address');
            }
            $url = $url['deliverable'];
            if($url == 'true'){
                $user->password = Hash::make($request->get('password'));
                $user->save();
                return redirect('/')->with('message','Berhasil daftar, silahkan login');
            }else{
                return back()->with('fail','please use real email address');
            }




    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success','success logout');
    }

    public function setCookie()
    {
        $minutes = 1;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('name', 'MyValue', $minutes));
        return $response;
    }

    public function getCookie(Request $request){
        $value = $request->cookie('name');
        echo $value;
     }
}
