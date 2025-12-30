@extends('Admin/AdminMasterView')
@section('dynamic_content')

<div class="container mt-3">
  <h2 class="text mx-auto">Carousel</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text h3">Images</th>
        <th class="text h3">Delete</th>
      </tr>
    </thead>
    @if($data->isEmpty())
      <p class="text text-danger">No Data Found For Carousel</p>
    @else
      <tbody>
          @foreach($data as $carou)
            <tr>
              <td><img src="{{ URL::to('/') }}/images/carousel/{{ $carou->c_image}}" alt="" style="width: 200px; height: 100px;"></td>
              <td>
                  <a href="{{ route('/c_delete_action_1',$id = $carou->id) }}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach
      </tbody>
    @endif
  </table>
</div>

@endsection