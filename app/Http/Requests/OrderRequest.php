<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest {

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
        return [
            'first_name' => 'required|string|alpha|max:255',
            'last_name'  => 'required|string|alpha|max:255',
            'email'      => 'required|string|email:rfc,dns',
            'address'    => 'required|string|max:255',
            'city'       => 'required|string|alpha|max:255',
            'zip_code'   => 'required|numeric|digits:5',
            'phone'      => 'required|numeric|digits_between:9,12',
            'note'       => 'nullable|string|max:255',
            'payment_method'    => 'required',
            'terms'      => 'required',
        ];
    }
}
