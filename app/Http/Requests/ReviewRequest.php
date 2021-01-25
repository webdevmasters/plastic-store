<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return $rules = [
            'reviewer' => 'required|string',
            'email'    => 'required|string|email:rfc,dns',
            'comment'  => 'required|string|max:255',
            'rating'   => 'integer|min:1'
        ];
    }
}
