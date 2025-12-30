@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h3 mt-4">Your Profile</div>
        <div class="card-body">
            <img src="{{ URL::to('/') }}/images/profile/{{ $userprofile->u_image }}" class="rounded-circle mb-3 ms-5" style="height: 320px;width:320px;"><br>
            <h6 class="text mb-3 mx-auto">Name:- {{ $userprofile->u_name }}</h6>
            <h6 class="text mb-3">Email:- {{ $userprofile->u_email }}</h6>
            <h6 class="text mb-3">Mobile No:- {{ $userprofile->u_phone }}</h6>
            <a href="{{ URL::to('/') }}/AdminEditProfile"><button type="submit" class="btn btn-dark form-control btn-block ">Edit Profile</button></a>
            <a href="{{ URL::to('/') }}/logout"><button type="submit" class="btn btn-dark form-control btn-block mt-3">LogOut</button></a>
            </form>
        </div>
    </div>
</div>

@endsection