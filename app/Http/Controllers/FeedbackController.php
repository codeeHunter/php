<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function create()
    {
        return view("feedback.create");
    }

    public function store()
    {
        $data = request()->validate([
            "title" => "",
            "text" => "",
            "rating" => "",
            "img" => "",
        ]);

        dd($data);
    }
}