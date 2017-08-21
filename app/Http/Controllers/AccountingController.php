<?php

namespace App\Http\Controllers;

use App\Accounting;
use Faker\Provider\Image;
use Illuminate\Http\Request;


// import the Intervention Image Manager Class
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Images;


class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Accounting::paginate(5);
        return view('accounting.index')->withPayments($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validation the data
        $this->validate($request, array(
            'date' => 'required|date',
            'value' => 'required|max:9',
            'project' => 'required|max:255',
            'type' => 'required',
            'stage' => 'required',
            'invoice' => 'image'
        ));

        // store in the database
        $accounting = new Accounting();

        $accounting->date = $request->date;
        $accounting->value = $request->value;
        $accounting->project_no = $request->project;
        $accounting->p_type = $request->type;
        $accounting->stage = $request->stage;


        if ($request->hasFile('invoice')) {
            $image = $request->file('invoice');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('invoices/' . $filename);
            Images::make($image)->save($location);

            $accounting->image = $filename;
        }

        $accounting->save();

        // flash message
        Session::flash('success', 'The Payment was successfully saved!');

        // redirect to index

        return redirect()->route('accounting.show', $accounting->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = Accounting::find($id);

        return view('accounting.show')->withPayments($payments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and store it in a var

        $payments = Accounting::find($id);

        // return view wth var data

        return view('accounting.edit')->withPayments($payments);

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
        // validate data

        $this->validate($request, array(
            'date' => 'required|date',
            'value' => 'required|max:9',
            'project_no' => 'required|max:255',
            'p_type' => 'required',
            'stage' => 'required',
            'image' => 'image'
        ));

        // save to database

        $payments = Accounting::find($id);

        $payments->date = $request->input('date');
        $payments->value = $request->input('value');
        $payments->project_no = $request->input('project_no');
        $payments->p_type = $request->input('p_type');
        $payments->stage = $request->input('stage');

        if ($request->hasFile('invoice')) {
            $image = $request->file('invoice');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('invoices/' . $filename);
            Images::make($image)->save($location);

            $payments->image = $filename;
        }

        $payments->save();

        // flash message
        Session::flash('success', 'The Payment was successfully saved!');

        // redirect to show page
        return redirect()->route('accounting.show', $payments->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Accounting::find($id);

        $payments->delete();

        Session::flash('success', 'The Payment was successfully deleted');

        return redirect()->route('accounting.index');
    }
}
