<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    public function index() {
        return Auth::user()->addresses;
    }
    public function create(Request $request) {
        $data = $request ->validate([
            'name' => [ 'required','string','unique:addresses,full_name'],
            'address' => [ 'required','string',],
            'township' => [ 'required','string',],
            'phone' => [ 'required','numeric',],
            'city' => [ 'required','string',],
            'region' => [ 'required','string',]
        ]);

        return $request->user()->addresses()->save(new Address([
            'full_name' => $data['name'],
            'address' => $data['address'],
            'township' => $data['township'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'region' => $data['region']
        ]));

    }
}
