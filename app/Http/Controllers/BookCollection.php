<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookStory;

class BookCollection extends Controller
{
    public function getAll(Request $request) {
        $books = BookStory::paginate(5);
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

    public function update(Request $request, Variablename $name){
        $books = BookStory::findorFail($name);
        $books->name = $request->name;
        $books->ISBN = $request->ISBN;
        $books->value = $request->value;
        $books->save();

        return response()->json($books);
    }

    public function destroy(Request $request){
        $books = BookStory::findorFail($name);
        if ($books->delete()){
            return response()->json([
                'status' => 'Book Deleted!',
            ], 200);

        }
        return response()->json([
            'status' => 'Failed the Delete',
        ], 400);

    }
}
