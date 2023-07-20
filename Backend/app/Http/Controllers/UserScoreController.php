<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserScoreRequest;
use App\Http\Requests\UpdateUserScoreRequest;
use App\Models\UserScore;
use Illuminate\Support\Facades\DB;

class UserScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // try {
        //     $dbconnect = DB::connection()->getPDO();
        //     $dbname = DB::connection()->getDatabaseName();
        //     echo "Connected successfully to the database. Database name is :".$dbname;
        //  } catch(Exception $e) {
        //     echo "Error in connecting to the database";
        //  }
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
     * @param  \App\Http\Requests\StoreUserScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserScoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function show(UserScore $userScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function edit(UserScore $userScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserScoreRequest  $request
     * @param  \App\Models\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserScoreRequest $request, UserScore $userScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserScore $userScore)
    {
        //
    }
}
