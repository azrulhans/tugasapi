@extends('admin.layouts.app')
@section('konten')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 align="center">Input Users</h1>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="w-50">
<form method="post" action="{{ asset('admin/pengguna/create') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
      <label for="name" class="col-form-label">Name</label>
      <div class="col-8">
          <input type="text" id="name" name="name" class="col-12 col-form-label" value="{{ $user->name }}">
      </div>
  </div>
  <div class="form-group row">
      <label for="fullname" class="col-form-label">Full Name</label>
      <div class="col-8">
          <input type="text" id="fullname" name="fullname" class="col-12 col-form-label" value="{{ $user->fullname }}">
      </div>
  </div>
  <div class="form-group row">
      <label for="email" class="col-form-label">Email Address</label>
      <div class="col-8">
          <input type="email" id="email" name="email" class="col-12 col-form-label" value="{{ $user->email }}">
      </div>
  </div>
  <div class="form-group row">
      <label for="no_hp" class="col-form-label">Phone Number</label>
      <div class="col-8">
          <input type="text" id="no_hp" name="no_hp" class="col-12 col-form-label" value="{{ $user->no_hp }}">
      </div>
  </div>
  <div class="form-group row">
      <label for="alamat" class="col-form-label">Alamat</label>
      <div class="col-8">
          <input type="text" id="alamat" name="alamat" class="col-12 col-form-label" value="{{ $user->alamat }}">
      </div>
  </div>
  <div class="form-group row">
      <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
</form>
  </div>
</div>
@endsection
