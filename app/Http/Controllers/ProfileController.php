<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;

use MarcReichel\IGDBLaravel\Models\Artwork;
use MarcReichel\IGDBLaravel\Models\Company;
use MarcReichel\IGDBLaravel\Models\Cover;
use MarcReichel\IGDBLaravel\Models\Game;
use MarcReichel\IGDBLaravel\Models\GameVideo;
use MarcReichel\IGDBLaravel\Models\InvolvedCompany;
use MarcReichel\IGDBLaravel\Models\Platform;
use MarcReichel\IGDBLaravel\Models\ReleaseDate;
use MarcReichel\IGDBLaravel\Models\Website;



class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
    $i=0;
    $games = [];
    foreach ($wishlist as $wishlist_item) {
      $games[$i] = Game::select('name')->where('id', $wishlist_item['item_id'])->get();
      $i++;
    }

    $data = [
      'id' => Auth::user()->id,
      'forename' => Auth::user()->forename,
      'wishlist' => $wishlist,
      'games' => $games,
    ];

    return view('profile')->with('data', $data);
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

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    // $game = Game::find($id);
    //
    // $data = [
    //   'game' => $game,
    // ];
    // return view('profile')->with('data', $data);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = Auth::user();
    $data = [
      'forename' => $user->forename,
      'surname' => $user->surname,
      'email' => $user->email,
    ];
    return view('edit_profile')->with('data', $data);
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
    $user = Auth::user();
    $user->forename = $request->input('forename');
    $user->surname = $request->input('surname');
    $user->email = $request->input('email');
    $user->save();
    return redirect('/profile');
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'forename' => ['required', 'string', 'max:255'],
      'surname' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    ]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, $id)
  {
    $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('item_id', $request->input('item_id'));
    $wishlist->delete();
    return redirect('profile');
  }
}
