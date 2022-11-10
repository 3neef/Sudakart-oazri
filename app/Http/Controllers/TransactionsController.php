<?php

namespace App\Http\Controllers;

use App\Collections\TransactionsCollection;
use App\Http\Resources\TransactionsResource;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return TransactionsResource::collection(TransactionsCollection::collection($request));
    }
}
