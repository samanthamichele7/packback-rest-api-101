<?php

use Packback\Transformer\BookTransformer;
use Packback\Transformer\UserTransformer;

class UserController extends ApiController
{
    /**
     * Get all users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return $this->respondWithCollection($users, new UserTransformer);
    }

    /**
     * Get a single user
     *
     * @param $user_id
     * @return Response
     */
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);

        return $this->respondWithItem($user, new UserTransformer);
    }

    /**
     * Show books for a particular user
     *
     * @param $user_id
     * @return mixed
     */
    public function showBooks($user_id)
    {
        $user = User::findOrFail($user_id);

        $books = $user->books;

        return $this->respondWithCollection($books, new BookTransformer);
    }

    /**
     * Store a user
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('email', 'name', 'password');

        $user = User::create($input);

        return $this->respondWithItem($user, new UserTransformer);
    }

    /**
     * Store book for a particular user
     *
     * @param $user_id
     * @return mixed
     */
    public function storeBooks($user_id, $book_id)
    {
        $user = User::findOrFail($user_id);

        $user->books()->attach($book_id);

        return $this->respondWithCollection($user->books, new BookTransformer);
    }

    /**
     * Update a user
     *
     * @param $user_id
     * @return Response
     */
    public function update($user_id)
    {
        $input = Input::only('email', 'name', 'password');

        $user = User::findOrFail($user_id);

        $user->update($input);

        return $this->respondWithItem($user, new UserTransformer);
    }

    /**
     * Delete a user
     *
     * @param $user_id
     * @return Response
     */
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);

        // Remove all book relationships
        $user->books()->sync([]);

        $user->delete();

        return Response::json([
            'success' => true
        ]);
    }

    /**
     * Remove book for a particular user
     *
     * @param $user_id
     * @return mixed
     */
    public function destroyBooks($user_id, $book_id)
    {
        $user = User::findOrFail($user_id);

        $user->books()->detach($book_id);

        return $this->respondWithCollection($user->books, new BookTransformer);
    }
}
