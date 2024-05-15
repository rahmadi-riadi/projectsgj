@extends('layout.maindash')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Admin</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="" class="btn btn-primary">Tambah Admin</a>

                        {{-- {{ route('admin.create') }} --}}
                    </div>
                    <table class="table table-bordered table-striped table-hover datatable dt-responsive" id="table-admin">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">NO.</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Role</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')

    @endsection

