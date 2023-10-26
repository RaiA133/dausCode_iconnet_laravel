<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mainController extends Controller
{
    public function dashboard(Request $request, $region = 'BANDUNG') {
        $response = Http::get("https://sheets.googleapis.com/v4/spreadsheets/17JHm_VIMaJG3D_JADeCYWFTxRUiKe7LTTTXCZjAlhmU/values/{$region}!A1:AA20?key=AIzaSyCwOuZAm8MkSet-tEv7sYCrkFUx8HSsAnk&majorDimension=ROWS");
        $data = $response->json();
        $fat = $data["values"];
        
        return view('dashboard', [
            "title" => "Dashboard",
            "fat" => $fat,
            "region" => $region,
        ]);
    }

    public function halaman2() {
        return view('halaman2', [
            "title" => "Halaman 2",        
        ]);
    }
}
