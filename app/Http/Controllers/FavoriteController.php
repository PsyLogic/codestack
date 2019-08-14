<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the all favorites.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Change Favorite by toggling the attachment status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeFavoriteStatus(Question $question)
    {
        $question->favorites()->toggle(auth()->id());
        return back();
    }
}
