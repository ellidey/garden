<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.product-Details'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Магазин <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>Информация о продукте <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper">
                                        <img src="<?php echo e(URL::asset('images/' . $item->image)); ?>" alt=""
                                             class="img-fluid d-block" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4><?php echo e($item->name); ?></h4>
                                    </div>
                                    <?php if(Auth::user() && Auth::user()->role_id == 1): ?>
                                        <div class="flex-shrink-0">
                                            <div>
                                                <a href="<?php echo e(route('items.edit', $item->id)); ?>"
                                                   class="btn btn-light" data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="Edit"><i
                                                        class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Цена:</p>
                                                    <h5 class="mb-0"><?php echo e($item->cost); ?> рублей</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Описание:</h5>
                                    <p><?php echo e($item->description); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="assets/libs/swiper/swiper.min.js"></script>
    <script src="assets/js/pages/ecommerce-product-details.init.js"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/item.blade.php ENDPATH**/ ?>