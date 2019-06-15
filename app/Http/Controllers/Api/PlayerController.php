<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\PlayerCollection;
use App\Http\Resources\Api\PlayerResource;
use App\Http\Resources\Api\TeamCollection;
use App\Player;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function update(Request $request,$id)
    {
        $validData=$this->validate($request,[
           'fname'=>'required',
           'lname'=>'required',
           'team_id'=>'required'
        ]);
        $player=Player::find($id);
            $player->update([
           'fname'=>$request->fname,
           'lname'=>$request->lname,
           'team_id'=>$request->team_id
        ]);
        return response([
            'data'=>$player,
            'status'=>'success'
        ]);
    }
    public function list()
    {
        $players= Player::paginate(5);
//       return response([
//          'data'=>$teams,
//          'status'=>'success'
//       ],200);
        return new PlayerCollection($players);
    }

    public function single($id)
    {
        $player=Player::find($id);
        return new PlayerResource($player);
    }
}
