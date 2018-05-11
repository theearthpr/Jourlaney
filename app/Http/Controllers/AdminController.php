<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class AdminController extends Controller
{
    public function login(Request $req){
        $username = $req->get('username');
        $password = $req->get('password');
        $hash = hash('sha512',$password);
        if($username='Admin'){
        $check = DB::table('Users')->where(['username'=>$username,'userPassword'=>$hash])->get();
        if(count($check) >0){
            Session::start();
            $req->session()->put('username', $username);
            $firstname = DB::table('Users')->select('userFirstName')->where('username',$username)->get();
            Session::put('firstname', $firstname[0]->userFirstName);
            $lastname = DB::table('Users')->select('userLastName')->where('username',$username)->get();
            Session::put('lastname', $lastname[0]->userLastName);
            return redirect('adminGetData');
        }
        else{
            echo ('Invalid Username or Password.');
        }
    }
        else{
            echo ('Invalid Username or Password.');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    public function getdata(){
        $countGuide = DB::table('Guide')->count();
        Session::put('countGuide', $countGuide);
        $countTourist = DB::table('Tourist')->count();
        Session::put('countTourist', $countTourist);
        $countUser = $countGuide + $countTourist;
        Session::put('countUser', $countUser);
        $countGuideTrip = DB::table('GuideTrip')->count();
        $countTouristTrip = DB::table('TouristTrip')->count();
        $countTrip = $countGuideTrip + $countTouristTrip;
        Session::put('countTrip', $countTrip);
        $queryGuide = DB::select('select Users.username, Users.userFirstName, Users.userLastName, Users.userEmail, Guide.guideLicensePic from Users join Guide on Guide.username=Users.username where Guide.guideVerification is null');
        return view('admin/index', ['queryGuide' => $queryGuide]);
    }

    public function guideverify(Request $req){
        $username = $req->get('username');
        $queryVerify = DB::update('update Guide set guideVerification = ? where username = ?',[1,$username]);
        echo "<script>window.alert('Verified.')</script>";
        return redirect('adminGetData');
    }
}
