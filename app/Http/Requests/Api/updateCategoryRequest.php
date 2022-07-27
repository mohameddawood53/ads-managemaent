<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;

class updateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|unique:categories,name," . $this->id
         ];
    }
}
