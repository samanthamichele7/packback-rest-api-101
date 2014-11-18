<?php namespace Packback\Transformer;

use User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'books'
    ];


    /**
     * Turn user object into generic array
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    /**
     * Include books in user
     *
     * @param User $user
     * @return League\Fractal\ItemResource
     */
    public function includeBooks(User $user)
    {
        $books = $user->books;

        return $this->collection($books, new BookTransformer);
    }
}
