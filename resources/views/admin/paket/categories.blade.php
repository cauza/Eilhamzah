@extends('layouts.admin')

@section('title')
    <title>Zafa Tour - Data Eilhamzah</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kategori Paket</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Kategori Paket
                                <div class="float-right">
                                    
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                          	<!-- FORM UNTUK FILTER DAN PENCARIAN -->
                             {{-- <form class="form-inline" action="{{ route('admin.saksi') }}" method="get">
                                
                                <div class="form-group mb-2">
                                    Halaman : 
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <select name="page" class="form-control mr-3" onchange="javascript:this.form.submit()">
                                       @php
                                            for($i=1; $i<=$meta->last_page; $i++){
                                                if ($meta->current_page==$i){
                                                    echo "<option value=\"$i\" selected>$i</option>";
                                                } else {
                                                    echo "<option value=\"$i\" >$i</option>";
                                                }
                                            }
                                       @endphp
                                    </select>
                                </div>
                                Menampilkan {{ $meta->per_page }} data dari &nbsp; <span class="badge badge-success">{{ number_format($meta->total)}}</span>
                            </form> --}}
                            <!-- FORM UNTUK FILTER DAN PENCARIAN -->
                          
                          	<!-- TABLE UNTUK MENAMPILKAN DATA ORDER -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="40px">Id</th>
                                            <th>Nama Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                       @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->ID_KATEGORI }}</td>
                                                <td>{{ $category->NAMA_KATEGORI }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $categories->appends(\Request::except('page'))->render() !!}
                            <p>
                            Menampilkan {{ number_format((($categories->currentPage() - 1) * $categories->perPage()) + 1) }} - {{ $categories->currentPage() == $categories->lastPage() ? number_format($categories->total()) : number_format($categories->currentPage() * $categories->perPage()) }} dari {{ number_format($categories->total()) }} Kategori
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
@endsection