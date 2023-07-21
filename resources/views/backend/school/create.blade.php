@extends('layouts.auth.master')
@section('title', 'SHS System | Register School')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%;">
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                                type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('Register School') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('schoolInfo.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name_of_school"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name of School') }}</label>

                                <div class="col-md-6">
                                    <input id="name_of_school" type="text"
                                        class="form-control @error('name_of_school') is-invalid @enderror"
                                        name="name_of_school" value="{{ old('name_of_school') }}" required
                                        autocomplete="name_of_school" autocomplete="name_of_school" autofocus>

                                    @error('name_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="landmark_location_of_school"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Landmark') }}</label>

                                <div class="col-md-6">
                                    <input id="landmark_location_of_school" type="text"
                                        class="form-control @error('landmark_location_of_school') is-invalid @enderror"
                                        name="landmark_location_of_school" value="{{ old('landmark_location_of_school') }}"
                                        required autocomplete="landmark_location_of_school" autofocus>

                                    @error('landmark_location_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Town"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Town') }}</label>

                                <div class="col-md-6">
                                    <input id="town_and_region_location_of_school" type="text"
                                        class="form-control @error('town_and_region_location_of_school') is-invalid @enderror"
                                        name="town_and_region_location_of_school"
                                        value="{{ old('town_and_region_location_of_school') }}" required
                                        autocomplete="town_and_region_location_of_school">

                                    @error('town_and_region_location_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="digital_address_of_school"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Digital Address') }}</label>

                                <div class="col-md-6">
                                    <input id="digital_address_of_school" type="text"
                                        class="form-control @error('digital_address_of_school') is-invalid @enderror"
                                        name="digital_address_of_school" value="{{ old('digital_address_of_school') }}"
                                        required autocomplete="digital_address_of_school">

                                    @error('digital_address_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number_of_school"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number_of_school" type="text"
                                        class="form-control @error('digital_address_of_school') is-invalid @enderror"
                                        name="phone_number_of_school" value="{{ old('phone_number_of_school') }}" required
                                        autocomplete="phone_number_of_school">

                                    @error('phone_number_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email_of_school"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email_of_school" type="text"
                                        class="form-control @error('email_of_school') is-invalid @enderror"
                                        name="email_of_school" value="{{ old('email_of_school') }}" required
                                        autocomplete="email_of_school">

                                    @error('email_of_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- <div class="form-group"> --}}
                                {{-- <h5>School Logo</h5> --}}
                                <div class="controls offset-md-4">
                                    <div class="mb-4">
                                        <img id="showImage" width="120" height="90" alt="School logo"><br>
                                        <input type="file" id="actual-btn" class="form-control-file"
                                            name="logo_of_school" hidden>
                                        <label for="actual-btn"
                                            style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">choose
                                            school logo</label>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary login-btn">
                                        {{ __('Register School') }}
                                    </button>
                                </div>
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
    <script type="text/javascript">
        document.getElementById('actual-btn').onchange = function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    document.getElementById('showImage').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        }
    </script>
@endsection
