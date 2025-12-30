@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Delete Carousel</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group mt-3">
                    <input type="number" class="form-control" id="id" placeholder="Enter Id Of Carousel Image" name="id" value="{{ old('id') }}">
                    @error('id')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Delete</button>
            </form>
            </form>
        </div>
    </div>
</div>
@endsection