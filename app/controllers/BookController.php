<?php

use Packback\Transformer\BookTransformer;

class BookController extends ApiController
{
    /**
     * Get all books
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::all();

        return $this->respondWithCollection($books, new BookTransformer);
    }

    /**
     * Get a single book
     *
     * @param $book_id
     * @return Response
     */
    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);

        return $this->respondWithItem($book, new BookTransformer);
    }

    /**
     * Store a book
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('isbn13', 'title', 'author', 'price');

        $book = Book::create($input);

        return $this->respondWithItem($book, new BookTransformer);
    }

    /**
     * Update a book
     *
     * @param $book_id
     * @return Response
     */
    public function update($book_id)
    {
        $input = Input::only('isbn13', 'title', 'author', 'price');

        $book = Book::find($book_id);

        $book->update($input);

        return $this->respondWithItem($book, new BookTransformer);
    }

    /**
     * Delete a book
     *
     * @param $book_id
     * @return Response
     */
    public function destroy($book_id)
    {
        $book = Book::findOrFail($book_id);

        // Remove all user relationships
        $book->users()->sync([]);

        $book->delete();

        return Response::json([
            'data' => [
                'success' => true
            ]
        ]);
    }
}
