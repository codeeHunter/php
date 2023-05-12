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

        if (session('city') > 0) {
            if ($city) {
                $cityBD = City::all();

                foreach ($cities as $city) {
                    $cities->add($city->name);
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
            $city = City::where('name', $city)->first() > 0;
            if ($city) {
                $city = City::where('name', $city)->first();
                $cityId = $city->id;
            }

            $feedbacks = Feedback::all();
            return view('home.index', compact("cities", "feedbacks", "isShow"));
        }

        $feedbacks = Feedback::all();



        return view('home.index', compact("cities", "feedbacks", "isShow"));
    }
}