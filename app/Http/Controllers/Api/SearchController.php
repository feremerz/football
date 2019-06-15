<?php

namespace App\Http\Controllers\Api;

use App\Player;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search($keyword)
    {
        $teams=Team::where('name',$keyword)->get();
        $player=Player::where('fname',$keyword)->orWhere('lname',$keyword)->get();

        return response([
           'data'=>[
               'teams'=>$teams,
               'player'=>$player
           ] ,
            'status'=>'success'
        ],200);
    }
}
