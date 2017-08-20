<?php

namespace App\Http\Controllers;

use App\Accounting;
use Faker\Provider\Image;
use Illuminate\Http\Request;

// import the Intervention Image Manager Class
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
        $payments = Accounting::all();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
