@extends('layouts.main')

@section('content')
<div class="container">
<section class="py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="pt-6">
                <h2>
                    Get track your applications now, search for free
                </h2>
                <p>
                    Keep search for your passion
                </p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="search" class="form-control search-input" id="search-church" placeholder="Your position">
                            <span class="input-group-btn pl-2">
                                <a class="btn btn-outline-dark button-search " href="{{ asset('lowongan') }}">Search</a>
                            </span>
                        </div>
                        {{-- <div class="searchbar">
                          <input class="search_input" type="text" name="" placeholder="Search...">
                          <a href="#" class="search_icon" placeholder=""><i class="fa fa-search"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
        </div>
        <div class="col-md-5">
            <div class="align-center p-4">
                <img class="img-fluid" src="{{ asset('img/work.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<hr>
<section>
    <div class="row py-3">
        <div class="col-lg-12">
            <h2 class="text-center py-4">
                Why choose us?
            </h2>
            <div class="row pt-4 text-center">
                <div class="col-lg-4">
                    <h4>Terpercaya</h4>
                    <p>Nikmati jutaan lowongan terpercaya dan berkualitas karena telah melewati validasi dari tim kami.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <h4>Terkemuka</h4>
                    <p>Lowongan terkemuka dari berbagai perusahaan top dunia</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <h4>Tracking</h4>
                    <p>Lihat dan amati history lamaran anda, dan terus perbaiki kualitas diri menjadi yang teratas</p>

                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
    </div>
</section>
</div>
@endsection
