@extends('layouts.main')
@section('container')

<div class="row">
    <div class="col-12 col-md-6 my-3">
        <section id="input">
                    <div class="card text-capitalize">
                        <div class="card-header bg-success-subtle text-center ">
                            <h5 class="mb-1" >Form Pengaduan Siswa</h5>
                            <hr class="m-0">
                            <p class="m-0" style="font-size: 13px;">Mohon diisi dengan teliti!</p>
                        </div>
                        <div class="card-body ">
                            <form class="row g-3" action="/aspirasi/store" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 col-md-3">
                                            <label class="form-label mb-0 fw-bold">ID Pelapor</label>
                                            <input type="text" name="id" class="form-control" readonly
                                                value="{{ $no }}">
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label class="form-label mb-0 fw-bold">Nomor Induk Siswa</label>
                                            <input type="number" autocomplete="off" name="nis" value="{{ old('nis') }}"
                                                class="form-control @error('nis') is-invalid @enderror">
                                            @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header p-1">
                                                    <label class="form-label mb-0 fw-bold">Kategori</label>
                                                </div>
                                                <div class="card-body p-0">
                                                    @foreach ($kategori as $kat)
                                                    <div class="ps-2 py-1">
                                                        <input  class="form-check-input" value="{{ $kat->id }}" type="radio" name="kategori_id" id="id_kategori1">
                                                        <label class="form-check-label" for="id_kategori1">
                                                            {{ $kat->ket_kategori }}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                                
                                        <div class="col-12">
                                            <label class="form-label mb-0 fw-bold">lokasi</label>
                                            <input type="text" autocomplete="off" name="lokasi" value="{{ old('lokasi') }}"
                                                class="form-control  @error('lokasi') is-invalid @enderror">
                                            @error('lokasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label mb-0 fw-bold">Keterangan</label>
                                            <textarea name="ket" id="" value="{{ old('ket') }}"
                                                class="form-control @error('ket') is-invalid @enderror" rows="2"></textarea>
                                            @error('ket')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success mt-3 w-100">Submit</button>
                                    </form>
                        </div>
                    </div>
        </section>
    </div>
    <div class="col-12 col-md-6 my-3">
        <section id="aspirasi" class="">
            <div class="card text-capitalize">
                <div class="card-header bg-success-subtle text-center ">
                    <h5 class="mb-1" >Lihat Pengaduan Siswa</h5>
                            <hr class="m-0">
                            <p class="m-0" style="font-size: 13px;">diisi menggunakan ID yang sudah diberikan !</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-3 border-bottom">
                            <form action="/aspirasi" class="" method="get">
                                <div class="input-group">
                                    <input type="text" autocomplete="off" required name="search"
                                    value="{{ request('search') }}" class="form-control"
                                                placeholder="Masukkan Nomor Pengaduan" aria-label="Recipient's username"
                                                aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                                    class="bi bi-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        @if (request('search') != null)
                                        <div class="col-12 px-4  py-3">
                                    @foreach ($aspirasi as $as)
                                    <div class="d-flex">
                                        <p class="fw-bold p-0 m-0 me-2">Nomor Pengaduan : </p>
                                        <p class="p-0 m-0">{{ $as->id }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="fw-bold p-0 m-0 me-2">Status : </p>
                                        <p class="p-0 m-0">{{ $as->status }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="fw-bold p-0 m-0 me-2">Kategori : </p>
                                        <p class="p-0 m-0">{{ $as->kategori->ket_kategori }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="fw-bold p-0 m-0 me-2">lokasi : </p>
                                        <p class="p-0 m-0">{{ $as->input_aspirasi->lokasi }}</p>
                                    </div>
                                    <div class="d-flex {{( $as->feedback !=null)? 'd-block':'d-none'}}">
                                        <p class="fw-bold p-0 m-0 me-2">Ratting : </p>
                                        <p class="p-0 m-0">{{ $as->feedback }}</p>
                                    </div>
                                    <div class="d-block">
                                        <p class="fw-bold p-0 m-0 me-2">Waktu Pengaduan : </p>
                                        <p class="p-0 m-0">{{ $as->input_aspirasi->created_at }}</p>
                                    </div>
                                    @if ($as['status'] == 'Selesai' and $as['feedback'] == null)
                                    <form action="/aspirasi/feedback" method="POST" class=" p-2  rounded-2 text-center">
                                        @csrf
                                        <div class="btn btn-danger ">
                                            <input type="hidden" name="id_aspirasi" value="{{ $as->id  }}">
                                            <input type="radio" class="" required name="feedback" value="1" id="">
                                            <label class="form-check-label">
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </label>
                                        </div>
                                        <div class="btn-danger btn">
                                            <input type="radio" class="" name="feedback" required value="2" id="">
                                            <label class="form-check-label">
                                               <i class="bi bi-star-fill text-warning"></i>
                                            </label>
                                        </div>
                                        <div class="btn btn-danger">
                                            <input type="radio" class="" name="feedback" required value="3" id="">
                                            <label class="form-check-label">
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </label>
                                        </div>
                                        <div class="btn btn-danger">
                                            <input type="radio" class="" name="feedback" required value="4" id="">
                                            <label class="form-check-label">
                                               <i class="bi bi-star-fill text-warning"></i>
                                            </label>
                                        </div>
                                        <div class="btn btn-danger"> 
                                            <input type="radio" class="" required name="feedback" value="5" id="">
                                                <label class="form-check-label">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary text-light"><i
                                                class="bi bi-send-fill"></i> </button>
                                            </form>
                                            @endif
                                            
                                        </div>
                                @endforeach
                                @else
                                @endif
                                
                            </div>
                        </div>
                    </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-12">
                <div class="">
                    @if (request('id') != null)
                    <div class="alert mt-5 alert-primary alert-dismissible fade show" role="alert">
                        <small>Terimakasih Telah Melakukan Pengaduan,
                            Nomor Pengaduan : {{ request('id') }}</small>
                        <strong class="">Silahkan Di Ingat Nomor pengaduannya!!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
                    @endif
                    @if (request('nis') != null)
                    <div class="alert mt-5 alert-danger alert-dismissible fade show" role="alert">
                    <strong> NIS Anda Belum Terdaftar!! </strong>
                    <small>Silahkan Isi Datanya Kembali Dengan Benar</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                    @endif
    </div>
</div>


    
    @endsection