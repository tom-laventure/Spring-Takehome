<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoreUserScoreRequest;
use App\Http\Requests\UpdateUserScoreRequest;
use App\Models\UserScore;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserScoreCollection;

class UserScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserScoreCollection(UserScore::all());
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