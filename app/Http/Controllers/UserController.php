<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view("user.create");
    }

    public function store()
    {
        $cities = City::all();

        $data = request()->validate(
            [
                "fio" => "",
                "email" => "",
                "password" => "",
                "phone" => "",
            ]
        );

        User::create($data);
        return redirect()->route("home.index", compact("cities"));
    }
}