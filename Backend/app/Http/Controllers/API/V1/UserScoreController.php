<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\V1\StoreUserScoreRequest;
use App\Http\Requests\V1\UpdateUserScoreRequest;
use App\Http\Resources\V1\UserScoreResource;
use App\Models\UserScore;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserScoreCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        return new UserScoreCollection(UserScore::where('name', 'like', '%' . $search . '%')->orderByDesc('points')->get());
    }


    public function groupedByScore()
    {
        $userScores = UserScore::select('points')
            ->selectRaw('GROUP_CONCAT(name) as names')
            ->selectRaw('AVG(age) as average_age')
            ->groupBy('points')
            ->get();


        $result = [];

        foreach ($userScores as $userScore) {
            $result[(string) $userScore->points]['names'] = explode(',', $userScore->names);
            $result[(string) $userScore->points]['average_age'] = (int) $userScore->average_age;
        }

        return $result;
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
        return new UserScoreResource(UserScore::create($request->all()));
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
        $userScore->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserScore $userScore)
    {
        $userScore->delete();
    }
}