@extends('layouts.admin')

@section('title')
    <title>Zafa Tour - Data Eilhamzah</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Pesanan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Advance Search</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('paket.jamaah') }}" method="get" class="row g-3">
                            <div class="col-md-4">
                                <label for="inputAddress2" class="form-label">Nama Jamaah</label>
                                <input type="text" class="form-control" name="nama" value="{{ request()->get('nama') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" value="{{ request()->get('nik') }}">
                            </div>
                            <div class="col-md-4" id="datepicker-container" style="position: relative;">
                                <label for="inputState" class="form-label">Tanggal Keberangkatan</label>
                                <input type="text" class="form-control" name="tanggal_berangkat" id="tanggal">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputState" class="form-label"> </label>
                            </div>
                            <div class="col-12">
                                <label for="inputState" class="form-label"></label>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Pemesanan Paket 
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
                                            <th>Kode Booking</th>
                                            <th>Nama Jamaah</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Paspor</th>
                                            <th>Nomor Paspor</th>
                                            <th>Paket</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Room Type</th>
                                            {{-- <th>Nama Program</th>
                                            <th>Room Type</th>
                                            <th>Harga Kamar</th>
                                            <th>Jumlah Kamar</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                       @foreach ($jamaahs as $val)
                                            <tr>
                                                <td>{{ $val->ID }}</td>
                                                <td><a href="{{ !empty($val->paket->ID_PACKET )? route('paket.payments', $val->paket->ID_PACKET ) : '#' }}">{{ $val->KODE_BOOKING }}</a></td>
                                                <td>{{ strtoupper($val->z_nama_ktp) }}</td>
                                                <td>{{ !empty($val->data->NIK)? strtoupper($val->data->NIK) :'NaN' }}</td>
                                                <td>{{ $val->z_jenis_kelamin}}</td>
                                                <td>{{ !empty($val->data->NAMA_PASPOR)? strtoupper($val->data->NAMA_PASPOR) : 'NaN' }}</td>
                                                <td>{{ strtoupper($val->z_nomor_paspor) }}</td>
                                                <td>{{ $val->z_paket}}</td>
                                                <td>{{ date('d M Y', strtotime($val->z_group)) }}</td>
                                                <td>{{ $val->z_room_type }}</td>
                                                {{-- <td>{{ $val->program->NAMA_PROGRAM }}</td>
                                                <td>{{ $val->ID_ROOM_TYPE }}</td>
                                                <td>{{ number_format($val->HARGA_KAMAR) }}</td>
                                                <td>{{ $val->JUMLAH_KAMAR }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $jamaahs->appends(\Request::except('page'))->render() !!}
                            <p>
                            Menampilkan {{ number_format((($jamaahs->currentPage() - 1) * $jamaahs->perPage()) + 1) }} - {{ $jamaahs->currentPage() == $jamaahs->lastPage() ? number_format($jamaahs->total()) : number_format($jamaahs->currentPage() * $jamaahs->perPage()) }} dari {{ number_format($jamaahs->total()) }} Pesanan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<<<<<<< HEAD
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.single-selection').select2();

    $('#tanggal').datepicker({
                "todayHighlight": true,
                "setDate": new Date(),
                "autoclose": true,
                format: 'yyyy-mm-dd',
                container: '#datepicker-container'
        })


    });
</script>
    
=======
>>>>>>> c9d9446153c680099a6a5b950da411cd186ec8a0
@endsection