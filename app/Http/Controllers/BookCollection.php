<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookStory;

class BookCollection extends Controller
{
    public function getAll() {
        $books = BookStory::all();
        return $books;
    }

    public function create(Request $request) {
        $books = $request->books;
        foreach($books as $booking) {

            BookStory::create([
                'name' => $booking['name'],
                'ISBN' => $booking['ISBN'],
                'value' => $booking['value']
            ]);
        }

        return response()->json($booking);
    }

    public function update(Request $request, int $id){
        $book = BookStory::FindOrFail($id);

        if(is_null($book)){
            return response()->json([
                'status' => 'book not found'
            ]);
        }

        $book->name = $request->name;
        $book->ISBN = $request->ISBN;
        $book->value = $request->value;
        $book->save();


        return response()->json($book);
    }

    public function destroy(int $id){
        $book = BookStory::FindOrFail($id);

        if (is_null($book)) {
            return response()->json([
                'status' => 'Book not found'
            ]);
        }


        if ($book->delete()){
            return response()->json([
                'status' => 'Book Deleted!',
            ], 200);

        }
        return response()->json([
            'status' => 'Failed the Delete',
        ], 400);

    }
}
