<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
          'data'=>  $this->collection->map(function ($item) {
                return [
                    'name' => $item->name,
                    'players' => $item->players
                ];

            }),
            'status'=>'success'
        ];
    }
}
