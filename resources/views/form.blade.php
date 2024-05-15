@extends('layout.frontend.header')

@section('content')


    <div class="main">
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Reservasi Online</h1>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active text-white"><a href="#">Reservasi Online</a></li>
                        <li class="breadcrumb-item active text-white">Formulir reservasi</li>
                    </ol>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-fluid packages py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h1 class="mb-4">Isi formulir untuk melakukan RESERVASI !</h1>
            </div>
            <div class="container mx-auto">

                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-3"></i>
                    <div>
                        <h4 class="text-warning">peringatan</h4>
                        Formulir ini merupakan bagian untuk memudahkan proses reservasi. Penjadwalan kunjungan secara resmi
                        akan dilakukan setelah surat permohonan resi dikirimkan melalui pos .Saat ini anda berapa pada tahap
                        awal dari syarat yang harus dipenuhi untuk dapat melakukan kunjungan tamu di Pemerintah Kota
                        Yogyakarta. Silakan lengkapi isian data pada blangko atau formulir yang tertera dibawah ini :
                    </div>
                </div>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <b>Data Pemohon</b>

                    </div>
                </div>
            </div>

            <div class="container">


                <form action="/reservasi" method="POST">
                    @method('put')
                    @csrf

                    <div class="form-group mb-3">
                        <label class="required">Nama: </label>
                        <input type="text" class="form-control" id="nama" placeholder="nama">
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Nama Instansi Pemohon: </label>
                        <input type="text" class="form-control" id="nama_instansi" placeholder="nama instansi pemohon">
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Nomor HP.(dapat menerima panggilan): </label>
                        <input type="number" class="form-control" id="nomor_hp" placeholder="nomor hp">
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Nomor WA (boleh sama dengan nomor HP): </label>
                        <input type="number" class="form-control" id="nomor_wa" placeholder="nomor wa">
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Email Lembaga/Instansi/Pemohon: </label>
                        <input type="email" class="form-control" id="email" placeholder="email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Provinsi:</label>
                        <select class="form-control" id="provinsi">
                            <option style="display:none">pilih provinsi</option>
                            <option value="11">ACEH</option>
                            <option value="51">BALI</option>
                            <option value="36">BANTEN</option>
                            <option value="17">BENGKULU</option>
                            <option value="34">DAERAH ISTIMEWA YOGYAKARTA</option>
                            <option value="31">DKI JAKARTA</option>
                            <option value="75">GORONTALO</option>
                            <option value="15">JAMBI</option>
                            <option value="32">JAWA BARAT</option>
                            <option value="33">JAWA TENGAH</option>
                            <option value="35">JAWA TIMUR</option>
                            <option value="61">KALIMANTAN BARAT</option>
                            <option value="63">KALIMANTAN SELATAN</option>
                            <option value="62">KALIMANTAN TENGAH</option>
                            <option value="64">KALIMANTAN TIMUR</option>
                            <option value="65">KALIMANTAN UTARA</option>
                            <option value="19">KEP. BANGKA BELITUNG</option>
                            <option value="21">KEPULAUAN RIAU</option>
                            <option value="18">LAMPUNG</option>
                            <option value="81">MALUKU</option>
                            <option value="82">MALUKU UTARA</option>
                            <option value="52">NUSA TENGGARA BARAT</option>
                            <option value="53">NUSA TENGGARA TIMUR</option>
                            <option value="91">PAPUA</option>
                            <option value="92">PAPUA BARAT</option>
                            <option value="96">PAPUA BARAT DAYA</option>
                            <option value="95">PAPUA PEGUNUNGAN</option>
                            <option value="93">PAPUA SELATAN</option>
                            <option value="94">PAPUA TENGAH</option>
                            <option value="14">RIAU</option>
                            <option value="76">SULAWESI BARAT</option>
                            <option value="73">SULAWESI SELATAN</option>
                            <option value="72">SULAWESI TENGAH</option>
                            <option value="74">SULAWESI TENGGARA</option>
                            <option value="71">SULAWESI UTARA</option>
                            <option value="13">SUMATERA BARAT</option>
                            <option value="16">SUMATERA SELATAN</option>
                            <option value="12">SUMATERA UTARA</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Kota/Kabupaten: </label>
                        <input type="text" class="form-control" id="kota_kabupaten" placeholder="kota/kabupaten">
                    </div>
                    <div class="form-group mb-3">
                        <label class="required">Alamat Instansi: </label>
                        <input type="text" class="form-control" id="alamat_instansi" placeholder="alamat instansi">
                    </div>

                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <b>Data Tujuan Reservasi</b>

                        </div>
                    </div>


                    <a class="btn-hover-bg btn btn-warning rounded-pill text-white mb-3" href="#">Lihat
                        Jadwal Pertemuan
                    </a>

                    <div class="form-group mb-3">
                        <label>Hari & pukul kunjungan:</label>
                        <br />
                        <span class="text-danger fs-8 mt-20 ms-3">Pendaftaran minimal 3 hari kerja.</span>
                        <input required type="date" class="form-control tanggalreservasi" id="tanggal">
                        <br />
                        <select class="form-select " name="jam_berkunjung" id="pukul"
                            data-placeholder="Pilih salah satu" data-allow-clear="true">
                            <option value="09:00:00">09:00</option>
                            <option value="09:30:00">09:30</option>
                            <option value="10:00:00">10:00</option>
                            <option value="10:30:00">10:30</option>
                            <option value="11:00:00">11:00</option>
                            <option value="11:30:00">11:30</option>
                            <option value="12:00:00">12:00</option>
                            <option value="12:30:00">12:30</option>
                            <option value="13:00:00">13:00</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Topik Diskusi:</label>
                        <textarea class="form-control" id="topik" rows="3"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Tujuan OPD yang akan dikunjungi:</label>
                        <select class="form-control" id="tujuan_opd">
                            <option style="display:none"></option>
                            <option>Kantor walikota</option>
                            {{-- <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option>
                            <option>Kantor walikota</option> --}}
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jumlah_rombongan">Jumlah rombongan:</label>
                        <input required type="number" class="form-control" onkeypress="return isNumber(event);"
                            id="jumlah_rombongan">
                    </div>

                    <div class="form-group mb-3">
                        <label for="pimpinan_rombongan">Rencanan Pimpinan Rombongan:</label>
                        <input type="text" class="form-control" id="pimpinan_rombongan"
                            placeholder="pimpinan rombongan">
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" rows="3"></textarea>
                    </div>

                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <b>Data Surat Permohonan Kunjungan</b>

                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="required" for="no_surat">No. Surat Permohonan Kunjungan:</label>
                        <input type="text" class="form-control" id="no_surat"
                            placeholder="nomor surat permohonan kunjungan">
                    </div>

                    <div class="form-group mb-3">
                        <label class="required" for="kepada">Kepada:</label>
                        <input type="text" class="form-control form-control-solid" id="kepada" value="Walikota"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="surat_permohonan">Surat Permohonan Kunjungan :</label>
                        <input type="file" class="form-control" accept=".jpeg,.jpg,.png,.pdf" id="surat_permohonan">
                        <small class="text-danger mt-20">
                            File format <span class="fw-bolder">.jpg/.jpeg/.png/.pdf</span>
                            dan ukuran maks <span class="fw-bolder">3MB</span>
                        </small>
                    </div>

                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div>
                            <label>Pernyataan Ketersediaan:</label>
                            <br>
                            <small class="text-danger mt-20">
                                Semua pernyataan wajib dicentang
                            </small>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="is_bukti_inap">
                                <label class="form-check-label" for="defaultCheck1">
                                    Melaporkan bukti inap di wilayah kota Parepare
                                </label>


                            </div>


                        </div>
                    </div>
                    <div class="text-danger mt-20">
                        Peringatan! Cukup klik submit sekali agar tidak terjadi duplikat data!
                    </div>


                    <div class="d-flex justify-content-start mt-3">

                        <a class="btn-hover-bg btn btn-outline-primary rounded-pill text-black"
                            style="margin-right: 10px;" href="/">Batal
                        </a>
                        {{-- <a class="btn-hover-bg btn btn-primary rounded-pill text-white " href="#" onclick="event.preventDefault(); const form = document.getElementById('form'); if (form) { form.submit(); }">Reservasi
                        </a> --}}

                        <button class="btn-hover-bg btn btn-primary rounded-pill text-white "
                            type="submit">Submit</button>

                </form>

            </div>


            </form>

        </div>


    </div>
    </div>
@endsection

