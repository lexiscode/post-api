<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Http\Requests\AbstractFormRequest;


final class PostRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'user_id' => ['required', 'integer', Rule::exists(User::getTableName(), 'id')],
        ];
    }
}
