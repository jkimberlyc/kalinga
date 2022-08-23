<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    function getLocations()
    {
        $arr = [];
        $data = Http::get('https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json')
            ->collect()
            ->flatten(1)
            ->filter(fn ($item) => \is_array($item))
            ->flatMap(fn ($v) => $v);

        foreach ($data as $province => $municipalities) {
            foreach ($municipalities['municipality_list'] as $municipality => $barangays) {
                $arr[] = "{$municipality}, {$province}";
            }
        }


        // return array_keys($data['01']['province_list']['ILOCOS NORTE']['municipality_list']);
        return view('welcome', ['data' => $arr]);
    }
}
