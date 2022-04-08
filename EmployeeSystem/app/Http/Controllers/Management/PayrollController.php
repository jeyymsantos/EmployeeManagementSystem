<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payroll;
use DB;
use Carbon\Carbon;
use Date;

class PayrollController extends Controller
{

    public function showSalary(Request $request){

        //$startDate = $request->input('timeInDate');
        //$endDate = $request->input('timeOutDate');

        //$daysWorked = $startDate->diffInDays($endDate) + 1;

        $startDate = Carbon::parse($request->input('timeInDate'));   
        $endDate = Carbon::parse($request->input('timeOutDate'));  

        $daysWorked = $startDate->diffInWeekDays($endDate) + 1;

        return response()->json($daysWorked, 404);

    }


    public function addTimeIn(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json('Employee Not Found', 404);
        }

        $timeInDate = $request->input('timeInDate');

        DB::insert('insert into payrolls (empID, timeInDate) values (?, ?)', [$id, $timeInDate]);
        return response()->json(null, 200);
    }

    public function addTimeOut(Request $request, $id){
        $payroll = Payroll::find($id);
        if(is_null($payroll)){
            return response()->json('Employee Not Found', 404);
        }

        $timeOutDate = $request->input('timeOutDate');
        $timeInDate = $payroll->timeInDate;

        if($timeOutDate < $timeInDate){
            return response()->json('Time Less Than Time In', 400);    
        }

        DB::insert('update payrolls set timeOutDate = ? WHERE timeInDate = ? AND empID = ?', [$timeOutDate, $timeInDate, $id]);
        return response()->json(null, 200);
    }

    public function addLeave(Request $request, $id){
        $payroll = Payroll::find($id);
        if(is_null($payroll)){
            return response()->json('Employee Not Found', 404);
        }
    }

}
