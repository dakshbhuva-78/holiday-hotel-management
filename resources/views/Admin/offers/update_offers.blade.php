@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Update Offers</div>
        <div class="card-body">
            <form action="{{ route('/update_offers.update', ['id' => $id]) }}" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $offer->title }}">
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $offer->description }}">
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" placeholder="Enter Discount Percentage" value="{{ $offer->discount_percentage }}" >
                    @error('discount_percentage')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $offer->start_date }}">
                    @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $offer->end_date }}">
                    @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                </div> 
                <div class="form-group mt-3">
                    <label for="status" class="form-label">Status :</label>
                    <input type="checkbox" id="status" name="status" value="1" checked>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-dark form-control btn-block">Update</button>
            </form>
            </form>
        </div>
    </div>
</div>

@endsection
