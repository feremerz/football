<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\TeamCollection;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Team as TeamResource;

class TeamController extends Controller
{
    public function update(Request $request,$id)
    {
        $team=Team::find($id);
        $team->update([
            'name'=>$request->name
        ]);
        return response([
           'data'=>$team,
           'status'=>'success'
        ]);

    }

    public function list()
    {
       $teams= Team::paginate(5);
//       return response([
//          'data'=>$teams,
//          'status'=>'success'
//       ],200);
        return new TeamCollection($teams);
    }
    public function single($id)
    {
        $teams= Team::find($id);
//        return response([
//            'data'=>$teams,
//            'status'=>'success'
//        ],200);
        return new TeamResource($teams);
    }
}
