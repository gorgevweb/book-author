<?php
use App\Models\Author;
use App\Models\Book;

if (!function_exists('getAuthorAllBooks')) {

    /**
     * @param Author $author
     * @return mixed
     */
    function getAuthorAllBooks(Author $author)
    {
        return $author->whereHas('books')->first();
    }

}
