<?php $__env->startSection('title'); ?>
   <title>Zafa Tour - Data Eilhamzah</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                            <th>Nama Group</th>
                                            <th>Tanggal Keberaangkatan</th>
                                            <th>Batas Pendaftaran</th>
                                            <th>Batas Pelunasan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $no = 1;
                                      ?>
                                       <?php $__currentLoopData = $departures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID_GROUP); ?></td>
                                                <td><?php echo e($val->KODE_GROUP); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->TANGGAL_KEBERANGKATAN))); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->JATUH_TEMPO_PASPOR))); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->JATUH_TEMPO_PELUNASAN))); ?></td>
                                                <td><?php echo e(($val->STATUS=='1')?'AKTIF':'NON AKTIF'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $departures->appends(\Request::except('page'))->render(); ?>

                            <p>
                            Menampilkan <?php echo e(number_format((($departures->currentPage() - 1) * $departures->perPage()) + 1)); ?> - <?php echo e($departures->currentPage() == $departures->lastPage() ? number_format($departures->total()) : number_format($departures->currentPage() * $departures->perPage())); ?> dari <?php echo e(number_format($departures->total())); ?> Group
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/admin/paket/departures.blade.php ENDPATH**/ ?>