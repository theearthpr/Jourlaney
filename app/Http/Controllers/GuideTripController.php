<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\GuideTrip;
use Illuminate\Support\Facades\Input;

class GuideTripController extends Controller
{
    public function guidecreatetrip(Request $request){
        $lastTripId = DB::select("select tripId from GuideTrip order by tripId desc limit 1");
        $tripIdObj = $lastTripId[0]->tripId;
        $tripId = $tripIdObj+1;

        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');

        if($startDate <= $endDate){
            $guideTripImage = $request->file('trippic');
            $input['filename'] = time().'.'.$guideTripImage->getClientOriginalExtension();
            $imagePath = public_path('/images/trippic');
            $guideTripImage->move($imagePath, $input['filename']);
            $guideTripPicName = $input['filename'];

            $tripName = $request->input('tripname');
            $maxTraveller = $request->input('max-traveller');
            $tripCost = $request->input('tripcost');
            $queryGuideTrip = DB::insert("insert into GuideTrip(tripId,tripName,tripStart,tripEnd,tripPicture,tripTravellers,tripCost,guideId) values(?,?,?,?,?,?,?,?)",[$tripId,$tripName,$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$maxTraveller,$tripCost,$request->input('guideid')]);
            $queryLocation = DB::select("select tripLocation from Location order by locationId");
            return view('GuideCreateTripDetails',['tripId' => $tripId])->with('queryLocation',$queryLocation);
        }
        else{
            echo "<script>window.alert('Trip end date must be after start date!')</script>";
            return view('guidecreatetrip');
        }
    }

