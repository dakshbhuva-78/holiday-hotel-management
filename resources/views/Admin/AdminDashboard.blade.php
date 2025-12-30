@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="container mt-3">
  <h2 class="text mx-auto">Home Rooms</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text">Id</th>
        <th>Room Image</th>
        <th>Room Price</th>
        <th>Room Features</th>
        <th>Room Facilities</th>
        <th>Room Guests</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><img src="{{ URL::to('/') }}/images/rooms/IMG_17055.png" alt="" style="width: 100px; height: 70px;"></td>
            <td>₹2399</td>
            <td><span class="badge rounded-pill bg-light text-dark text-wrap">
                    Parking Availability
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Dining Options
                </span> 
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Free Wi-Fi
                </span> <br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    T.V.
                </span>
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Adults
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Children
                </span>
            </td>
            <td><a href="#" class="btn btn-dark">Update</a></td>
            <td><a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td><img src="{{ URL::to('/') }}/images/rooms/IMG_11892.png" alt="" style="width: 100px; height: 70px;"></td>
            <td>₹5499</td>
            <td><span class="badge rounded-pill bg-light text-dark text-wrap">
                    Parking Availability
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Dining Options
                </span> <br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Free Spa
                </span> 
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Free Wi-Fi
                </span> <br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    T.V.
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    A.C.
                </span>
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Adults
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Children
                </span>
            </td>
            <td><a href="#" class="btn btn-dark">Update</a></td>
            <td><a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
        <tr>
            <td>3</td>
            <td><img src="{{ URL::to('/') }}/images/rooms/IMG_65019.png" alt="" style="width: 100px; height: 70px;"></td>
            <td>₹3199</td>
            <td><span class="badge rounded-pill bg-light text-dark text-wrap">
                    Parking Availability
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Dining Options
                </span> 
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    A.C.
                </span> <br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    T.V.
                </span>
            </td>
            <td>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Adults
                </span><br>
                <span class="badge rounded-pill bg-light text-dark text-wrap">
                    Children
                </span>
            </td>
            <td><a href="#" class="btn btn-dark">Update</a></td>
            <td><a href="#" class="btn btn-danger">Delete</a></td>
        </tr>
    </tbody>
  </table>
</div>

@endsection