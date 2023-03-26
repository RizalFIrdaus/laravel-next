<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Resources\BookResources;
use App\Service\Books as BookService;
use App\Http\Requests\BooksRequestForm;

class BooksController extends Controller
{

    public function __construct(private BookService $booksService)
    {
    }

    public function index()
    {
        $books = Books::all();
        return new BookResources($books, "Get data books successfully");
    }

    public function store(BooksRequestForm $request)
    {
        $price_without_rp = str_replace("Rp ", "", $request->input("price"));
        $price_integer = floatval(str_replace(".", "", $price_without_rp));

        $book = Books::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "price" => $price_integer,
        ]);
        return new BookResources($book, "Data book successfully added");
    }

    public function show(string $id)
    {
        $book = $this->booksService->getBook($id);
        return new BookResources($book, "Get data book successfully");
    }

    public function update(BooksRequestForm $request, string $id)
    {
        $book = $this->booksService->getBook($id);
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->price = $request->input('price');
        $book->update();

        return new BookResources($book, "Data book successfully updated");
    }

    public function destroy(string $id)
    {
        $book = $this->booksService->getBook($id);
        if ($book instanceof Books) {
            $book->delete();
        }
        return new BookResources($book, "Data book successfully deleted");
    }
}
