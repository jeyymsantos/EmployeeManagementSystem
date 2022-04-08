<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::get();
        return response()->json(['employee'=>$employee], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created Employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json(['employee'=>$employee], 201);
    }

    /**
     * Display the specified Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json('Employee Not Found', 404);
        }
        return response()->json($employee, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the Employee
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json("Record Not Found", 404);    
        }

        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    /**
     * Remove the Employee
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json("Record Not Found", 404); 
        }

        $employee->delete();
        return response()->json(null, 200);
    }

    public function viewform(){
        return view('index');
    }

    public function index2(){
        $employ = DB::select('select * from employees');
        return view('index',['employ' => $employ]);
    }

    public function empSave(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $position = $request->input('position');
        $sickleave = $request->input('sickleave');
        $vacationleave = $request->input('vacationleave');
        $hourlyrate = $request->input('hourlyrate');


        DB::insert ('insert into employees (firstName, lastName, position, sickLeaveCredits, vacationLeaveCredits, hourlyRate ) values(?,?,?,?,?,?)'
        ,[$firstname,$lastname,$position,$sickleave,$vacationleave,$hourlyrate]);
        return redirect()->back();
    }
}
