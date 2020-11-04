<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AnswerResource extends JsonResource
{
    public static $wrap = 'answers';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'answers' => [
                'id' => $this->id,
                'announcement_id' => $this->announcement_id,
                'user_id' => $this->user_id,
                'which' => $this->which,
                'price' => $this->price,
                'seen' => $this->seen,
                'created_at' => $this->created_at,
//                'created_at' => Carbon::parse($this->created_at)->format('d/m/Y | H:m'),
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
