@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Add About Us</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/a_add" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="town" placeholder="Enter Title For Owner Name" name="town" value="{{ old('town') }}">
                    @error('town')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Enter About Of Owner" name="aown" id="aown" value="">{{ old('aown') }}</textarea>
                    @error('aown')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="file" class="form-control" id="photo" placeholder="Select Photo Of Room" name="photo" value="{{ old('photo') }}">
                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Add</button>
            </form>
            </form>
        </div>
    </div>
</div> 
@endsection