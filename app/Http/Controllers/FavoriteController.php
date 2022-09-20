<?php

namespace App\Http\Controllers;

use App\Models\Favorite;


use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::all();
        return $favorites;
        //return response()->json(['mensaje'=>'funciona']);
    }

    public function show($id)
    {
        $favorites = Favorite::where('id_user', $id)->get();
        return $favorites;
    }
}
