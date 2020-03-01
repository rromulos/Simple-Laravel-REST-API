<?php

namespace App\Http\Controllers;

use App\Book;
use Log;
use Validator;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function getAll(){
        return response()->json(Book::get(),200);
    }

    public function getBookByISBN($isbn){
        $book = Book::where('isbn', '=', $isbn)->first();
        if(!$book){
            return response()->json(["message" => "Book not found"],404);
        }
        return response()->json($book,200);
    }

    public function create(Request $request)
    {
        $rules = [
          'title'  => 'required|min:5|max:100|unique:books',
          'author' => 'required|min:5|max:50',
          'ISBN'   => 'required|max:20|unique:books',
          'year'   => 'required|min:4|max:4',
          'number_pages'   => 'required|min:1',
          'price'  => 'required|regex:/^\d+(\.\d{1,2})?$/',

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        if(is_null($book)){
            return response()->json(["message" => "Book not found"],404);
        }
        $book->update($request->all());
        return response()->json($book,200);
    }

    public function delete(Request $request, $id){
        $book = Book::find($id);
        if(is_null($book)){
            return response()->json(["message" => "Book not found"],404);
        }
        $book->delete();
        return response()->json(null,204);
    }
}
