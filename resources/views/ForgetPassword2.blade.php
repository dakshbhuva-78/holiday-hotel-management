@extends('MasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Change Password</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/ForgetPassword2" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="pswd" placeholder="Enter New Password" name="pswd" value="{{ old('pswd') }}">
                    @error('pswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="cpswd" placeholder="Confirm New Password" name="cpswd" value="{{ old('cpswd') }}">
                    @error('cpswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block ">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
