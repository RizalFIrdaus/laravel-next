<?php

namespace App\Service;

use App\Models\Books as Book;

class Books
{
    public function getBook($id)
    {
        $book = Book::where('id', $id)->first();
        if (!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Data book not found!'
            ]);
        }
        return $book;
    }
}
