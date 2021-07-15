<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $response = $this->post(
            '/books',
            [
                'title' => 'Book Title',
                'author' => 'Teun',
            ]
        );

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        $response = $this->post(
            '/books',
            [
                'title' => '',
                'author' => 'Teun',
            ]
        );

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_author_is_required()
    {
        $response = $this->post(
            '/books',
            [
                'title' => 'Book Title',
                'author' => '',
            ]
        );

        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post(
            '/books',
            [
                'title' => 'Book Title',
                'author' => 'Teun',
            ]
        );

        $book = Book::first();
        $response = $this->patch(
            '/books/' . $book->id,
            [
                'title' => 'New Book Title',
                'author' => 'New author',
            ]
        );

        $this->assertEquals('New Book Title', Book::first()->title);
        $this->assertEquals('New author', Book::first()->author);
    }
}
