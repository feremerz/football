<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PlayerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
          'data'=>$this->collection->map(function ($item){
              return[
                'fname'=>$item->fname,
                'lname'=>$item->lname,
                  'team'=>$item->team
              ];

          })
        ];
    }
}
