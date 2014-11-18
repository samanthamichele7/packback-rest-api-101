<?php

class BookController extends BaseController
{
    /**
     * Get all books
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::all();

        return Response::json([
            'data' => $books
        ]);
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

        return Response::json([
            'data' => $book
        ]);
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

        return Response::json([
            'data' => $book
        ]);
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

        return Response::json([
            'data' => $book
        ]);
    }

    /**
     * Delete a book
     *
     * @param $book_id
     * @return Response
     */
    public function destroy($book_id)
    {
        $book = User::findOrFail($book_id);

        $book->users()->sync([]);

        $book->delete();

        return Response::json([
            'success' => true
        ]);
    }
}
