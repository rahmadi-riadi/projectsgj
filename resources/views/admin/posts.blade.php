@extends('layout.maindash')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unggahan Galeri</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">

                <table class=" table table-bordered table-striped table-hover datatable datatable-User ">

                    <thead>
                        <tr style="width: 100%">
                            <th scope="col" style="width: 1%" class="text-center">NO.</th>
                            <th scope="col" style="width: 20%" class="text-center">Gambar</th>
                            <th scope="col" style="width: 10%" class="text-center">Caption</th>
                            <th scope="col" style="width: 10%" class="text-center">Tanggal</th>
                            <th scope="col" style="width: 20%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>gambar</td>
                            <td>caption panjang disnini</td>
                            <td>tgl dd/mm/yyyy</td>

                            <td>
                                <button type="button" class="btn btn-secondary">Secondary</button>
                                <button type="button" class="btn btn-success">Success</button>
                                <button type="button" class="btn btn-danger">Danger</button>
                                <button type="button" class="btn btn-warning">Warning</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    @endsection

