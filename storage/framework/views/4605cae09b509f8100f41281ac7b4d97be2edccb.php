<?php $__env->startSection('title'); ?> Категории <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Позиции <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="<?php echo e(route('items.create')); ?>"
                   class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Создана</th>
                    <th scope="col">Обновлена</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($item->id); ?></th>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e(mb_strimwidth($item->description, 0, 50, "...")); ?></td>
                        <td><?php echo e($item->category->name); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td><?php echo e($item->updated_at); ?></td>

                        <td>
                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('items.destroy', $item->id)); ?>"  >
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/items/index.blade.php ENDPATH**/ ?>