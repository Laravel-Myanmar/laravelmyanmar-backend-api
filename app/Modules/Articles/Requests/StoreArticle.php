<?php

namespace App\Modules\Articles\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'preview' => 'required|min:10',
            'description' => 'required|min:10',
        ];
    }
}