@extends('MasterView')

@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Login</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/login" class="" method="post">
                @CSRF
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="pswd" value="{{ old('pswd') }}">
                    @error('pswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <a class="text-dark" style="text-decoration: none;" href="{{ URL::to('/') }}/ForgetPassword"><u><b>Forget Password</b></u></a>
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block ">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection