@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="container mt-3">
  <h2 class="text mx-auto">Rooms</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Code</th>
        <th>Status</th>
        <th>Update Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if($offers->isEmpty())
            <p>No Offers In Database</p>
        @else
            @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td><p>{{ $offer->title }}</p></td>
                    <td>{{ $offer->coupon_code}}</td>
                    <td>{{ $offer->status}}<br></td>
                    <td>
                        <a href="{{ route('/update_status.show',$id = $offer->id) }}" class="btn btn-dark">Update Status</a>
                    </td>
                    <td>
                        <a href="{{ route('/delete_offers',$id = $offer->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
</div>

@endsection