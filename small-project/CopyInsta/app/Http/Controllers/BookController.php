<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function store(Request $request) {
        $title = $request->title;
        $author = $request->author;
        $res = DB::table('books')->insert([
            'title' => $title,
            'author' => $author
        ]);
        print_r($res);
    }
}
