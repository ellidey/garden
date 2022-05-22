<?php $__env->startSection('title'); ?> Магазин <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Магазин <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Каталог товаров <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-xl-3">
            <!-- Simple card -->
            <div class="card">
                <div class="overflow-hidden" style="height: 300px;">
                    <img style="min-height: 100%;" class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/' . $item->image)); ?>" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-2"> <?php echo e($item->name); ?> </h4>
                    <p class="card-text"><?php echo e(mb_strimwidth($item->description, 0, 35, '...')); ?></p>
                    <div class="text-end">
                        <a href="<?php echo e(route('item', $item->id)); ?>" class="btn btn-primary">
                            <i class="ri-shopping-cart-2-line"></i>
                             Подробнее
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/index.blade.php ENDPATH**/ ?>