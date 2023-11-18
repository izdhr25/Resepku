@extends('layouts.app')

@section('title', 'Resep | Resepku')

@section('content')
<div class="container justify-content-center">
    <br>
	<h2 class="text-center mb-3">Tambah Resep</h2>

    @if($message = Session::get('message'))
    <div class="alert alert-success">
        <strong>Berhasil</strong>
        <p>{{ $message }}</p>
    </div>
    @endif

	<form method="POST" action="{{ route('resep.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="row mb-3">
            <label for="penulis" class="col-md-4 col-form-label text-md-end">{{ __('Penulis') }}</label>

            <div class="col-md-6">
                <input id="penulis" type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" autocomplete="penulis" autofocus value="{{ Auth::user()->name }}" readonly=""> 

                @error('penulis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    	<div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Gambar') }}</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>

            <div class="col-md-6">
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>

                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="bahan" class="col-md-4 col-form-label text-md-end">{{ __('Bahan') }}</label>

            <div class="col-md-6">
                <textarea id="content" type="text" class="form-control ckeditor @error('bahan') is-invalid @enderror" name="bahan" value="{{ old('bahan') }}" autocomplete="bahan" autofocus></textarea>

                @error('bahan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="langkahlangkah" class="col-md-4 col-form-label text-md-end">{{ __('Langkah - Langkah') }}</label>

            <div class="col-md-6">
                <textarea id="content" type="text" class="form-control ckeditor @error('langkahlangkah') is-invalid @enderror" name="langkahlangkah" value="{{ old('langkahlangkah') }}" autocomplete="langkahlangkah" autofocus></textarea>

                @error('langkahlangkah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Tulis Resep') }}
                </button>
            </div>
        </div>
	</form>

</div>
@endsection