@extends('admin.layouts.app')
@section('konten')

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="#" 
            method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" name="nama"
                id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Tambah Jenis Produk">
               
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
  
  {{-- batas modal --}}

<div class="container-fluid px-4">
    <h1 class="mt-4">Management User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <a href="" class="btn btn-md btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal"
            ><i class="fa-solid fa-square-plus"></i></a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                   
                    </tr>
                </tfoot>
                <tbody>
                
                    @foreach ($userAll as $ua)
                    <tr>
                        <td>{{$loop->iteration}} </td>
                        <td>{{$ua->name}}</td>
                        <td>{{$ua->email}}</td>
                        <td>{{$ua->role}}</td>
                        @if($ua->is_active == true)
                        <td>Aktif</td>
                        @else
                        <td>
                            <form action="{{route('admin.user.activate', $ua->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Aktifkan</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
