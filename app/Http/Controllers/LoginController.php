<?php

namespace App\Http\Controllers;
use App\Models\NativeAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login()
    {
        return view('NativeAuth.login');
    }

    public function check(request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //Input data

        $inEmail = $request->get('email');
        $inPassword = $request->get('password');

        $user = DB::table('NativeAuth')->where('email',$inEmail)->first();
        // dd($user);
        if (is_null($user)) {
            $request->session()->flash('error', 'Email Wrong');

               $data = $request->session()->all();

               // dd($data);

               return view('NativeAuth.login' , compact('data'));
        }else{
            $chkEmail = $user->email;
            $chkPass = $user->password;

            if ($inEmail === $chkEmail && password_verify($inPassword, $chkPass)) {


               $request->session()->put(['id' => $user->id,'name' => $user->name
                ]);
               $request->session()->flash('success', 'you logged in successfully!');

               $data = $request->session()->all();

               // dd($data);

               return view('NativeAuth.index' , compact('data'));
                
            }else{
                $request->session()->flash('error', 'Data Wrong');

               $data = $request->session()->all();

               // dd($data);

               return view('NativeAuth.login' , compact('data'));

            }            
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        // $data = $request->session()->all();
        return view('NativeAuth.index');
    }
}
