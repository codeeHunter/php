<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(City $city)
    {
        $feedbacks = Feedback::where("city_id", $city->id)->get();
        return view("feedback.index", compact("feedbacks", "city"));
    }

    public function create()
    {
        return view("feedback.create");
    }

    public function store(Request $request)
    {
        $feedback = new Feedback;
        $feedback->title = $request->input('title');
        $feedback->text = $request->input('text');
        $feedback->rating = $request->input('rating');


        $cityExists = City::where('name', $request->input('city'))->count() > 0;

        if (!$cityExists) {
            City::create(["name" => $request->input('city')]);
        }

        $city = City::where('name', $request->input('city'))->first();


        $feedback->city_id = $city->id;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $feedback->img = $filename;
        }



        $feedback->save();

        return redirect()->route("home.index");
    }


    public function edit(City $city, Feedback $feedback)
    {
        return view("feedback.show", compact("feedback", "city"));
    }

    public function update(City $city, Feedback $feedback)
    {
        $data = request()->validate([
            "title" => "string",
            "text" => "string",
            "img" => "string",
            "rating" => "",
        ]);

        $feedback->update($data);

        return redirect()->route("feedbacks.index", $city);
    }

    public function destroy(City $city, Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route("feedbacks.index", $city);
    }
}