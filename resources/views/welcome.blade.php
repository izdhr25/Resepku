@extends('layouts.app')

@section('title', 'Landing Page | Resepku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <img src="assets/landing/landingutama.png" class="img-fluid" width="100%">
        </div>

        <div class="col-lg-6">
            <div style="margin-top: 13rem; margin-bottom: 13rem">
                <h2>Temukan Resepmu!</h2>
                <p>Berbagi inspirasi resep di Resepku. Dengan aplikasi Resepku anda dapat memasak dengan panduan resep yang ada di Resepku. Selain itu, anda dapat membuat dan membagikan resep kepada orang banyak dimana pun dan kapan pun.</p>
            </div>     
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mt-5">Daftar Resep</h2>
        <hr class="mb-4">

        <div class="row justify-content-center">
            @foreach($resep as $reseps)
            <div class="col-lg-3">
                <a href="{{ route('detail', base64_encode($reseps->id)) }}" style="text-decoration: none;">
                    <div class="card bg-white" style="border: none; box-shadow: 1px 1px 2px 1px grey;">  
                        <div class="card-body">
                            <img src="assets/resep/{{ $reseps->image }}" class="img-fluid mb-3" height="50px">
                            <h5 class="mb-3">{{ $reseps->nama }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
   

</div>
@endsection
