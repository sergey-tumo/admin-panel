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
                            <form action="{{route('member_delete',['id' => $member->id])}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token()  }}" />
                                 <input type="hidden" name="_method" value="DELETE">

                                 <input class="btn btn-sm btn-danger delete-button" type="submit" value="Delete">
                            </form>
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
