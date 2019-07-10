@extends('template.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-header">Register</div>
                {{-- @php
                $tgl_lahir = "1997-02-14";

                //konversi ke date time
                $birthday  = new DateTime($tgl_lahir);
                $sekarang = new DateTime();

                //cari selisih
                $usia = $sekarang->diff($birthday);

                //tampilkan tanggal lahir
                echo 'Tanggal Lahir : '.date('d M Y', strtotime($tgl_lahir)).'<br />';
                //tampilkan usia
                echo 'Usia'.$usia->y.' Tahun '.$usia->m.' Bulan '.$usia->d.' Hari';
                @endphp --}}

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus="true">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
                            <label for="birth" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control" name="birth" value="{{ old('birth') }}" required >

                                @if ($errors->has('birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                    <option disabled selected>Select Here</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                @if ($errors->has('birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        
                        {{-- <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="address" value="{{ old('address') }}" required >

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required >

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group{{ $errors->has('mobilephone') ? ' has-error' : '' }}">
                                <label for="mobilephone" class="col-md-4 control-label">Mobile Phone</label>
    
                                <div class="col-md-6">
                                    <input id="mobilephone" type="text" class="form-control" name="mobilephone" value="{{ old('mobilephone') }}" required >
    
                                    @if ($errors->has('mobilephone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobilephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div> --}}

                        {{-- <div class="form-group{{ $errors->has('filcv') ? ' has-error' : '' }}">
                                <label for="filcv" class="col-md-4 control-label">Upload CV</label>
    
                                <div class="col-md-6">
                                    <input id="filcv" type="file" class="form-control" name="filcv" value="{{ old('mobilephone') }}" required >
    
                                    @if ($errors->has('filcv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('filcv') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
