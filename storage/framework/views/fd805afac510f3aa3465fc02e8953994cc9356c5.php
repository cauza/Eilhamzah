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
                            <form action="<?php echo e(route('paket.order')); ?>" method="get" class="row g-3">
                            <div class="col-md-2">
                                <label for="inputAddress2" class="form-label">Kode Booking</label>
                                <input type="text" class="form-control" name="kode_booking" value="<?php echo e(request()->get('kode_booking')); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="group_id" class="form-label">Paket</label>
                                <select class="form-control single-selection p-1" name="id_group" id="id_group" >
                                    <option value="">- Pilih Group -</option>
                                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                            <option value="<?php echo e($gr->ID_GROUP); ?>"><?php echo e($gr->KODE_GROUP); ?> (<?php echo e(date('j F Y', strtotime($gr->TANGGAL_KEBERANGKATAN))); ?>)</option>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">Penanggung Jawab</label>
                                <input type="text" class="form-control" name="akun_pj" value="<?php echo e(request()->get('akun_pj')); ?>">
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
                                            <th>Tanggal Pemesanan</th>
                                            <th>Pemesan</th>
                                            <th>Group</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Jumlah Blocking</th>
                                            <th>Jamaah</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $no = 1;
                                      ?>
                                       <?php $__currentLoopData = $pakets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID_PACKET); ?></td>
                                                <td><a href="<?php echo e(route('paket.payments', $val->ID_PACKET )); ?>"><?php echo e($val->KODE_BOOKING); ?></a></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->TANGGAL_PESAN))); ?></td>
                                                <td><?php echo e(strtoupper($val->account->NAMA_USER)); ?></td>
                                                <td><?php echo e($val->departure->KODE_GROUP); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->departure->TANGGAL_KEBERANGKATAN))); ?></td>
                                                <td><?php echo e($val->JUMLAH_ADULT); ?></td>
                                                <td><?php echo e($val->jamaah_count); ?></td>
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $pakets->appends(\Request::except('page'))->render(); ?>

                            <p>
                            Menampilkan <?php echo e(number_format((($pakets->currentPage() - 1) * $pakets->perPage()) + 1)); ?> - <?php echo e($pakets->currentPage() == $pakets->lastPage() ? number_format($pakets->total()) : number_format($pakets->currentPage() * $pakets->perPage())); ?> dari <?php echo e(number_format($pakets->total())); ?> Pesanan
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/admin/paket/pakets.blade.php ENDPATH**/ ?>