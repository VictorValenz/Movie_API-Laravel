<?php

namespace App\Http\Controllers;

use App\Models\Streaming_movie;


use Illuminate\Http\Request;

class Streaming_MoviesController extends Controller
{
    public function index()
    {
        $streaming_movie = Streaming_movie::all();
        return $streaming_movie;
        //return response()->json(['mensaje'=>'funciona']);
    }
}
