<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DocSpecialty;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\map;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
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

        return view('auth.register', compact('cities', 'provinces'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function createDoctor(array $data)
    // {
    //     $user = User::create([
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'role' => 'Doctor'
    //     ]);

    //     $doctor = Doctor::create([
    //         'firstName' => $data['firstName'],
    //         'middleName' => $data['middleName'],
    //         'lastName' => $data['lastName'],
    //         ''
    //     ]);
    // }

    public function register(Request $request)
    {
        // dd($request);
        $doctor = new Doctor();

        //create user account for doctor
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => "Doctor",
        ]);

        $file = $request->file('license');
        $fileName = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('licenses/'), $fileName);

        $doctor->firstName = $request['firstName'];
        $doctor->middleName = $request['middleName'];
        $doctor->lastName = $request['lastName'];
        $doctor->gender = $request['genderSelect'];
        $doctor->phoneNumber = $request['phoneNumber'];
        $doctor->mobileNumber = $request['mobileNumber'];
        $doctor->address = $request['address'];
        $doctor->city = strtoupper($request['city']);
        $doctor->province = strtoupper($request['province']);
        $doctor->license = $fileName;
        $doctor->user_id = $user->id;
        $doctor->save();

        //find and store specializations
        foreach ($request['specialization'] as $specialization) {
            $res = Specialization::where('specialization', $specialization)->first();

            //if specialization exists, create doc_specialty entry
            if ($res) {
                $docSpec = new DocSpecialty();
                $docSpec->doctor_id = $doctor->id;
                $docSpec->specialty_id = $res->id;
                $docSpec->save();
            }
            //else create new specialization entry first
            else {
                $specialty = new Specialization();
                $specialty->specialization = $specialization;
                $specialty->save();

                $docSpec = new DocSpecialty();
                $docSpec->doctor_id = $doctor->id;
                $docSpec->specialty_id = $specialty->id;
            }
        }

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
        $specializations = Specialization::all();
        return view('auth.doctor-register', compact('specializations', 'cities', 'provinces'))->with('successMsg', 'Registration successful. Please check your email for approval.');
    }

    public function registerPatient(Request $request)
    {
        $patient = new Patient();

        //create user account for doctor
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => "Patient",
            'isApproved' => 1
        ]);

        $patient->firstName = $request['firstName'];
        $patient->middleName = $request['middleName'];
        $patient->lastName = $request['lastName'];
        $patient->gender = $request['genderSelect'];
        $patient->birthdate = Carbon::parse($request['birthdate'])->format('Y-m-d H:i:s');
        $patient->phoneNumber = $request['phoneNumber'];
        $patient->mobileNumber = $request['mobileNumber'];
        $patient->mobileNumber = $request['mobileNumber'];
        $patient->emergencyContact = $request['emergencyContact'];
        $patient->address = $request['address'];
        $patient->city = strtoupper($request['city']);
        $patient->province = strtoupper($request['province']);
        $patient->user_id = $user->id;
        $patient->save();

        return view('auth.register')->with('successMsg', 'Registration successful. Check your email to activate your account.');
    }

    public function showDoctor()
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
        return view('auth.doctor-register', compact('cities', 'provinces'));
    }
}