    public function GuideCreateTripDetails(Request $request){
        $tripId = $request->input('tripId');
        
        if(!empty($request->input('location'))){
            $queryLocation1 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
            if(!empty($request->input('location2'))){
                $queryLocation2 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                if(!empty($request->input('location3'))){
                    $queryLocation3 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                }
            }
        }

        if(isset($_POST['transportation'])){
            $transportation = $_POST['transportation'];
            foreach($transportation as $value){
                $queryTransportation = DB::insert("insert into GuideTripTransportation(tripId, tripTransportation) value(?,?)",[$tripId,$value]);
            }
        }

        if(isset($_POST['trip-conditions'])){
            $conditions = $_POST['trip-conditions'];
            foreach($conditions as $value){
                $queryTripConditions = DB::insert("insert into GuideTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
            }
        }

        $tripDay = 1;
        return view('GuideCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
    }

    public function GuideCreateTripTime(Request $request){
        $tripId = $request->input('tripId');
        $tripDay = $request->input('tripDay');
        if(!empty($request->input('time1'))){
            $queryTime1 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
        }if(!empty($request->input('time2'))){
            $queryTime2 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
        }if(!empty($request->input('time3'))){
            $queryTime3 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
        }if(!empty($request->input('time4'))){
            $queryTime4 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
        }if(!empty($request->input('time5'))){
            $queryTime5 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
        }if(!empty($request->input('time6'))){
            $queryTime6 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
        }if(!empty($request->input('time7'))){
            $queryTime7 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
        }if(!empty($request->input('time8'))){
            $queryTime8 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
        }if(!empty($request->input('time9'))){
            $queryTime9 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
        }if(!empty($request->input('time10'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
        }if(!empty($request->input('time11'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time11'),$request->input('desc11')]);
        }if(!empty($request->input('time12'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time12'),$request->input('desc12')]);
        }if(!empty($request->input('time13'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time13'),$request->input('desc13')]);
        }if(!empty($request->input('time14'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time14'),$request->input('desc14')]);
        }if(!empty($request->input('time15'))){
            $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time15'),$request->input('desc15')]);
        }
        $tripDay++;
        switch($request->submit){
            case 'addDay':
                return view('GuideCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay]);
            break;
            case 'submit':
            $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
            $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
            
            $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
            
            $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
            $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
            $tripCost = DB::table('GuideTrip')->select('tripCost')->where(['tripId'=>$tripId])->first();
            $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from GuideTripDetails d join GuideTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
            $value = Current($creatorId);
            $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
            return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripCost',$tripCost)->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails);
            break;
        }
    }

    public function guideedittrip(Request $request){
        $tripId = $request->input('tripId');;

        if($request->hasFile('trippic')){
            $guideTripImage = $request->file('trippic');
            $input['filename'] = time().'.'.$guideTripImage->getClientOriginalExtension();
            $imagePath = public_path('/images/trippic');
            $guideTripImage->move($imagePath, $input['filename']);
            $guideTripPicName = $input['filename'];
        }else{
            $queryGuideTripPicName = DB::select("select tripPicture from GuideTrip where tripId =".$tripId);
            $guideTripPicName = $queryGuideTripPicName[0]->tripPicture;
        }

        $tripCondition = array('','','','','');
        $tripName = $request->input('tripname');
        $maxTraveller = $request->input('max-traveller');
        $tripCost = $request->input('tripcost');

        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');
        if($startDate <= $endDate){
            $queryGuideTrip = DB::update("update GuideTrip set tripName = ?, tripStart = ?, tripEnd = ?, tripPicture = ?, tripTravellers = ?, tripCost = ? where tripId = ?",[$tripName,$request->input('startdate'),$request->input('enddate'),$guideTripPicName,$maxTraveller,$tripCost,$tripId]);
            $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
            $tripTransportation = DB::select("select t.tripTransportation from GuideTripTransportation t join GuideTrip g on g.tripId = t.tripId where t.tripId = " .$tripId);
            $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
            $queryLocation = DB::select("select tripLocation from Location order by locationId");
        

            if(!empty($request->input('location'))){
                $rmlocation = DB::delete("delete from GuideTripLocation where tripId = ?",[$tripId]);
                $queryLocation1 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location')]);
                if(!empty($request->input('location2'))){
                    $queryLocation2 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location2')]);
                    if(!empty($request->input('location3'))){
                        $queryLocation3 = DB::insert("insert into GuideTripLocation(tripId, tripLocation) value(?,?)",[$tripId,$request->input('location3')]);
                    }
                }
            }

            $rmTransportation = DB::delete("delete from GuideTripTransportation where tripId = ?",[$tripId]);
            if(isset($_POST['transportation'])){
                $transportation = $_POST['transportation'];
                foreach($transportation as $value){
                    $queryTransportation = DB::insert("insert into GuideTripTransportation(tripId, tripTransportation) value(?,?)",[$tripId,$value]);
                }
            }

            $rmCondition = DB::delete("delete from GuideTripCondition where tripId = ?",[$tripId]);
            if(isset($_POST['trip-conditions'])){
                $conditions = $_POST['trip-conditions'];
                foreach($conditions as $value){
                    $queryTripConditions = DB::insert("insert into GuideTripCondition(tripId, tripCondition) value(?,?)",[$tripId,$value]);
                }
            }
            
            $tripDay = 1;
            $queryTime = DB::select("select tripTime, tripDescription from GuideTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
            $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
            switch($request->submit){
                case 'addDay':
                    return view('GuideEditTripTime',['tripId' => $tripId],['tripDay' => $tripDay],['creatorId' => $creatorId])->with('queryTime',$queryTime)->with('tripLocation',$tripLocation)->with('tripTransportation',$tripTransportation)->with('tripCondition',$tripCondition)->with('queryLocation',$queryLocation);
                break;
                case 'submit':
                    $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
                        
                    $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
                    $tripTransportation = DB::select("select c.tripTransportation from GuideTripTransportation c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);

                    $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
                    $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
                    $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from GuideTripDetails d join GuideTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
                    $tripCost = DB::table('GuideTrip')->select('tripCost')->where(['tripId'=>$tripId])->first();
                    $value = Current($creatorId);
                    $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
                    return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripCost',$tripCost)->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails)->with('tripTransportation',$tripTransportation);
                break;
            }
        }else{
            echo "<script>window.alert('Trip end date must be after start date!')</script>";
            return app('App\Http\Controllers\TripController')->GuideShowEditTrip($tripId);
        }
    }

    public function GuideEditTripTime(Request $request){
        $tripId = $request->input('tripId');
        $tripDay = $request->input('tripDay');

        
            $rm = DB::delete("delete from GuideTripDetails where tripId = ".$tripId." and tripDay = ".$tripDay);
            if(!empty($request->input('time1'))){
            $queryTime1 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time1'),$request->input('desc1')]);
            }if(!empty($request->input('time2'))){
                $queryTime2 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time2'),$request->input('desc2')]);
            }if(!empty($request->input('time3'))){
                $queryTime3 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time3'),$request->input('desc3')]);
            }if(!empty($request->input('time4'))){
                $queryTime4 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time4'),$request->input('desc4')]);
            }if(!empty($request->input('time5'))){
                $queryTime5 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time5'),$request->input('desc5')]);
            }if(!empty($request->input('time6'))){
                $queryTime6 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time6'),$request->input('desc6')]);
            }if(!empty($request->input('time7'))){
                $queryTime7 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time7'),$request->input('desc7')]);
            }if(!empty($request->input('time8'))){
                $queryTime8 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time8'),$request->input('desc8')]);
            }if(!empty($request->input('time9'))){
                $queryTime9 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time9'),$request->input('desc9')]);
            }if(!empty($request->input('time10'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time10'),$request->input('desc10')]);
            }if(!empty($request->input('time11'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time11'),$request->input('desc11')]);
            }if(!empty($request->input('time12'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time12'),$request->input('desc12')]);
            }if(!empty($request->input('time13'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time13'),$request->input('desc13')]);
            }if(!empty($request->input('time14'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time14'),$request->input('desc14')]);
            }if(!empty($request->input('time15'))){
                $queryTime10 = DB::insert("insert into GuideTripDetails(tripId, tripDay, tripTime, tripDescription) value(?,?,?,?)",[$tripId,$tripDay,$request->input('time15'),$request->input('desc15')]);
            }
            
            $tripDay++;
            
            $queryTime = DB::select("select tripTime, tripDescription from GuideTripDetails where tripId = ? and tripDay = ?",[$tripId,$tripDay]);
            switch($request->submit){
                case 'addDay':
                    if(!empty($queryTime))
                        return view('GuideEditTripTime',['tripId' => $tripId],['tripDay' => $tripDay])->with('queryTime',$queryTime);
                    else
                    return view('GuideCreateTripTime',['tripId' => $tripId],['tripDay' => $tripDay])->with('queryTime',$queryTime);
                break;
                case 'submit':
                $tripData = DB::table('GuideTrip')->where(['tripId'=>$tripId])->first();
                    
                $tripCondition = DB::select("select c.tripCondition from GuideTripCondition c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);
                $tripTransportation = DB::select("select c.tripTransportation from GuideTripTransportation c join GuideTrip g on g.tripId = c.tripId where c.tripId = " .$tripId);

                $creatorId = DB::table('GuideTrip')->select('guideId')->where(['tripId'=>$tripId])->first();
                $tripLocation = DB::select("select l.tripLocation from GuideTripLocation l join GuideTrip g on g.tripId = l.tripId where l.tripId = " .$tripId);
                $tripDetails = DB::select("select d.tripDay, d.tripTime, d.tripDescription from GuideTripDetails d join GuideTrip g on g.tripId = d.tripId where d.tripId = " .$tripId);
                $tripCost = DB::table('GuideTrip')->select('tripCost')->where(['tripId'=>$tripId])->first();
                $value = Current($creatorId);
                $creator = DB::select("select * from Users join Guide on Users.username = Guide.username join GuideTrip on Guide.guideId = GuideTrip.guideId where GuideTrip.tripId = ".$tripId);
                
                return view('createtripcompleted', ['creator' => $creator[0]], ['trip' => $tripData])->with('tripCost',$tripCost)->with('tripLocation',$tripLocation)->with('tripCondition',$tripCondition)->with('tripDetails',$tripDetails)->with('tripTransportation',$tripTransportation);
                break;
            }
        
    }
}