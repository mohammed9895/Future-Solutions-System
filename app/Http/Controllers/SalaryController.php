<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = Salary::orderBy('id', 'desc')->paginate(5);
        return view('salary.index')->withSalary($salary);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'value' => 'required|max:255',
            'type' => 'required|',
            'employer' => 'required'
        ));

        $salary = new Salary();

        $salary->value = $request->value;
        $salary->type  = $request->type;
        $salary->employer = $request->employer;

        Session::flash('success', 'The Salary was successfully saved!');

        $salary->save();

        return redirect()->route('salary.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::find($id);

        return view('salary.show')->with(['salary' => $salary]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
