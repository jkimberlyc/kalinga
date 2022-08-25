<?php

namespace App\Http\Controllers;

use App\Models\DocSpecialty;
use App\Models\Doctor;
use App\Models\Specialization;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function getLocations()
    {
        $locations = [];
        $data = Http::get('https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json')
            ->collect()
            ->flatten(1)
            ->filter(fn ($item) => \is_array($item))
            ->flatMap(fn ($v) => $v);

        foreach ($data as $province => $municipalities) {
            foreach ($municipalities['municipality_list'] as $municipality => $barangays) {
                $locations[] = "{$municipality}, {$province}";
            }
        }
        $specializations = Specialization::all();
        return view('welcome', compact('specializations', 'locations'));
    }


    function showResults()
    {
        $locations = [];
        $data = Http::get('https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json')
            ->collect()
            ->flatten(1)
            ->filter(fn ($item) => \is_array($item))
            ->flatMap(fn ($v) => $v);

        foreach ($data as $province => $municipalities) {
            foreach ($municipalities['municipality_list'] as $municipality => $barangays) {
                $locations[] = "{$municipality}, {$province}";
            }
        }

        $specializations = Specialization::all();
        return view('search', compact('specializations', 'locations'));
    }


    public function getCitiesProvinces()
    {
        $cities = [];
        $provinces = [];
        $data = Http::get('https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json')
            ->collect()
            ->flatten(1)
            ->filter(fn ($item) => \is_array($item))
            ->flatMap(fn ($v) => $v);

        foreach ($data as $province => $municipalities) {
            $provinces[] = "{$province}";
            foreach ($municipalities['municipality_list'] as $municipality => $barangays) {
                $cities[] = "{$municipality}";
            }
        }

        return (compact('cities', 'provinces'));
    }

    public function search(Request $request)
    {
        $spec = Specialization::where('specialization', $request['specialization'])->first();
        $locArr = explode(',', $request['location']);
        $city = $locArr[0];
        $docIDs = DocSpecialty::where('specialty_id', '=', $spec->id)->pluck('doctor_id')->toArray();
        // dd($docIDs);
        $searchResults = DB::table('doctors')
            ->where('hospitals.hospitalCity', $city)
            ->whereIn('doctors.id', $docIDs)
            ->join('affiliations', 'affiliations.doctor_id', '=', 'doctors.id')
            ->join('hospitals', 'hospitals.id', '=', 'affiliations.hospital_id')
            ->get();
        // dd($searchResults);

        $timeslots = DB::table('affiliations')->join('timeslots', 'timeslots.affiliation_id', '=', 'affiliations.id')->get();
        // dd($timeslots);

        $locations = [];
        $data = Http::get('https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json')
            ->collect()
            ->flatten(1)
            ->filter(fn ($item) => \is_array($item))
            ->flatMap(fn ($v) => $v);

        foreach ($data as $province => $municipalities) {
            foreach ($municipalities['municipality_list'] as $municipality => $barangays) {
                $locations[] = "{$municipality}, {$province}";
            }
        }
        $specializations = Specialization::all();
        return view('search', compact('specializations', 'locations', 'searchResults', 'request', 'timeslots'))->with('specialty', $spec);
    }
}
