<?php $__env->startSection('title'); ?>
    <title>Zafa Tour - Data Eilhamzah</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                            <form action="<?php echo e(route('paket.jamaah')); ?>" method="get" class="row g-3">
                            <div class="col-md-4">
                                <label for="inputAddress2" class="form-label">Nama Jamaah</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo e(request()->get('nama')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" value="<?php echo e(request()->get('nik')); ?>">
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
                            <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                            <?php endif; ?>

                          	<!-- FORM UNTUK FILTER DAN PENCARIAN -->
                             
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
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $no = 1;
                                      ?>
                                       <?php $__currentLoopData = $jamaahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID); ?></td>
                                                <td><a href="<?php echo e(!empty($val->paket->ID_PACKET )? route('paket.payments', $val->paket->ID_PACKET ) : '#'); ?>"><?php echo e($val->KODE_BOOKING); ?></a></td>
                                                <td><?php echo e(strtoupper($val->z_nama_ktp)); ?></td>
                                                <td><?php echo e(!empty($val->data->NIK)? strtoupper($val->data->NIK) :'NaN'); ?></td>
                                                <td><?php echo e($val->z_jenis_kelamin); ?></td>
                                                <td><?php echo e(!empty($val->data->NAMA_PASPOR)? strtoupper($val->data->NAMA_PASPOR) : 'NaN'); ?></td>
                                                <td><?php echo e(strtoupper($val->z_nomor_paspor)); ?></td>
                                                <td><?php echo e($val->z_paket); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->z_group))); ?></td>
                                                <td><?php echo e($val->z_room_type); ?></td>
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $jamaahs->appends(\Request::except('page'))->render(); ?>

                            <p>
                            Menampilkan <?php echo e(number_format((($jamaahs->currentPage() - 1) * $jamaahs->perPage()) + 1)); ?> - <?php echo e($jamaahs->currentPage() == $jamaahs->lastPage() ? number_format($jamaahs->total()) : number_format($jamaahs->currentPage() * $jamaahs->perPage())); ?> dari <?php echo e(number_format($jamaahs->total())); ?> Pesanan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/admin/paket/jamaahs.blade.php ENDPATH**/ ?>