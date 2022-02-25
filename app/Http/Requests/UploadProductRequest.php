<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UploadProductRequest extends FormRequest
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
    public function attributes()
{
    return [
        'pn' => 'Product Name',
        'pp' => 'Product Price',
        'pc' => 'Product Category',
        'pd' => 'Product Description',
        'file' => 'Product Image',
    ];
}
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pn' => 'required|string|max:100',
            'pp' => 'required|string|max:50',
            'pc' => 'required|string|max:50',
            'pd' => 'required|string|max:50',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|image|max:2048',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $pass=true;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=true;
       $errors=$validator->errors();
        throw new HttpResponseException(response()->view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products,'errors'=>$errors]));
    }
}
