@extends('admin.layouts.app')
@section('konten')

<div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{asset('admin/pengguna/create')}}" class="btn btn-md btn-primary">
                                    <i class="fa-solid fa-square-plus"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <style>
                                    table#datatablesSimple th, table#datatablesSimple td {
                                        white-space: nowrap;
                                        padding: 5px;
                                        border: 1px solid #ddd;
                                    }
                                    table#datatablesSimple th {
                                        font-weight: bold;
                                    }
                                    table#datatablesSimple td:nth-child(4), 
                                    table#datatablesSimple td:nth-child(5) { 
                                        width: 10%; 
                                    }
                                </style>
                                <table id="datatablesSimple" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($userAll as $u)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->fullname }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->no_hp }}</td>
                                            <td>{{ $u->alamat }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pengguna</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin akan menghapus data {{ $u->username }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <form action="" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection