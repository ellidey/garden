<?php $__env->startSection('title'); ?> Магазин <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Заказы <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Обзор заказа</span>
            </div>

            <div class="table-responsive table-card">
                <table class="table table-nowrap align-middle table-borderless mb-0">
                    <thead class="table-light text-muted">
                    <tr>
                        <th scope="col">Детали заказа</th>
                        <th scope="col">Цена</th>
                        <th scope="col" class="text-center">Количество</th>
                        <th scope="col" class="text-end">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $order->positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                        <img src="<?php echo e(URL::asset('images/' . $position->item->image)); ?>" alt="" class="img-fluid d-block">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fs-15 mt-2"><a href="<?php echo e(route('item', $position->item->id)); ?>" class="link-primary">
                                                <?php echo e($position->item->name); ?>

                                            </a></h5>
                                    </div>
                                </div>
                            </td>
                            <td class="fs-14"><?php echo e($position->item->cost); ?>р</td>
                            <td class="fs-14 text-center"><?php echo e($position->amount); ?></td>
                            <td class="fw-medium text-end">
                                <?php echo e($position->item->cost * $position->amount); ?>р
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-top border-top-dashed">
                        <td colspan="3"></td>
                        <td colspan="2" class="fw-medium p-0">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                <tr class="fs-15 fw-bold">
                                    <td>Всего:</td>
                                    <td class="text-end"><?php echo e($price); ?> рублей</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <form method="POST" action="<?php echo e(route('orders.update', $order->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php if($order->confirm): ?>
                    <button type="submit" class="btn btn-danger btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                        Отменить подтверждение
                    </button>
                <?php else: ?>
                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                        Подтвердить
                    </button>

                <?php endif; ?>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/orders/edit.blade.php ENDPATH**/ ?>