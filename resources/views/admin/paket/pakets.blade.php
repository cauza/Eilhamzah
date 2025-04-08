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
                            <form action="{{ route('paket.order') }}" method="get" class="row g-3">
                            <div class="col-md-2">
                                <label for="inputAddress2" class="form-label">Kode Booking</label>
                                <input type="text" class="form-control" name="kode_booking" value="{{ request()->get('kode_booking') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="group_id" class="form-label">Paket</label>
                                <select class="form-control single-selection p-1" name="id_group" id="id_group" >
                                    <option value="">- Pilih Group -</option>
                                    @foreach ($group as $gr)
                                        {{-- @if ( request('id_group') == $gr->id)
                                            <option value="{{ $gr->ID_GROUP }}" selected>{{ $gr->KODE_GROUP }} ({{ date('j F Y', strtotime($gr->TANGGAL_KEBERANGKATAN)) }})</option>
                                        @else --}}
                                            <option value="{{ $gr->ID_GROUP }}">{{ $gr->KODE_GROUP }} ({{ date('j F Y', strtotime($gr->TANGGAL_KEBERANGKATAN)) }})</option>
                                        {{-- @endif --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">Penanggung Jawab</label>
                                <input type="text" class="form-control" name="akun_pj" value="{{ request()->get('akun_pj') }}">
                            </div>
                            <div class="col-md-3" id="datepicker-container" style="position: relative;">
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
                                            <th>Tanggal Pemesanan</th>
                                            <th>Pemesan</th>
                                            <th>Group</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Jumlah Blocking</th>
                                            <th>Jamaah</th>
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
                                       @foreach ($pakets as $val)
                                            <tr>
                                                <td>{{ $val->ID_PACKET }}</td>
                                                <td><a href="{{ route('paket.payments', $val->ID_PACKET ) }}">{{ $val->KODE_BOOKING }}</a></td>
                                                <td>{{ date('d M Y', strtotime($val->TANGGAL_PESAN)) }}</td>
                                                <td>{{ strtoupper($val->account->NAMA_USER) }}</td>
                                                <td>{{ $val->departure->KODE_GROUP }}</td>
                                                <td>{{ date('d M Y', strtotime($val->departure->TANGGAL_KEBERANGKATAN)) }}</td>
                                                <td>{{ $val->JUMLAH_ADULT }}</td>
                                                <td>{{ $val->jamaah_count }}</td>
                                                {{-- <td>{{ $val->program->NAMA_PROGRAM }}</td>
                                                <td>{{ $val->ID_ROOM_TYPE }}</td>
                                                <td>{{ number_format($val->HARGA_KAMAR) }}</td>
                                                <td>{{ $val->JUMLAH_KAMAR }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $pakets->appends(\Request::except('page'))->render() !!}
                            <p>
                            Menampilkan {{ number_format((($pakets->currentPage() - 1) * $pakets->perPage()) + 1) }} - {{ $pakets->currentPage() == $pakets->lastPage() ? number_format($pakets->total()) : number_format($pakets->currentPage() * $pakets->perPage()) }} dari {{ number_format($pakets->total()) }} Pesanan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
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
    
@endsection