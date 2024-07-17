@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>first name</th>
            <th>last name</th>
            <th>gender</th>
            <th>age</th>
            <th>job title</th>
            <th>Salary</th>
            <th>joined at</th>
        </tr>
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
                <td>{{ $member->joined_at }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
