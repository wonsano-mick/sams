@extends('layouts.auth.master')
@section('title', 'Wonsano POS | Register User')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 7%;">
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('Register User') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username"
                                        autocomplete="username" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- <div class="row mb-3" style="text-align: center">
                            <div class="offset-md-4 col-md-5">
                                <input type="file" id="actual-btn" class="form-control-file" name="user_img" hidden>
                                <label for="actual-btn" style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">choose a user photo</label>
                                <span id="file-chosen" style="margin-left: 0.1rem; width:150px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">No file chosen</span>
                            </div>
                        </div> --}}
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary login-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="mt-15 mb-0 text-dark">Already have an account?<a href="{{ route('login') }}"
                                        class="text-danger ml-2"> Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })
    </script>
@endsection
