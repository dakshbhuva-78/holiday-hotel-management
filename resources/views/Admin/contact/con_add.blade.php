@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Add Contact Us</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="addhot" placeholder="Enter Address Of Hotel" name="addhot" value="{{ old('addhot') }}">
                    @error('addhot')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="contact" placeholder="Enter Contact Number Of Receptions" name="contact" value="{{ old('contact') }}">
                    @error('contact')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" placeholder="Enter Official Email Of Your Hotel" name="email" value="{{ old('email') }}">
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                
                <button type="submit" class="btn btn-dark form-control btn-block">Add</button>
            </form>
            </form>
        </div>
    </div>
</div> 
@endsection