@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Delete About Us</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/a_delete" class="" method="post">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="id" placeholder="Enter Id Of About Content" name="id" value="{{ old('id') }}">
                    @error('id')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Delete</button>
            </form>
            </form>
        </div>
    </div>
</div> 
@endsection