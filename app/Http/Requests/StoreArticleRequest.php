<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // DA IMPOSTARE PERCHè DI DEFAULT è FALSE .!!!! 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'category_id'=> 'required|max:50',
            'title'=> 'required|max:150',
            'body'=> 'required|max:5000',
        ];
    }

    public function messages(): array
    {

            return [
                
            ];
    }
    
}
