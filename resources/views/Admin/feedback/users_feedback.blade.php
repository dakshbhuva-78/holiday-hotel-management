@extends('Admin/AdminMasterView')
@section('dynamic_content')
<div class="table-responsive mt-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Room Id</th>
                <th scope="col">Rating</th>
                <th scope="col">Comments</th>
                <th scope="col">Date Of Feedback</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @if($feedbacks->isEmpty())
            <p class="text-center text text-danger">No Feedback found.</p>
        @else
            @foreach($feedbacks as $feed)
                <tr>
                    
                    <td>{{ $feed->u_id }}</td>
                    <td>{{ $feed->r_id }}</td>
                    <td>{{ $feed->rating }}</td>
                    <td>{{ $feed->comments }}</td>
                    <td>{{ $feed->feedback_date}}</td>
                    
                    <td><a href="{{ route('/deletefeed',$id = $feed->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection