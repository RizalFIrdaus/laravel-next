<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequestForm;
use App\Http\Resources\BookResources;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return new BookResources($books, "Get data books successfully");
    }

    public function store(BooksRequestForm $request)
    {
        $book = Books::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "price" => $request->input("price"),
        ]);
        return new BookResources($book, "Data book successfully added");
    }
}
