<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreProductRequest extends FormRequest {


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
        $rules = $rules = [
            'name'              => 'required',
            'description'       => 'max:255',
            'manufacturer'      => 'required',
            'sizes'             => 'required|distinct',
            'category'          => 'required',
            'subcategory'       => 'required',
            'prices'            => 'required|distinct',
            'prices.*'          => 'numeric',
            'colors'            => 'required|distinct',
            'images.*'          => 'mimes:jpg,png',
            'discounted_prices' => 'required_if:sale,true',
        ];
        if(Route::has('admin.products.update')) {
            $rules['code'] = 'sometimes|required';
            $rules['images'] = '';
        } else {
            $rules['code'] = 'required|unique:products';
            $rules['images'] = 'required';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {
        return [

        ];
    }
}
