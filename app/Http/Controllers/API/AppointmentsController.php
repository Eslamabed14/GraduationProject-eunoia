<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentsController extends Controller
{

    public function checkBookDate(){
        $combinedDT = date('Y-m-d', strtotime("$this->book_date"));
        $book_date = Carbon::parse($combinedDT)->format('y-m-d');
        $check = true;
        $created_at = Carbon::parse($this->created_at);
        $addDayToCreatedAt = $created_at->addHours(24);
        $dateCreated_at = $addDayToCreatedAt->format('y-m-d');
        $timeCreated_at = $addDayToCreatedAt->format('H:i');
        $check_bookDate_and_createdDate = $book_date >= $dateCreated_at;   // true
        $periods = $this->periods->pluck('period')->toArray();
        foreach ($periods as $period){   // true
            if ($period > $timeCreated_at){
                $check;
            }else{
                $check = false;
                $check;
            }
        }
        if ($check_bookDate_and_createdDate == true && $check == true){
            $disc_status = true;
        }else{
            $disc_status = false;
        }
        return $disc_status;
    }


    function SplitTime($StartTime, $EndTime, $Duration){
        $ReturnArray = array ();// Define output
        $StartTime    = strtotime ($StartTime); //Get Timestamp
        $EndTime      = strtotime ($EndTime); //Get Timestamp

        $AddMins  = $Duration * 60 * 60;

        while ($StartTime <= $EndTime) //Run loop
        {
            $ReturnArray[] = date("G:i", $StartTime);
            $StartTime += $AddMins; //Endtime check
        }
        return $ReturnArray;
    }

}
