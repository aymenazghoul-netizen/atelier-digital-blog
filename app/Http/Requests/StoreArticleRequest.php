<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:articles,title'],
            'excerpt' => ['required', 'string', 'max:160'],
            'content' => ['required', 'string', 'min:50'],
            'published' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.unique' => 'Un article porte déjà ce titre.',
            'excerpt.required' => 'Le résumé est obligatoire.',
            'excerpt.max' => 'Le résumé ne doit pas dépasser 160 caractères.',
            'content.required' => 'Le contenu est obligatoire.',
            'content.min' => 'Le contenu doit contenir au moins 50 caractères.',
        ];
    }
}
