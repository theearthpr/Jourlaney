<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TouristRegister;

class TouristRegisterController extends Controller
{
    public function touristregis(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $hash = hash('sha512',$password);
        $userEmail = $request->input('email');
        $today = Carbon::today('Asia/Bangkok')->isoFormat('YYYY-MM-DD');
        
        $checkUsername = DB::table('Users')->where(['username'=>$username])->get();
        $checkEmail = DB::table('Users')->where(['userEmail'=>$userEmail])->get();
        if(count($checkUsername) ==0){
            if(count($checkEmail) ==0){
                if($request->input('birthdate') < $today){
                    $touristIdCardImage = $request->file('idcardpic');
                    $input['filename'] = time().'.'.$touristIdCardImage->getClientOriginalExtension();
                    $picturePath = public_path('/images/idcardpic');
                    $touristIdCardImage->move($picturePath, $input['filename']);
                    $touristIdCardPicName = $input['filename'];

                    $queryUser = DB::insert("insert into Users(username,userPassword,userFirstName,userLastName,userEmail,userGender,userDOB,userIdcard) values(?,?,?,?,?,?,?,?)",[$username,$hash,$request->input('firstname'),$request->input('lastname'),$request->input('email'),$request->input('gender'),$request->input('birthdate'),$request->input('idcard')]);
                    $queryTourist = DB::insert("insert into Tourist(username,touristIdCardPic) value(?,?)",[$request->input('username'),$touristIdCardPicName]);
                    return view('registercompleted');
                }
                echo "<script>window.alert('Please use real birthday.')</script>";
                return view('guideregister');
            }
            else{
                echo "<script>window.alert('Dublicate email! Please change.')</script>";
                return view('guideregister');
            }
        }
        else{
            echo "<script>window.alert('Dublicate username! Please change.')</script>";
            return view('guideregister');
        }
    }
}

