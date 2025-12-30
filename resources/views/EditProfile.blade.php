@extends('MasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
    <div class="mx-auto text h2 mt-4">Edit Profile</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="file" class="form-control" id="file" name="file" value="">
                    @error('file')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Change Your Name" name="name" value="{{ $userprofile->u_name }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="email" class="form-control" id="" placeholder="Change Your Email" name="email" value="{{ $userprofile->u_email }}" readonly>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="number" class="form-control" id="" placeholder="Change Your Number" name="number" value="{{ $userprofile->u_phone }}">
                    @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block ">Submit</button>
            </form>
            <a href="{{ URL::to('/') }}/ChangePassword"><button type="submit" class="btn btn-dark form-control btn-block mt-3">Change Password</button></a>
        </div>
    </div>
</div>

@endsection
