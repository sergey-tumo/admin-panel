@extends('layouts.app')

@section('head')
<style>
    .delete-button{
        margin-left:10px;
    }
    .table-actions {
        display:flex;
    }
</style>
@endsection
@section('content')

<div class="container">
     @if (Auth::user()->role != 'writer')
    <div class="button_content">
        <a class="btn btn-sm btn-primary"href="{{ route('member_create') }}">Add Member</a>
    </div>
    @endif
    <table id="members_list_table" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Job Title</th>
                <th>Salary</th>
                <th>Joined At</th>
                 @if (Auth::user()->role != 'writer')
                <th>Actions</th>
                @endif
            </tr>
        </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->last_name }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->age }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->sallary }}</td>
                        <td>{{ Carbon\Carbon::parse($member->joined_at)->format('d-m-Y') }}</td>

                        @if (Auth::user()->role != 'writer')
                        
                        <td class="table-actions">
                            <a class="btn btn-sm btn-primary" href="{{ route('member_edit', ['id' => $member->id]) }}">Edit</a>

                             @if (Auth::user()->role == 'super-admin')
                            <button type="button" class="btn btn-sm btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$member->id}}">
Delete
</button>

<div class="modal fade" id="exampleModal-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$member->id}}" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel-{{$member->id}}">Modal title</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
Are You Sure To Delete <i>{{$member->first_name}} {{$member->last_name}}</i>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
<form action="{{route('member_delete', ['id' => $member->id])}}" method="post">
@csrf
@method('DELETE')
<input class="btn btn-sm btn-danger" type="submit" value="Delete">
</form>
</div>
</div>
</div>
</div>
                            @endif
                        </td>
                        @endif
                    </tr>
            @endforeach
         </tbody>
    </table>
</div>
<script>
    $(document).ready(()=> {
        $('#members_list_table').dataTable({});
    })
</script>

@endsection
