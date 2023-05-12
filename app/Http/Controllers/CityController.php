<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();


        // определяем IP пользователя
        $ip = $_SERVER['REMOTE_ADDR'];

        // используем сторонний API для получения информации о местоположении по IP
        $location = file_get_contents("https://api.db-ip.com/v2/free/self");

        // декодируем JSON-ответ
        $locationData = json_decode($location, true);

        // получаем название города из данных о местоположении
        $city = isset($locationData['city']) ? $locationData['city'] : '';
        $isShow = false;

        if (session('city') == 0) {
            if (!$city) {
                // если город не определен, выводим список всех городов из БД
                // выводим список городов на страницу
                foreach ($cities as $city) {
                    dump($city->name);
                }
            } else {
                // если город определен, сохраняем его в сессии
                session(['city' => $city]);
                // выводим страницу с отзывами для выбранного города
                // использование метода put
                session()->put('expiration_time', now()->addHours(2));
            }
        }

        if (session('city') && session()->has('expiration_time') && now() < session()->get('expiration_time')) {
            $city = session('city');
            $city = City::where('name', $city)->first();
            $cityId = $city->id;
            $feedbacks = Feedback::all();

            if (!Feedback::where('city_id', $cityId)->get()) {
                $feedbacks = Feedback::where('city_id', $cityId)->get();
            } else {
                $feedbacks = [];
            }

            return view('home.index', compact("cities", "feedbacks", "isShow"));
        }

        $feedbacks = Feedback::all();

        return view('home.index', compact("cities", "feedbacks", "isShow"));
    }
}