<?php $__env->startSection('title'); ?>
    <title>Zafa Tour - Data Eilhamzah</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Kelola Paket</li>
        <li class="breadcrumb-item active">Kamar</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Harga Kamar
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
                                            <th>Group</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Nama Program</th>
                                            
                                            <th>Room Type</th>
                                            <th>Harga Kamar</th>
                                            <th>Jumlah Kamar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $no = 1;
                                      ?>
                                       <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID_AVAILABILITY); ?></td>
                                                <td><?php echo e($val->departure->KODE_GROUP); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->departure->TANGGAL_KEBERANGKATAN))); ?></td>
                                                
                                                <td><?php echo e($val->program->NAMA_PROGRAM); ?></td>
                                                
                                                <td><?php echo e($val->ID_ROOM_TYPE); ?></td>
                                                <td><?php echo e(number_format($val->HARGA_KAMAR)); ?></td>
                                                <td><?php echo e($val->JUMLAH_KAMAR); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $rooms->appends(\Request::except('page'))->render(); ?>

                            <p>
                            Menampilkan <?php echo e(number_format((($rooms->currentPage() - 1) * $rooms->perPage()) + 1)); ?> - <?php echo e($rooms->currentPage() == $rooms->lastPage() ? number_format($rooms->total()) : number_format($rooms->currentPage() * $rooms->perPage())); ?> dari <?php echo e(number_format($rooms->total())); ?> Kamar
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/admin/paket/rooms.blade.php ENDPATH**/ ?>