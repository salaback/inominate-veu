<?php

namespace App\Http\Controllers;

use App\Nomination;
use App\Nominee;
use Illuminate\Http\Request;

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

        $nominee = Nominee::firstOrCreate(['name' => $data['name'], 'email' => $data['email']]);

        $data['nominee_id'] = $nominee->id;

        $nomination = Nomination::create($data);

        return $nomination->id;
    }
}
