@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Form Lamaran</h5>
                    <hr>
                </div>
                <div class="card-body mt-n4">
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
                                          <option value="{{ $data->daerah }}">{{ $data->daerah }}</option>

                                        @endforeach
                                        {{-- <option value="Banda Aceh">Banda Aceh</option>
                                        <option value="Denpasar">Denpasar</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Jambi">Jambi</option> --}}
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


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
