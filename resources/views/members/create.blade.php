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
   <form action="{{route('member_store')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="row">
    <div class="col">
      <input type="text" name="first_name" class="form-control" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" name="last_name" class="form-control" placeholder="Last name">
    </div>
  </div>

  <div class="row">
    <div class="col">
      <input type="text" name="age" class="form-control" placeholder="Age">
    </div>
    <div class="col">
      <input type="text" name="position" class="form-control" placeholder="Position">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input type="text" name="sallary" class="form-control" placeholder="Sallary">
    </div>
    <div class="col">
      <input type="text" name="email" class="form-control" placeholder="E-mail">
    </div>
    <div class="row">
    <div class="col">
      <input type="text" name="joined_at" class="form-control" placeholder="Joined At">
    </div>
    <div class="col">
      <input type="text" name="image" class="form-control" placeholder="Image">
    </div>
  </div>
  <div class="row">
    <div class="col">
<select class="form-controll" name="gender" id="">
    <option value="male">Male</option>
    <option value="female">Female</option>
</select>
    </div>

    <div class="row">
    <div class="col">
        <a href="{{route('member_index')}}" class="btn btn-sm btn-primary">Back</a>
        <button type="Submit" class="btn btn-sm btn-success">Create Member</button>
    </div>

  </div>


   </form>
</div>
@endsection




