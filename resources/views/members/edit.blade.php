@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{route('member_update', ['id' => $member->id])}}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="_method" value="PUT">
<div class="row">
<div class="col">
<input type="text" name="first_name" class="form-control" value="{{ $member->first_name }}" placeholder="First name">
</div>
<div class="col">
<input type="text" name="last_name" value="{{ $member->last_name }}" class="form-control" placeholder="Last name">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" name="email" value="{{ $member->email }}" class="form-control" placeholder="Email">
</div>
<div class="col">
<input type="text" name="image" value="{{ $member->image }}" class="form-control" placeholder="Image">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" name="position" value="{{ $member->position }}" class="form-control" placeholder="Position">
</div>
<div class="col">
<input type="text" name="joined_at" value="{{ $member->joined_at }}" class="form-control" placeholder="Joined At">
</div>
</div>
<div class="row">
<div class="col">
<input type="number" name="sallary" value="{{ $member->sallary }}" class="form-control" placeholder="Salary">
</div>
<div class="col">
<input type="integer" name="age" value="{{ $member->age }}" class="form-control" placeholder="Age">
</div>
</div>
<div class="row">
<div class="col">
<select class="form-control" name="gender" id="">
<option value="male" {{ $member->gender == 'male' ? 'selected' : ''}}>Male</option>
<option value="female" {{ $member->gender == 'female' ? 'selected' : ''}}>Female</option>
</select>
</div>
<div class="col">
<a href="{{route('member_index')}}" class="btn btn-sm btn-primary">Back</a>
<input type="submit" class="btn btn-sm btn-success" value="Save Member">
</div>
</div>
</form>
</div>
@endsection