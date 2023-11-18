<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Resep;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $resep = Resep::orderBy('created_at', 'DESC')->get();

        return view('welcome', compact('resep'));
    }

    public function detail($id)
    {
        $resep = Resep::all();

        $decodedId = base64_decode($id);
        $resep = Resep::findOrFail($decodedId);

        return view('detail', compact('resep'));
    }

    public function index()
    {
        return view('home');
    }

    public function update(Request $data)
    {
        $data->validate([
            'image' => ['nullable'],
            'imageLama' => 'string',
            'name' => 'string',
            'email' => 'email',
            'password' => ['string', 'min:8'],
            'passwordLama' => 'string',
            'tempat_lahir' => 'string',
            'birth' => 'date',
            'alamat'=> 'string',
            'kelurahan' => 'string',
            'kecamatan' => 'string',
            'kota' => 'string',
            'kode_pos' => 'string',
        ]);       


        if($image = $data->file('image')){
            $imageName = $image->getClientOriginalName();
            $tujuan_upload = 'assets/user';
            $image->move($tujuan_upload, $imageName);
        }

        $id = $data->id;

        if($data['image'] && $data['password'] == null){
            User::where('id', $id)->update([
                'image' => $data['imageLama'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['passwordLama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'birth' => $data['birth'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kota'],
                'kode_pos' => $data['kode_pos'],
            ]);
        } else if($data['password'] !== null){
            User::where('id', $id)->update([
                'image' => $data['imageLama'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'tempat_lahir' => $data['tempat_lahir'],
                'birth' => $data['birth'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kota'],
                'kode_pos' => $data['kode_pos'],
            ]);
        } else if($data['image'] !== null){
            User::where('id', $id)->update([
                'image' => $imageName,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['passwordLama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'birth' => $data['birth'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kota'],
                'kode_pos' => $data['kode_pos'],
            ]);
        } else {
            User::where('id', $id)->update([
                'image' => $imageName,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'tempat_lahir' => $data['tempat_lahir'],
                'birth' => $data['birth'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kota'],
                'kode_pos' => $data['kode_pos'],
            ]);
        }

        return redirect('/home')->with('message', 'Data Berhasil Diedit'); 
    }
}
