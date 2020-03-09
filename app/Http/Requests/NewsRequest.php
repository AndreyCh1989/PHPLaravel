<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
        $categoryTable = (new Category())->getTable();

        return [
            "category_id" => [
                "required",
                Rule::exists($categoryTable, 'id'),
            ],
            "text" => "required|min:10|max:5000",
            "title" => "required|min:5|max:100"
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'category_id' => 'Category',
            'text' => 'Text',
            'title' => 'Title'
        ];
    }
}
