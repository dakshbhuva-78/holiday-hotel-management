@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Update Rooms</div>
        <div class="card-body">
            <form action="{{ route('/r_update.update', ['id' => $id]) }}" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Room Description" value="{{ $description }}">
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <input type="number" class="form-control" id="price" placeholder="Enter Price Of Room" name="price" value="{{ $price }}">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <label>Select Rooms Features :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check1" name="features[]" value="Parking Availability" @if(in_array('Parking Availability', $features)) checked @endif>
                            <label class="form-check-label">Parking Availability</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="features[]" value="Free Spa" @if(in_array('Free Spa', $features)) checked @endif>
                            <label class="form-check-label">Free Spa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check3" name="features[]" value="Dining Options" @if(in_array('Dining Options', $features)) checked @endif>
                            <label class="form-check-label">Dining Options</label>
                        </div>
                        @error('features')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <label>Select Rooms Facilities :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check1" name="facilities[]" value="Free WI-FI" @if(in_array('Free WI-FI', $facilities)) checked @endif>
                            <label class="form-check-label">Free WI-FI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="facilities[]" value="T.V." @if(in_array('T.V.', $facilities)) checked @endif>
                            <label class="form-check-label">T.V.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check3" name="facilities[]" value="A.C." @if(in_array('A.C.', $facilities)) checked @endif>
                            <label class="form-check-label">A.C.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check4" name="facilities[]" value="Room Heater" @if(in_array('Room Heater', $facilities)) checked @endif>
                            <label class="form-check-label">Room Heater</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check5" name="facilities[]" value="Gyser" @if(in_array('Gyser', $facilities)) checked @endif>
                            <label class="form-check-label">Gyser</label>
                        </div>
                        @error('facilities')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <label>Select Guests Types :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check1" name="guests[]" value="Adults" @if(in_array('Adults', $guests)) checked @endif>
                            <label class="form-check-label">Adults</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="guests[]" value="Children" @if(in_array('Children', $guests)) checked @endif>
                            <label class="form-check-label">Children</label>
                        </div>
                        @error('guests')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <input type="file" class="form-control" id="photo" placeholder="Select Photo Of Room" name="photo" value="{{ old('photo') }}">
                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection