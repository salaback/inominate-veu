<?php

namespace App\Http\Controllers;

use App\Nomination;
use App\NominationSupport;
use App\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

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
        return view('nominations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validated nominee data
        $nominee_data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
        ]);

        // validated nomination data
        $nomination_data = $request->validate([
            'office' => 'required',
            'district' => 'required',
        ]);

        // validated support data
        $support_data = $request->validate([
            'contribution' => 'numeric',
            'walk' => 'boolean',
            'call' => 'boolean',
            'host' => 'boolean',
            'yardSign' => 'boolean',
            'signPetition' => 'boolean',
            'statement' => 'max:1000',
        ]);

        // find or load the Nominee user
        $nominee = Nominee::firstOrNew(['email' => $nominee_data['email']]);

        if(!$nominee->exists)
        {
            $nominee->first_name = $nominee_data['first_name'];
            $nominee->last_name = $nominee_data['last_name'];
            $nominee->save();
        }

        // add information to the nomination data
        $nomination_data['nominee_id'] = $nominee->id;
        $nomination_data['nominator_id'] = Auth::id();

        // create new nomination
        $nomination = Nomination::create($nomination_data);

        // register support for nomination
        $support_data['user_id'] = Auth::id();
        $support_data['nomination_id'] = $nomination->id;

        NominationSupport::create($support_data);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nomination $id)
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
