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
					['category'=>$this->where('category','food')->toArray(), 'title'=>'Food'],
					['category'=>$this->where('category','giving')->toArray(), 'title'=>'Giving'],
					['category'=>$this->where('category','savings')->toArray(), 'title'=>'Savings'],
					['category'=>$this->where('category','housing')->toArray(), 'title'=>'Housing'],
					['category'=>$this->where('category','lifestyle')->toArray(), 'title'=>'Lifestyle'],
					['category'=>$this->where('category','insurance')->toArray(), 'title'=>'Insurance'],
					['category'=>$this->where('category','health')->toArray(), 'title'=>'Health'],
					['category'=>$this->where('category','transportation')->toArray(), 'title'=>'Transportation']
			];
					
    }
}
