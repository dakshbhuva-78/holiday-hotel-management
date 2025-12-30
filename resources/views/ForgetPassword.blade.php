@extends('MasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Forget Password</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Enter your registered email" name="email" value="{{ old('email') }}">
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block ">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection