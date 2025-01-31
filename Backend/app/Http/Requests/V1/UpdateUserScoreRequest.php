<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserScoreRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PATCH') {
            return [
                'name' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'points' => ['sometimes', 'required'],
                'age' => ['sometimes', 'required']
            ];
        } else {
            return [
                'name' => ['required'],
                'address' => ['required'],
                'points' => ['required'],
                'age' => ['required']
            ];
        }
    }
}