<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AnswerResource extends JsonResource
{
    public static $wrap = 'all_answers';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
