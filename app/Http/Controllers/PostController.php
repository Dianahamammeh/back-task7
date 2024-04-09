<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function rules(): array
    {
        return [
         
         'content' => ['required', 'string'],
         'publishedAt' => ['nullable', JsonApiRule::dateTime()],
         'slug' => ['required', 'string', Rule::unique('posts', 'slug')],
          'tags' => JsonApiRule::toMany(),
          'title' => ['required', 'string'],
        ];
    }
}
