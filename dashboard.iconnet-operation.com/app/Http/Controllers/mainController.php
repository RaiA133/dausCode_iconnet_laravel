<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class mainController extends Controller
{
  public function dashboard(Request $request, $region = 'BANDUNG') {
    $response = Http::get("https://sheets.googleapis.com/v4/spreadsheets/17JHm_VIMaJG3D_JADeCYWFTxRUiKe7LTTTXCZjAlhmU/values/FDT_FAT!A5:N30095?key=AIzaSyCwOuZAm8MkSet-tEv7sYCrkFUx8HSsAnk&majorDimension=ROWS");
    $data = $response->json();
    $dataRegion = $data["values"];

    // Filter data by region
    $filteredData = array_filter($data['values'], function ($row) use ($region) {
        return strcasecmp($row[13], $region) === 0;
    });
    //data yang sudah di filter
    $data = $filteredData;
    
    // dari data yang sudah di filter, mengambil item 0 dan 7 
    // untuk kebutuhan maps
    $mapsData = [];
    foreach ($data as $item) {
        // Mengambil elemen ke-0 dan ke-7 dari setiap array
        $element0 = $item[0];
        $element7 = $item[7];
    
        // Menambahkan data ke dalam array $mapsData
        $mapsData[] = [$element0, $element7];
    }
    
    
    // dd($mapsData);
    
    $auth = Auth::user();
    return view('dashboard', [
        "title" => "Dashboard",
        "dataRegion" => $dataRegion,
        "data" => $data,
        "region" => $region,
        "auth" => $auth,
        "mapsData" => $mapsData,
    ]);
  }


    public function halaman2() {
      $auth = Auth::user();
        return view('halaman2', [
            "title" => "Halaman 2",
            "auth"=>$auth        
        ]);
    }


    public function fetchDataFromGoogleSheets()
    {
        $region = "BANDUNG";
        $fat = "FAT";
        $apiKey = 'AIzaSyCwOuZAm8MkSet-tEv7sYCrkFUx8HSsAnk';
        $spreadsheetId = '17JHm_VIMaJG3D_JADeCYWFTxRUiKe7LTTTXCZjAlhmU';
        $range = 'FDT_FAT!A5:N15';
    
        $response = Http::get("https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheetId}/values/{$range}", [
            'key' => $apiKey,
            'majorDimension' => 'ROWS',
        ]);
    
        if ($response->successful()) {
            $data = $response->json();
    
            // Filter data based on $region and $fat
            $filteredData = array_filter($data['values'], function ($row) use ($region, $fat) {
                return $row[13] === $region;
            });
    
            dd($filteredData);
        } else {
            // Handle the error response
            return response()->json(['error' => 'Failed to fetch data from Google Sheets API'], $response->status());
        }
    }
    
  }