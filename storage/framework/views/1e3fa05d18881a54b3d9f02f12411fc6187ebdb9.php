<?php $__env->startSection('title'); ?> Заказы <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Заказы <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Индекс</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Изменен</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($order->id); ?></th>
                        <td><?php echo e($order->name); ?></td>
                        <td><?php echo e($order->surname); ?></td>
                        <td><?php echo e($order->lastname); ?></td>
                        <td><?php echo e($order->address); ?></td>
                        <td><?php echo e($order->index); ?></td>
                        <td>
                            <?php if($order->confirm): ?>
                                <span class="badge bg-success">Подтвержден</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Не подтвержден</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($order->created_at); ?></td>
                        <td><?php echo e($order->updated_at); ?></td>

                        <td>
                            <a href="<?php echo e(route('orders.edit', $order->id)); ?>"
                               class="btn btn-primary btn-icon waves-effect waves-light"
                            >
                                <i class="ri-edit-2-line"></i>
                            </a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('orders.destroy', $order->id)); ?>">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>