@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="col-lg-12  my-3 mt-5">
    <div class="card border-0 shadow-lg rounded-4" style="max-width: 450px; margin:auto;">
        <div class="mx-auto text h2 mt-4">Add Rooms</div>
        <div class="card-body">
            <form action="{{ URL::to('/') }}/r_add" class="" method="post" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Room Description" value="{{ old('description') }}">
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <input type="number" class="form-control" id="price" placeholder="Enter Price Of Room" value="{{ old('price') }}" name="price">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <div class="form-group">
                    <label>Select Rooms Features :</label>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check1" name="features[]" value="Parking Availability" {{ in_array('Parking Availability', old('features', [])) ? 'checked' : '' }}>
                        <label class="form-check-label">Parking Availability</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="features[]" value="Free Spa" {{ in_array('Free Spa', old('features', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Free Spa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check3" name="features[]" value="Dining Options" {{ in_array('Dining Options', old('features', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Dining Options</label>
                        </div>
                        @error('features')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <label>Select Rooms Facilities :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check1" name="facilities[]" value="Free WI-FI" {{ in_array('Free WI-FI', old('facilities', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Free WI-FI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="facilities[]" value="T.V." {{ in_array('T.V.', old('facilities', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">T.V.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check3" name="facilities[]" value="A.C." {{ in_array('A.C.', old('facilities', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">A.C.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check4" name="facilities[]" value="Room Heater" {{ in_array('Room Heater', old('facilities', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Room Heater</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check5" name="facilities[]" value="Gyser" {{ in_array('Gyser', old('facilities', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Gyser</label>
                        </div>
                        @error('facilities')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <label>Select Guests Types :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check1" name="guests[]" value="Adults" {{ in_array('Adults', old('guests', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Adults</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check2" name="guests[]" value="Children" {{ in_array('Children', old('guests', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">Children</label>
                        </div>
                        @error('guests')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div><br>
                <div class="form-group">
                    <input type="file" class="form-control" id="photo" placeholder="Select Photo Of Room" value="{{ old('photo') }}" name="photo">
                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                </div><br>
                <button type="submit" class="btn btn-dark form-control btn-block">Add</button>
            </form>
            </form>
        </div>
    </div>
</div>

@endsection