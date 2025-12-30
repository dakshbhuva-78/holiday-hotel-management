@extends('Admin/AdminMasterView')
@section('dynamic_content')
<style>
    td{
    max-width:20px;
    word-wrap:break-word;
    }
    </style>
<div class="container mt-3">           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Reply</th>
        <th>Delete</th>
      </tr>
    </thead>
    @if($messages->isEmpty())
      <p class="text-center text text-danger">No messages found.</p>
    @else
      <tbody>
        @foreach($messages as $msg)
          <tr>
            <td>{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ $msg->subject }}</td>
            <td>{{ $msg->message }}</td>
            <td><a href="{{ route('/con_reply',$id = $msg->id) }}" class="btn btn-dark">Reply</a></td>
            <td><a href="{{ route('/con_delete',$id = $msg->id) }}" class="btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    @endif
  </table>
</div>
@endsection