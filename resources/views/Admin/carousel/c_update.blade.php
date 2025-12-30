@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Update Carousel</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="file" class="form-control" id="photo" placeholder="Select Photo Of Room" name="image" value="{{ old('image') }}">
                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Update</button>
            </form>
            </form>
        </div>
    </div>
</div>
@endsection