@extends('layouts.admin')

@section('title')
    <title>Zafa Tour - Data Eilhamzah</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pesanan</li>
        <li class="breadcrumb-item active">Pembaayaran</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Rincian Pembayaran
                                <div class="float-right">
                                    
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="40px">Id</th>
                                            <th>Nama Jamaah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                       @foreach ($paket->paketDetail as $val)
                                            <tr>
                                                <td>{{ $val->ID }}</td>
                                                <td>{{ $val->z_nama_ktp }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                            <th>Tanggal Transaksi</th>
                                            <th>Metode</th>
                                            <th>Via</th>
                                            <th>No. Rek</th>
                                            <th>Mata Uang</th>
                                            <th>Jumlah</th>
                                            <th>Jamaah</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                       @foreach ($payments as $val)
                                            <tr>
                                                <td>{{ $val->ID_PAYMENT }}</td>
                                                <td>{{ date('d M Y', strtotime($val->TANGGAL_TRANSFER)) }}</td>
                                                <td>{{ $val->CARA_PEMBAYARAN }}</td>
                                                <td>{{ $val->BAYAR_MELALUI }}</td>
                                                <td>{{ $val->NO_REKENING_TUJUAN }}</td>
                                                <td>{{ $val->JENIS_CURRENCY }}</td>
                                                <td>{{ number_format($val->JUMLAH_RP) }}</td>
                                                <td>{{ $val->JAMAAH }}</td>
                                                <td>{{ $val->CATATAN }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $payments->appends(\Request::except('page'))->render() !!}
                            <p>
                            Menampilkan {{ number_format((($payments->currentPage() - 1) * $payments->perPage()) + 1) }} - {{ $payments->currentPage() == $payments->lastPage() ? number_format($payments->total()) : number_format($payments->currentPage() * $payments->perPage()) }} dari {{ number_format($payments->total()) }} Transaksi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
@endsection