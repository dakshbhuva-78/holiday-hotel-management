@extends('MasterView')
    @section('dynamic_content')
    
    <div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Your Profile</div>
        <div class="card-body">
            <img src="{{ URL::to('/') }}/images/profile/{{ $userprofile->u_image }}" class="rounded-circle mb-3" style="height: 400px;width:420px;"><br>
            <h4 class="text mb-3">Name:- {{ $userprofile->u_name }}</h4> 
            <h4 class="text mb-3">Email:- {{ $userprofile->u_email }}</h4>
            <h4 class="text mb-3">Mobile No:- {{ $userprofile->u_phone }}</h4>
            <a href="{{ URL::to('/') }}/EditProfile"><button type="submit" class="btn btn-dark form-control btn-block ">Edit Profile</button></a>
            <a href="{{ URL::to('/') }}/logout"><button type="submit" class="btn btn-dark form-control btn-block mt-3">Logout</button></a>    
        </form>
        </div>
    </div>
</div>
@endsection