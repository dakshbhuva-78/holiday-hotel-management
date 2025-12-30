@extends('Admin/AdminMasterView')
@section('dynamic_content')
    @if(isset($users))
        <div class="container mt-3">
            <h2>Registered Users</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Password</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user -> u_name }}</td>
                    <td>{{ $user -> u_email }}</td>
                    <td>{{ $user -> u_phone }}</td>
                    <td>{{ $user -> u_password }}</td>
                    <td><img src="{{ URL::to('/') }}/images/profile/{{ $user -> u_image}}" alt="" style="width: 100px; height: 70px;"></td>
                    <td>{{ $user -> u_status }}</td>
                    <td><a href="{{ route('/user_delete_action_1',$id = $user->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection