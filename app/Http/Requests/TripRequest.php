<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
            'country_id' => 'required|exists:countries,id',
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'hotel_name' => 'required',
            'hotel_rate' => 'required|numeric',
            'start_day'=> 'required|date',
            'end_day' => 'required|date',
            'max_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
            'schedule' => '',
            'day' => '',
            'day.*.number' => 'required',
            'day.*.description' => 'required',

        ];
    }
}
