@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Reservasi Online</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>

                        <li class="breadcrumb-item active text-white">Reservasi Online</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-fluid packages py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">

                <h1 class="mb-4">reservasi bla bla bla </h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto
                    doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti
                    eum cum repellat a laborum quasi.
                </p>

                <div class="d-flex align-items-center justify-content-center py-5 ">
                    <a class="btn-hover-bg btn btn-success rounded-pill text-white py-3 px-5" href="/form">Isi Formulir
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
