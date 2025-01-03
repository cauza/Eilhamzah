@extends('layouts.admin')

@section('title')
   <title>Zafa Tour - Data Eilhamzah</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Group Keberangkatan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Group Keberangkatan
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
                                            <th>Nama Group</th>
                                            <th>Tanggal Keberaangkatan</th>
                                            <th>Batas Pendaftaran</th>
                                            <th>Batas Pelunasan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                       @foreach ($departures as $val)
                                            <tr>
                                                <td>{{ $val->ID_GROUP }}</td>
                                                <td>{{ $val->KODE_GROUP }}</td>
                                                <td>{{ date('d M Y', strtotime($val->TANGGAL_KEBERANGKATAN)) }}</td>
                                                <td>{{ date('d M Y', strtotime($val->JATUH_TEMPO_PASPOR)) }}</td>
                                                <td>{{ date('d M Y', strtotime($val->JATUH_TEMPO_PELUNASAN)) }}</td>
                                                <td>{{ ($val->STATUS=='1')?'AKTIF':'NON AKTIF' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $departures->appends(\Request::except('page'))->render() !!}
                            <p>
                            Menampilkan {{ number_format((($departures->currentPage() - 1) * $departures->perPage()) + 1) }} - {{ $departures->currentPage() == $departures->lastPage() ? number_format($departures->total()) : number_format($departures->currentPage() * $departures->perPage()) }} dari {{ number_format($departures->total()) }} Group
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
@endsection