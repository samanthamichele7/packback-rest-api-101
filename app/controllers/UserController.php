<?php

class UserController extends BaseController
{
    /**
     * Get all users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return Response::json([
            'data' => $users
        ]);
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

        return Response::json([
            'data' => $user
        ]);
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

        return Response::json([
           'data' => $books
        ]);
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

        return Response::json([
            'success' => true,
            'data' => $user
        ]);
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

        return Response::json([
            'success' => true,
            'data' => $user->books
        ]);
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

        return Response::json([
            'success' => true,
            'data' => $user
        ]);
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

        return Response::json([
            'success' => true,
            'data' => $user->books
        ]);
    }
}
