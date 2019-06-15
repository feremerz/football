<?php

namespace App\Http\Resources\Api;

use http\Env\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return  [
          'fname'=>$this->fname,
          'lname'=>$this->lname,
          'team'=>$this->team
        ];
    }

    public function with($request)
    {
        return [
          'status'=>'success'
        ];
}

}
