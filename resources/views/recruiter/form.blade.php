@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="p-4">
                    <h5>Form Lamaran</h5>
                </div>
                {{-- <div class="card-body mt-n4">
                    <form method="POST" action="{{ url('vacancy/store') }}" class="px-1">
                      @csrf
                        <div class="form-group">
                            <label for="">Job Title</label>
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="title job">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="form-control form-control-sm" name="bidang">
                                        <option value="IT Software">Accounting and Finance</option>
                                        <option value="Administration and Coordination">Administration and Coordination</option>
                                        <option value="Architecture and Engineering">Architecture and Engineering</option>
                                        <option value="Arts and Sports">Arts and Sports</option>
                                        <option value="Customer Service">Customer Service</option>
                                        <option value="Education and Training">Education and Training</option
                                        <option value="General Services">General Services</option>
                                        <option value="Health and Medical">Health and Medical</option>
                                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                        <option value="Human Resources">Human Resources</option>
                                        <option value="IT and Software">IT and Software</option>
                                        <option value="Legal">Legal</option>
                                        <option value="Management and Consultancy">Management and Consultancy</option>
                                        <option value="Manufacturing and Production">Manufacturing and Production</option>
                                        <option value="Media and Creatives">Media and Creatives</option>
                                        <option value="Public Service">PublicService</option>
                                        <option value="Safety and Security">Safety and Security</option>
                                        <option value="Sales and Marketing">Sales and Marketing</option>
                                        <option value="Sciences">Sciences</option>
                                        <option value="Supply Chain">Supply Chain</option>
                                        <option value="Writing and Content">Writing and Content</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <select class="form-control form-control-sm" name="subbidang">
                                        <option value="Internship / OJT">Internship / OJT</option>
                                        <option value="Entry Level / Junior">Entry Level / Junior</option>
                                        <option value="Associate / Supervisor">Associate / Supervisor</option>
                                        <option value="Mid-Senior Level / Manager">Mid-Senior Level / Manager</option>
                                        <option value="Director / Executive">Director / Executive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Rentang Gaji Minimal</label>
                                    <input type="text" class="form-control form-control-sm" name="gajimin" placeholder="*Dalam angka">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Rentang Gaji Maksimal</label>
                                    <input type="text" class="form-control form-control-sm" name="gajimax" placeholder="*Dalam angka">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Type Pekerjaan</label>
                                    <select class="form-control form-control-sm" name="type">
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Kontrak">Kontrak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Daerah Kerja</label>
                                    <select class="form-control form-control-sm" name="daerah">
                                        <option value="null">Pilih kota</option>
                                        @foreach ($daerah as $data)
                                          <option value="{{ $data->id }}">{{ $data->daerah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label for="expired">Tutup penerimaan</label>
                                  <input type="date" id="txtDate" class="form-control form-control-sm" name="expired">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Slot posisi</label>
                                    <input type="text" name="slot" class="form-control form-control-sm" placeholder="Jumlah persona">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea name="description" rows="3"></textarea>
                            <script>
                              CKEDITOR.replace( 'description' );
                            </script>
                        </div>


                        <div class="float-right">
                          <a href="{{ url('recruiter/vacancy') }}" class="btn btn-light">Kembali</a>
                          <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Judul pekerjaan</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Informasi pekerjaan</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Kualifikasi pekerjaan</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ url('vacancy/store') }}" class="px-1">
                        @csrf
                        <div class="row setup-content" id="step-1">
                            <h3 class="ml-3">Judul pekerjaan</h3>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <input type="text" name="title" class="form-control form-control-sm" placeholder="title job">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi</label>
                                    <textarea name="description" rows="3"></textarea>
                                    <script>
                                      CKEDITOR.replace( 'description' );
                                    </script>
                                </div>
                                <button class="btn btn-primary nextBtn float-right" type="button" >Next</button>  
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <h3 class="ml-3">
                                Informasi pekerjaan
                            </h3>
                            <div class="col-md-12">

                            </div>
                            <div class="form-group col-6">
                                <label for="">Kategori</label>
                                <select class="form-control form-control-sm" name="bidang">
                                    <option value="IT Software">Accounting and Finance</option>
                                    <option value="Administration and Coordination">Administration and Coordination</option>
                                    <option value="Architecture and Engineering">Architecture and Engineering</option>
                                    <option value="Arts and Sports">Arts and Sports</option>
                                    <option value="Customer Service">Customer Service</option>
                                    <option value="Education and Training">Education and Training</option>
                                    <option value="General Services">General Services</option>
                                    <option value="Health and Medical">Health and Medical</option>
                                    <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="IT and Software">IT and Software</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Management and Consultancy">Management and Consultancy</option>
                                    <option value="Manufacturing and Production">Manufacturing and Production</option>
                                    <option value="Media and Creatives">Media and Creatives</option>
                                    <option value="Public Service">PublicService</option>
                                    <option value="Safety and Security">Safety and Security</option>
                                    <option value="Sales and Marketing">Sales and Marketing</option>
                                    <option value="Sciences">Sciences</option>
                                    <option value="Supply Chain">Supply Chain</option>
                                    <option value="Writing and Content">Writing and Content</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Level</label>
                                <select class="form-control form-control-sm" name="subbidang">
                                    <option value="Internship / OJT">Internship / OJT</option>
                                    <option value="Entry Level / Junior">Entry Level / Junior</option>
                                    <option value="Associate / Supervisor">Associate / Supervisor</option>
                                    <option value="Mid-Senior Level / Manager">Mid-Senior Level / Manager</option>
                                    <option value="Director / Executive">Director / Executive</option>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group">
                                  <label for="expired">Tutup penerimaan</label>
                                  <input type="date" id="txtDate" class="form-control form-control-sm" name="expired">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Slot posisi</label>
                                    <input type="text" name="slot" class="form-control form-control-sm" placeholder="Jumlah persona">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Rentang Gaji Minimal</label>
                                    <input type="text" class="form-control form-control-sm" name="gajimin" placeholder="*Dalam angka">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Rentang Gaji Maksimal</label>
                                    <input type="text" class="form-control form-control-sm" name="gajimax" placeholder="*Dalam angka">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Pilihan lain</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gaji" id="gaji1" value="Gaji dirahasiakan">
                                <label class="form-check-label" for="gaji1">
                                    Gaji dirahasiakan
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gaji" id="gaji2" value="Gaji dapat dinegosiasi">
                                <label class="form-check-label" for="gaji2">
                                    Gaji dapat dinegosiasi
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gaji" id="gaji3" value="Lebih tinggi dari UMR Dareah">
                                <label class="form-check-label" for="gaji3">
                                    Lebih tinggi dari UMR Dareah
                                </label>
                                </div>
                                <button class="btn btn-primary nextBtn float-right" type="button" >Next</button>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <h3 class="ml-3">Kualifikasi pekerjaan</h3>
                            <div class="col-md-12"></div>
                            <div class="form-group col-6">
                                <label for="">Keilmuwan</label>
                                <select class="form-control form-control-sm" name="keilmuan">
                                    <option value="" class="pilih_keilmuan">Pilih Bidang Keilmuan</option>
                                    @foreach ($keilmuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Sub keilmuwan</label>
                                <select class="form-control form-control-sm" name="subkeilmuan">
                                    <option value="" class="pilih_subkeilmuan">Pilih Sub Bidang Keilmuan</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Type Pekerjaan</label>
                                    <select class="form-control form-control-sm" name="type">
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Kontrak">Kontrak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Daerah Kerja</label>
                                    <select class="form-control form-control-sm" name="daerah">
                                        <option value="null">Pilih kota</option>
                                        @foreach ($daerah as $data)
                                          <option value="{{ $data->id }}">{{ $data->daerah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-success float-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>          
</div>
@endsection
