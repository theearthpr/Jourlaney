@extends('header')
@section('page')
<div class="container homemenu">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <a href = "newfeeds"><img src="../pic/medal.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Recommend</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "guidecreatetrip"><img src="../pic/bag.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Create Trip</p>
                    </div>
                </div>
                <div class="col-4">
                    <div align="center">
                        <a href = "findguide"><img src="../pic/glasses.png" class="homemenu-icon" height="80" alt=""></a>
                        <p class="homemenu-text">Find Guide</p>
                    </div>
                </div>
            </div>
        </div>
<br>
<div class="container">
    <h3 class="text-center trip-header">Create your trip</h3>
        <form method="POST" id="trip-form" name="trip-form" action="{{URL::to('/gcreatetrip')}}">
        {{ csrf_field() }} 
            <div class="row mt-5">
                <div class="col-lg-2">
                    <label class="trip-label" for="tripname">Trip name</label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tripname" id="tripname" data-parsley-required="true" data-parsley-type="alphanum" data-parsley-length="[3, 50]">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="location">Location</label>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                    <select name="location" id="location">
                        <option value="" selected>--------- เลือกจังหวัด ---------</option>
                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                        <option value="กระบี่">กระบี่ </option>
                        <option value="กาญจนบุรี">กาญจนบุรี </option>
                        <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                        <option value="กำแพงเพชร">กำแพงเพชร </option>
                        <option value="ขอนแก่น">ขอนแก่น</option>
                        <option value="จันทบุรี">จันทบุรี</option>
                        <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                        <option value="ชัยนาท">ชัยนาท </option>
                        <option value="ชัยภูมิ">ชัยภูมิ </option>
                        <option value="ชุมพร">ชุมพร </option>
                        <option value="ชลบุรี">ชลบุรี </option>
                        <option value="เชียงใหม่">เชียงใหม่ </option>
                        <option value="เชียงราย">เชียงราย </option>
                        <option value="ตรัง">ตรัง </option>
                        <option value="ตราด">ตราด </option>
                        <option value="ตาก">ตาก </option>
                        <option value="นครนายก">นครนายก </option>
                        <option value="นครปฐม">นครปฐม </option>
                        <option value="นครพนม">นครพนม </option>
                        <option value="นครราชสีมา">นครราชสีมา </option>
                        <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                        <option value="นครสวรรค์">นครสวรรค์ </option>
                        <option value="นราธิวาส">นราธิวาส </option>
                        <option value="น่าน">น่าน </option>
                        <option value="นนทบุรี">นนทบุรี </option>
                        <option value="บึงกาฬ">บึงกาฬ</option>
                        <option value="บุรีรัมย์">บุรีรัมย์</option>
                        <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                        <option value="ปทุมธานี">ปทุมธานี </option>
                        <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                        <option value="ปัตตานี">ปัตตานี </option>
                        <option value="พะเยา">พะเยา </option>
                        <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                        <option value="พังงา">พังงา </option>
                        <option value="พิจิตร">พิจิตร </option>
                        <option value="พิษณุโลก">พิษณุโลก </option>
                        <option value="เพชรบุรี">เพชรบุรี </option>
                        <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                        <option value="แพร่">แพร่ </option>
                        <option value="พัทลุง">พัทลุง </option>
                        <option value="ภูเก็ต">ภูเก็ต </option>
                        <option value="มหาสารคาม">มหาสารคาม </option>
                        <option value="มุกดาหาร">มุกดาหาร </option>
                        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                        <option value="ยโสธร">ยโสธร </option>
                        <option value="ยะลา">ยะลา </option>
                        <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                        <option value="ระนอง">ระนอง </option>
                        <option value="ระยอง">ระยอง </option>
                        <option value="ราชบุรี">ราชบุรี</option>
                        <option value="ลพบุรี">ลพบุรี </option>
                        <option value="ลำปาง">ลำปาง </option>
                        <option value="ลำพูน">ลำพูน </option>
                        <option value="เลย">เลย </option>
                        <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                        <option value="สกลนคร">สกลนคร</option>
                        <option value="สงขลา">สงขลา </option>
                        <option value="สมุทรสาคร">สมุทรสาคร </option>
                        <option value="สมุทรปราการ">สมุทรปราการ </option>
                        <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                        <option value="สระแก้ว">สระแก้ว </option>
                        <option value="สระบุรี">สระบุรี </option>
                        <option value="สิงห์บุรี">สิงห์บุรี </option>
                        <option value="สุโขทัย">สุโขทัย </option>
                        <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                        <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                        <option value="สุรินทร์">สุรินทร์ </option>
                        <option value="สตูล">สตูล </option>
                        <option value="หนองคาย">หนองคาย </option>
                        <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                        <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                        <option value="อุดรธานี">อุดรธานี </option>
                        <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                        <option value="อุทัยธานี">อุทัยธานี </option>
                        <option value="อุบลราชธานี">อุบลราชธานี</option>
                        <option value="อ่างทอง">อ่างทอง </option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                    &nbsp;&nbsp;
                    <img src="../pic/add.png" hight="16px" width="16px">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="date">Trip start</label>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="startdate" id="startdate" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
                <lable>-</lable>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="enddate" id="enddate" data-parsley-required="true" data-parsley-type="alphanum">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                <label class="trip-label" for="trippic">Trip picture</label>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <a>
                            <input type="file" name="file_source" id="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="transportation">Transportation</label>
                </div>
                <div class = "col-lg-8">
                    <input type="checkbox" class="" name="transportation" id="transportation" value="private car" /> Private Car &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="transportation" id="transportation" value="public transportation" /> Public Transportation
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="max-traveller" >Max traveller</label>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" class="form-control" name="max-traveller" id="max-traveller"  data-parsley-required="true"  min="1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="language">Language</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label" for="trip-conditions">Trip conditions</label>
                </div>
                <div class="col-lg-8">
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="smart casual" /> Smart Casual  &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์no pets" /> No Pets &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์flexible plane" /> Flexible Plan &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์seasonal activity" /> Seasonal Activity &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="" name="trip-conditions" id="trip-conditions" value="์others" /> Others...
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label class="trip-label">Trip Cost</label>
                </div>
                <div class = "col-lg-8">
                <input type="number" min="0.00" max="10000.00" step="0.01"> baht. / Person
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label>Itinerary</label>
                </div>
                <div class="col-lg-8">
                    <form method="post" action="">
                        <div id="cover">
                            <a id='btnAdd'><img src='../pic/add.png' hight='16px' width='16px'></a>
                        </div>
                    </form>
                <br>
                    <input type="hidden" name="guideid" id="guideid" value="{{Session::get('guideid')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>

    </div>
    <script language="javascript" src="js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript">
        $(function(){
        $("#addRow").click(function(){
        $("#myTbl").append($("#firstTr").clone());
        });
        $("#removeRow").click(function(){
        if($("#myTbl tr").size()>1){
            $("#myTbl tr:last").remove();
        }
        });         
    });
    </script>
    <script>
	$(document).ready(function(){
		first();                   // เมื่อ page ถูกโหลดจะทำฟังก์ชัน first ก่อน
		$('#btnAdd').click(first); // เมื่อ click จะสร้าง element ขึ้นมาใหม่(สร้าง input ใหม่)
		$('#btnSend').click(send); //เมื่อคลิกจะทำฟังก์ชัน send
	});
	
	function first(){
		var id = $('#cover div').length+1;            // นับว่ามี tag div กี่อันแล้ว แล้ว +1
		var wrapper = $("<div id=\"field"+id+"\"><br>");  // สร้าง div
		var parag   = $("<p>Day "+id+" <img src='../pic/add.png' hight='16px' width='16px'></p>");   // สร้าง p
		var text    = $("<span>Time:&nbsp;</span><input type='time' name=\"tel"+id+"\" />"); // สร้าง input
		var text2    = $("<span>&nbsp;&nbsp;&nbsp;</span><input type='text' name=\"tel"+id+"\" size='50'/>")
		wrapper.append(parag);   
		wrapper.append(text);
        wrapper.append(text2);
		$('#cover').append(wrapper);
	}
	
	function send(){  //นับ div ทั้งหมดก่อนส่ง
		var id= $('#cover div').length;
		var hiddens = $("<input type='hidden' name='hidden' value=\""+id+"\"/>");
		$('form').append(hiddens);
		$('form').submit(); 
	}
</script>
@endsection