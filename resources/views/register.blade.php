@extends('MasterView')

@section('dynamic_content')

<div class="col-lg-12 my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Registration</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/registrationdata" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="u_email" value="{{ old('u_email') }}">
                    @error('u_email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="pswd" value="{{ old('pswd') }}">
                    @error('pswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="cpswd" value="{{ old('cpswd') }}">
                    @error('cpswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="file" class="form-control" id="file" name="file1"/>
                    @error('file1')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <input type="submit" class="btn btn-dark form-control btn-block" value="Register">
            </form>
        </div>
    </div>
</div>

@endsection