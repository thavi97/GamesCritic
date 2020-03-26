<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MarcReichel\IGDBLaravel\Models\Artwork;
use MarcReichel\IGDBLaravel\Models\Company;
use MarcReichel\IGDBLaravel\Models\Cover;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\GameVideo;
use MarcReichel\IGDBLaravel\Models\InvolvedCompany;
use MarcReichel\IGDBLaravel\Models\Platform;
use MarcReichel\IGDBLaravel\Models\ReleaseDate;
use MarcReichel\IGDBLaravel\Models\Website;

use App\Test;

class NewGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return the homepage with a list of the latest releases.
        //$games = ReleaseDate::with(['game'])->whereBetween('date', strtotime('-2 month'), strtotime('now'))->orderBy('date', 'desc')->get();
        $games = ReleaseDate::with(['game'])->where('platform', 1)->orWhere('platform', 6)->whereBetween('date', strtotime('-2 months'), strtotime('now'))->orderBy('date', 'desc')->get();
        //dd($games);
        return view('new_games')->with('games', $games);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $test = new Test;
      $test->test = $request->input('fname');
      $test->save();
      return redirect('/new_games');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
       $game = Game::find($id);
       $release_date = ReleaseDate::find($game['release_dates'][0]);
       $platform = Platform::find($game['platforms'][0]);
       $website = Website::find($game['websites'][0]);
       $involved_companies = InvolvedCompany::find($game['involved_companies'][0]);
       $company = Company::find($involved_companies['company']);
       $data = [
         'game' => $game,
         'company' => $company,
         'release_date' => $release_date,
         'platform' => $platform,
         'website' => $website
       ];
       return view('show_game')->with('data', $data);
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
