@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Reply Contact Us Message</div>
        <div class="card-body">
            <form action="" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email Id" name="email" value="{{ $msg->email }}" readonly>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" placeholder="Enter Subject Name" name="subject" value="{{ old('subject') }}">
                    @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Write Message Which You Want To Reply " name="msg" id="msg" value="">{{ old('msg') }}</textarea>
                    @error('msg')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Send Message</button>
            </form>
            </form>
        </div>
    </div>
</div> 
@endsection