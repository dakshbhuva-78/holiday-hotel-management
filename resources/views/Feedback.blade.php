@extends('MasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Feedback & Reviews</div>
        <div class="card-body">
            <form action="" class="" method="post">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" value="{{ $user->u_name }}" readonly>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Enter Email" name="email" value="{{ $user->u_email }}" readonly>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                        <select class="form-control" id="rating" name="rating" value="{{ old('rating') }}">
                            <option value="">Select...</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Very Good">Very Good</option>
                            <option value="Good">Good</option>
                            <option value="Fair">Fair</option>
                            <option value="Poor">Poor</option>
                        </select>
                        @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                        <label for="comments">Comments:</label>
                        <textarea class="form-control" id="comments" name="comments" rows="2" value="{{ old('comments') }}"></textarea>
                        @error('comments')<span class="text-danger">{{ $message }}</span>@enderror
                    </div><br>
                

                <button type="submit" class="btn btn-dark form-control btn-block ">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
