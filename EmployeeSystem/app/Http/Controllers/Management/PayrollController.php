<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payroll;
use DB;

class PayrollController extends Controller
{
    public function addTimeIn(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json('Employee Not Found', 404);
        }
        $timeInDate = $request->input('timeInDate');

        $data = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timeInDate)->format('Y-m-d');

        DB::insert('insert into payrolls (empID, timeInDate) values (?, ?)', [$id, $data]);
        return response()->json(null, 200);
    }

    public function addTimeOut(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json('Employee Not Found', 404);
        }
        $timeOutDate = $request->input('timeOutDate');
        DB::insert('insert into payrolls (empID, timeOutDate) values (?, ?)', [$id, $timeOutDate]);
        return response()->json(null, 200);
    }
}
