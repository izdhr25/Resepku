@extends('layouts.app')

@section('title', 'Detail Resep | Resepku')

@section('content')
    <div class="container">
        <br>
        <h2 class="text-center"><b>{{ $resep->nama }}</b></h2>
        <hr class="mb-4">
        <center><img src="/assets/resep/{{ $resep->image }}" class="img-fluid mb-3" width="25%"></center>
        <h5 class="mb-3"><b>{{ $resep->nama }}</b></h5>
        <label class=""><b>Bahan</b></label>
        <p class="mb-3">{!! $resep->bahan !!}</p>
        <label class=""><b>Langkah - Langkah</b></label>
        <p class="mb-3">{!! $resep->langkahlangkah !!}</p>
        <div id="disqus_thread"></div>
    </div>
@endsection
