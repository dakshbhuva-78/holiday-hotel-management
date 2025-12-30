@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="container mt-3">
  <h2 class="text mx-auto">Rooms</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Features</th>
        <th>Facilities</th>
        <th>Guests</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if($data->isEmpty())
            <p>No Rooms In Database</p>
        @else
            @foreach($data as $room)
            
                <tr>
                    <td>{{ $room->id }}</td>
                    <td><img src="{{ URL::to('/') }}/images/rooms/{{ $room->r_image }}" alt="" style="width: 100px; height: 70px;"></td>
                    <td><p>{{ $room->r_description }}</p></td>
                    <td>₹{{ $room->r_price}}</td>
                    <td><span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $room->r_features}}
                        </span><br> 
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $room->r_facilities}}
                        </span> <br>   
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $room->r_guests}}
                        </span><br>
                    </td>
                    <td>
                        <a href="{{ route('/r_update.show',$id = $room->id) }}" class="btn btn-dark">Update</a>
                    </td>
                    <td>
                        <a href="{{ route('/r_delete_action_1',$id = $room->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
</div>

@endsection