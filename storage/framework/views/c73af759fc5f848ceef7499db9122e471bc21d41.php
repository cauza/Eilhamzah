<?php $__env->startSection('title'); ?>
    <title>Zafa Tour - Data Eilhamzah</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pesanan</li>
        <li class="breadcrumb-item active">Detail Pesanan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail Pemesanan
                                <div class="float-right">
                                    
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <h>Data Jamaah</h>
                             <?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="40px">Id</th>
                                            <th>Nama Jamaah</th>
                                            <th>NIK - Paspor Manifest - Paspor Terdaftar</th>
                                            <th>Harga Paket</th>
                                            <th>Biaya Tambahan</th>
                                            <th>Diskon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $no = 1;
                                          $total_tagihan = 0;
                                      ?>
                                       <?php $__currentLoopData = $paket->jamaah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID); ?></td>
                                                <td><?php echo e(strtoupper($val->z_nama_ktp)); ?></td>
                                                <td><?php echo e(!empty($val->data->NIK)? strtoupper($val->data->NIK) :'NaN'); ?> - <?php echo e(!empty($val->z_nomor_paspor)? strtoupper($val->z_nomor_paspor) : 'NaN'); ?> - <?php echo e(!empty($val->data->NIK)? strtoupper($val->data->NO_PASPOR) :'NaN'); ?></td>
                                                <td class="text-right"><?php echo e(!empty($val->z_harga_paket_idr)?'Rp. '. number_format($val->z_harga_paket_idr) : number_format($val->z_harga_paket_usd)); ?></td>
                                                <td class="text-right"><?php echo e(!empty($val->z_tambahan_idr)?'Rp. '. number_format($val->z_tambahan_idr) : number_format($val->z_tambahan_usd)); ?></td>
                                                <td class="text-right"><?php echo e(!empty($val->z_diskon_idr)?'Rp. '. number_format($val->z_diskon_idr) : number_format($val->z_diskon_usd)); ?></td>
                                            </tr>
                                        <?php 
                                            $no++; 
                                            $total_tagihan += $val->z_harga_paket_idr + $val->z_tambahan_idr - $val->z_diskon_idr;
                                        ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <thead><th colspan="3">Total</th><th colspan="3">Rp. <?php echo e(number_format($total_tagihan)); ?></th></thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h>Rincian Pembayaran</h>
                          	<!-- FORM UNTUK FILTER DAN PENCARIAN -->
                             
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
                                      <?php
                                          $no = 1;
                                          $total_bayar =0;
                                      ?>
                                       <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($val->ID_PAYMENT); ?></td>
                                                <td><?php echo e(date('d M Y', strtotime($val->TANGGAL_TRANSFER))); ?></td>
                                                <td><?php echo e($val->CARA_PEMBAYARAN); ?></td>
                                                <td><?php echo e($val->BAYAR_MELALUI); ?></td>
                                                <td><?php echo e($val->NO_REKENING_TUJUAN); ?></td>
                                                <td><?php echo e($val->JENIS_CURRENCY); ?></td>
                                                <td><?php echo e(number_format($val->JUMLAH_RP)); ?></td>
                                                <td><?php echo e($val->JAMAAH); ?></td>
                                                <td><?php echo e($val->CATATAN); ?></td>
                                            </tr>
                                            <?php $total_bayar += $val->JUMLAH_RP; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <thead><th colspan="6">Total</th><th colspan="3">Rp. <?php echo e(number_format($total_bayar)); ?></th></thead>
                                </table>
                            </div>
                            <?php echo $payments->appends(\Request::except('page'))->render(); ?>

                            <p>
                            Menampilkan <?php echo e(number_format((($payments->currentPage() - 1) * $payments->perPage()) + 1)); ?> - <?php echo e($payments->currentPage() == $payments->lastPage() ? number_format($payments->total()) : number_format($payments->currentPage() * $payments->perPage())); ?> dari <?php echo e(number_format($payments->total())); ?> Transaksi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\App\Eilhamzah\resources\views/admin/paket/pembayaran.blade.php ENDPATH**/ ?>