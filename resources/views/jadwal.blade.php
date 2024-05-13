@extends('layout.frontend.header')

@section('content')
    <div class="main">
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center pt-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Jadwal Pertemuan</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active text-white">Jadwal Pertemuan</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->


        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Halaman</h5>
                    <h1 class="mb-0">Jadwal Pertemuan</h1>
                </div>

            </div>
        </div>
        <!-- Packages End -->
        {{-- <div class="container d-flex justify-content-center py-5">
            <iframe
                src="https://calendar.google.com/calendar/embed?height=800&wkst=1&ctz=Asia%2FMakassar&bgcolor=%233F51B5&showCalendars=0&showTz=0&hl=id&src=YjBkMWY3ZjkxODgwMmY4MzgyZmVhNjljZjgyODUwZmExNzk2MDQ1ZWMxNzEyOTA2MjQzZjY2ZDQyNjQ3NzNlNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%238E24AA&color=%230B8043"
                style="border:solid 1px #777" width="1000" height="800" frameborder="0" scrolling="no"></iframe>
        </div> --}}

        {{-- kalender --}}
        {{-- <div class="container-fluid mb-4">
            <div id='calendar'>Kalender</div>
        </div> --}}


    </div>
@endsection
