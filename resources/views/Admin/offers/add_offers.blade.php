@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Add Offers</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/add_offers" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Offers Title" value="{{ old('title') }}">
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Offers Code" value="{{ old('code') }}">
                    @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Add</button>
            </form>
            </form>
        </div>
    </div>
</div>

@endsection
