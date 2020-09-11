<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendAnnounceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'spare_parts' => 'required',
            'when' => 'required',
            'texpassport' => 'required',
            'image' => 'mimes:jpeg,png,bmp,gif,svg,webp',
            'note' => 'string',
        ];
    }
}
