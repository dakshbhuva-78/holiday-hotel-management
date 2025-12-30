@extends('MasterView')
@section('dynamic_content')

 <div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">ChangePassword</div>
        <div class="card-body">
            <form action="" class="" method="post">
                @CSRF
            <div class="form-group">
                    <input type="password" class="form-control" id="oldpswd" placeholder="Enter Old Password" name="oldpswd" value="{{ old('oldpswd') }}">
                    @error('oldpswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="newpswd" placeholder="Enter New Password" name="newpswd" value="{{ old('newpswd') }}">
                    @error('newpswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="conpswd" placeholder="Confirm New Password" name="conpswd" value="{{ old('conpswd') }}">
                    @error('conpswd')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block ">Change</button>
            </form>
        </div>
    </div>
</div>
@endsection