<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NominationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validated data
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'office' => 'required',
            'district' => 'required'
        ]);

        $this->newNomination($data);

        return redirect('/');
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

    public function newNomination($data)
    {
        // find or load the Nominee user
        $nominee = Nominee::firstOrCreate(['name' => $data['name'], 'email' => $data['email']]);

        // add information to the nomination data
        $data['nominee_id'] = $nominee->id;
        $data['nominator_id'] = Auth::id();

        // create new nomination
        $nomination = Nomination::create($data);

        // register support for nomination
        $nomination->support()->create(['user_id' => Auth::id()]);

        return $nomination->id;
    }
}
