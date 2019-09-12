<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BitemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
			return [
					'food'=>$this->where('category','food')->toArray(),
					'giving'=>$this->where('category','giving')->toArray(),
					'savings'=>$this->where('category','savings')->toArray(),
					'housing'=>$this->where('category','housing')->toArray(),
					'lifestyle'=>$this->where('category','lifestyle')->toArray(),
					'insurance'=>$this->where('category','insurance')->toArray(),
					'health'=>$this->where('category','health')->toArray(),
					'transportation'=>$this->where('category','transportation')->toArray()
			];
					
    }
}
