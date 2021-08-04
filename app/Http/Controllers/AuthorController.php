<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function store()
    {
        Author::create($this->validateRequest());
    }

    /**
     * @return array
     */
    protected function validateRequest(): array
    {
        return request()->validate(
            [
                'name' => 'required',
                'dob' => 'required',
            ]
        );
    }
}
