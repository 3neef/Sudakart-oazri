<?php

namespace App\Http\Controllers;

use App\Models\State;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return State::with('cities')->get();
    }

}
