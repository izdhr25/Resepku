@extends('layouts.app')

@section('title', 'Akun | Resepku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('home.update') }}" enctype="multipart/form-data">
                        @csrf

                        <h2 class="text-center mb-3">Akun</h2>
                        <center>
                            <img src="assets/user/{{ Auth::user()->image }}" class="img-fluid my-3" width="50%">
                        </center>
                        
                        @if($message = Session::get('message'))
                        <div class="alert alert-success">
                            <strong>Berhasil</strong>
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Gambar') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="imageLama" value="{{ Auth::user()->image }}">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="passwordLama" value="{{ Auth::user()->password }}">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ Auth::user()->tempat_lahir }}" autocomplete="tempat_lahir" autofocus>

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ Auth::user()->birth }}" autocomplete="birth" autofocus>

                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" autocomplete="alamat" autofocus>{{ Auth::user()->alamat }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-end">{{ __('Kelurahan') }}</label>

                            <div class="col-md-6">
                                <input id="kelurahan" type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ Auth::user()->kelurahan }}" autocomplete="kelurahan" autofocus>

                                @error('kelurahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-end">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <input id="kecamatan" type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ Auth::user()->kecamatan }}" autocomplete="kecamatan" autofocus>

                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kota" class="col-md-4 col-form-label text-md-end">{{ __('Kabupaten/Kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ Auth::user()->kota }}" autocomplete="kota" autofocus>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-end">{{ __('Kode Pos') }}</label>

                            <div class="col-md-6">
                                <input id="kode_pos" type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ Auth::user()->kode_pos }}" autocomplete="kode_pos" autofocus>

                                @error('kode_pos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
