<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function store()
    {
        Author::create(
            request()->only(
                [
                    'name',
                    'dob',
                ]
            )
        );
    }
}
