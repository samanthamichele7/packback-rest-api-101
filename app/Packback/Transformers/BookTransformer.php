<?php namespace Packback\Transformer;

use Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    /**
     * Turn book object into generic array
     *
     * @param Book $book
     * @return array
     */
    public function transform(Book $book)
    {
        return [
            'id' => (int) $book->id,
            'isbn13' => $book->isbn13,
            'title' => $book->title,
            'author' => $book->author,
            // If we needed to rename the 'price' field to 'msrp'
            'msrp' => '$' . money_format('%i', $book->price)
        ];
    }
}
