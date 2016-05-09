<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Http\Requests;
use Carbon\Carbon;

use App\Studio;

class ReservationController extends Controller
{
   public function addDays($d, $c) {
       $r = strtotime ( $c . ' day' , strtotime ( $d ) ) ;
       $r = date ( 'Y-m-d' , $r);
       return $r;
   }
   
   public function index(Request $request) {
       if ($request->sdate == null) {
            $sdate = date('Y-m-d');
            
       } else {
           $sdate = $request->sdate;
       }
       $dayOfWeek = date('w', strtotime($sdate));
       $sdate = $this->addDays($sdate, "-" . $dayOfWeek);
       $edate = $this->addDays($sdate, "+6");
       $nextweek = $this->addDays($sdate, "+7");
       $lastweek = $this->addDays($sdate, "-7");
       
       $reservations = Reservation::with('studio')->whereBetween('date', array($sdate, $edate))->orderBy('date', 'asc')->get();
       
       $events = array();
       foreach($reservations as $res) {
           $d = $res->date;
           $h = date("G", strtotime($res->time));
           $events[$d][$h][] = $res->studio->name;
       }
       return view('index', ['reservations'=>$reservations, 'sdate'=> $sdate, 'edate'=> $edate,'nextweek'=> $nextweek, 'lastweek'=> $lastweek, 'events'=>$events]);
   }
   
   
}
