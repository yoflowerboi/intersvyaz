<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rates;

class HomeController extends Controller
{
    // Подсчёт тарифов
    public function index()
    {
        
        $rates_count= Rates::all()->count();
        return view('admin.home.index',[
            'rates_count'=>$rates_count
        ]);
    }

    // Вывод тарифов
    public function showing()
    {
        $rates = Rates::orderBy('id')->get();
        return view('welcome',[
            'rates'=>$rates
        ]);
    }
}