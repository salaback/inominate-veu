<?php

namespace App\Http\Controllers;

use App\Nomination;
use App\NominationSupport;
use App\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NominationController extends Controller
{

    public function create(Request $request)
    {
        // validated data
        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'office' => 'required',
            'district' => 'required'
        ]);

        return $this->newNomination($data);
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
