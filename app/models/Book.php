<?php

class Book extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * Whitelisted traits
     *
     * @var array
     */
    protected $fillable = ['isbn13', 'title', 'author', 'price'];


    /**
     * Set up many-to-many relationship with User
     *
     * @return User Collection
     */
    public function users()
    {
        return $this->belongsToMany('User', 'books_users');
    }
}
