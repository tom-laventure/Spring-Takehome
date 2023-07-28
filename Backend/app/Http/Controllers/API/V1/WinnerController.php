<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWinnerRequest;
use App\Http\Requests\UpdateWinnerRequest;
use App\Http\Resources\V1\WinnerCollection;
use App\Models\Winner;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $winners = Winner::with('userscore')->get();

        return new WinnerCollection($winners);
    }
}