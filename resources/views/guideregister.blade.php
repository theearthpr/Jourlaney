@extends('header')
@section('page')
<div class="container">
    <h3 class="text-center register-header">Guide Registeration</h3>
        <form method="POST" id="register-form" name="register-form" action="{{URL::to('/guideregis')}}" enctype="multipart/form-data">    
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="register-label" for="username">Username</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 20]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="password">Password</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[8, 40]" data-equalto="#repassword">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                <label class="register-label" for="repassword">Re-password</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-password" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[8, 40]" data-equalto="#password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="firstname">First name</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="First name" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="lastname">Last name</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="email">Email</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" data-parsley-required="true" data-parsley-type="email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="gender">Gender</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Undefined" checked>
                            <label class="form-check-label" for="undefined">Undefined</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="birthdate">Birthdate</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                    <input type="date" class="form-control" name="birthdate" placeholder="Birthday" validateDate>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="idcard">ID card number</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="idcard "name="idcard" onsubmit="checkForm()" placeholder="ID card number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[13, 13]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="guidelicense">Guide license number</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" name="guidelicense" placeholder="Guide license number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[7, 7]">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="guidelicensepic">Guide license card picture</label>
                    {{ csrf_field() }}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                            <input type="file" name="guidelicensepic" id="guidelicensepic" required>
                        <div id="filename"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="bankname">Bank name</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group" id="location-form">
                    <select name="bankname" id="bankname">
                        <option value="" selected>Select bank</option>
                        <option value="BAAC">ธนาคารเพื่อการเกษตรและสหกรณ์ (BAAC)</option>
                        <option value="GSB">ธนาคารออมสิน (GSB)</option>
                        <option value="SCB">ไทยพาณิชย์ (SCB)</option>
                        <option value="Kbank">กสิกร (Kbank)</option>
                        <option value="KTB">กรุงไทย (KTB)</option>
                        <option value="BBL">กรุงเทพ (BBL)</option>
                        <option value="BAY">กรุงศรีอยุธยา (BAY)</option>
                        <option value="Thanachart">ธนชาติ (Thanachart)</option>
                        <option value="TMB">ทหารไทย (TMB)</option>
                        <option value="Kiatnakin">เกียรตินาคิน (Kiatnakin)</option>
                        <option value="Standard Chartered">แสตนดาร์ดชาร์เตอร์ด (Standard Chartered)</option>
                        <option value="UOB">ยูโอบี (UOB)</option>
                        <option value="TISCO">ทิสโก้ (TISCO)</option>
                        <option value="CIMB">ซีไอเอ็มบี (CIMB)</option>
                        <option value="ICBC">ไอซีบีซี (ICBC)</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="register-label" for="accountno">Account number</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="accountno "name="accountno" onsubmit="checkForm()" placeholder="ID card number" data-parsley-type="integer" data-parsley-required="true" data-parsley-length="[10, 10]">
                    </div>
                </div>
            </div> -->
            <br>
            <div class="row text-center mb-4">
                <div class="col-lg-7">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>

    </div>
<script language="javascript">
    $('#register-form').parsley();
    $(document).ready(function(){
        $('#idcard').mask('0-0000-00000-0');
        $('.guidelicense').mask('00-00000');
    });
    function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm()
{ if(!checkID(document.register-form.idcard.value))
alert('Wrong ID card number.');
}
</script>
@endsection