@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Search with your custom
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Posisi/kata kunci">
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Lokasi">
                            <datalist id="daerah">
                                <option value="Riau">Riau</option>
                                <option value="Palembang">Palembang</option>
                                <option value="Medan">Medan</option>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Minimun Gaji (Rp.)">
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Kategori">
                            <datalist id="daerah">
                                <option value="Riau">UX Designer</option>
                                <option value="Palembang">Accounting</option>
                                <option value="Medan">Art</option>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Tipe">
                            <datalist id="daerah">
                                <option value="Riau">Full Time</option>
                                <option value="Palembang">Part Time</option>
                                <option value="Palembang">Remote</option>
                                <option value="Medan">Intern</option>
                            </datalist>
                        </div>
                    </form>
                    <a href="#" class="btn btn-block btn-sm btn-primary">Terapkan</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="row p-4">
                    <div class="col-md-12">
                        <div class="row no-gutters rounded overflow-hidden flex-md-row h-md-250 position-relative">
                            <div class="col d-flex flex-column position-static">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="#" style="text-decoration: none;">
                                            <strong class="d-inline-block mb-2 text-muted">PT BNI 46</strong>
                                        </a>
                                        <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Perusahaan terverifikasi mitra kami"></i>
                                        <h4 class="mb-0">Sales Marketing</h4>
                                        <div class="mb-1 text-muted">
                                            <small>Rp. 1.200.000 - 2.500.000</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mr-auto">
                                        <img src="{{ asset('img/bni.svg') }}" class="img-fluid pt-2" alt="">
                                    </div>
                                </div>
                                <p class="card-text mb-auto text-justify">Menciptakan hubungan baik dengan customer. Melakukan SOP pembukaan dan penutupan toko, serta Melakukan stock opname...</p>
                                {{-- <a href="#" class="stretched-link pt-3">Continue reading</a> --}}
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Pekanbaru</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Posted 5 days ago &bull; Apply before 4 Sept </button>
                                    </div>
                                    <a href="{{ url('lowongan-detail') }}" class="btn btn-sm btn-primary">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row p-4 mt-n3">
                    <div class="col-md-12">
                        <div class="row no-gutters rounded overflow-hidden flex-md-row h-md-250 position-relative">
                            <div class="col d-flex flex-column position-static">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="#" style="text-decoration: none;">
                                            <strong class="d-inline-block mb-2 text-muted">ArgaPro</strong>
                                        </a>
                                        <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Perusahaan terverifikasi mitra kami"></i>
                                        <h4 class="mb-0">System Administrator</h4>
                                        <div class="mb-1 text-muted">
                                            <small>Rp. 1.200.000 - 2.500.000</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mr-auto">
                                        <img src="{{ asset('img/argapro.png') }}" class="img-fluid pt-2" alt="">
                                    </div>
                                </div>
                                <p class="card-text mb-auto text-justify">Sejauh ini kita menyaring seluruh kandidat dengan dua syarat utama: memiliki attitude positive, dan melihat keadaan apapun dengan pandangan yang optimis.

                                    Jam kerja saya buat fleksibel, tiap karyawan dapat jatah remote working 2 hari/bulan, dan jatah cuti 1 hari/bulan.</p>
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Bandung</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Posted 1 days ago &bull; Apply before 12 Feb</button>
                                    </div>
                                    <button class="btn btn-sm btn-primary">
                                        Selengkapnya
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <nav aria-label="Page navigation ">
                    <ul class="pagination justify-content-end mr-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>

@endsection
