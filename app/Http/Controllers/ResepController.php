<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Resep;

class ResepController extends Controller
{
    public function index()
    {
    	$resep = Resep::where('id', Auth::user()->id)->get();
    	return view('resep', compact('resep'));	
    }

    public function store(Request $data)
    {
    	 $data->validate([
    	 	'penulis' => ['required', 'string'],
            'image' => ['required', 'image'],
            'nama' => ['required', 'string'],
            'bahan' => ['required', 'string'],
            'langkahlangkah' => ['required', 'string'],
        ]);       


        if($image = $data->file('image')){
            $imageName = $image->getClientOriginalName();
            $tujuan_upload = 'assets/resep';
            $image->move($tujuan_upload, $imageName);
        }

        Resep::create([
        	'penulis' => $data['penulis'],
            'image' => $imageName,
            'nama' => $data['nama'],
            'bahan' => $data['bahan'],
            'langkahlangkah' => $data['langkahlangkah'],
        ]);
    
    	return redirect('/resep')->with('message', 'Data Berhasil Ditambahkan'); 
    }
}
