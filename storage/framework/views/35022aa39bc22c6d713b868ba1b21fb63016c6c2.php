<?php $__env->startSection('title'); ?> Категории <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Категории <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="<?php echo e(route('categories.create')); ?>"
                   class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">название</th>
                    <th scope="col">Создана</th>
                    <th scope="col">Обновлена</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($category->id); ?></th>
                        <td><?php echo e($category->name); ?></td>
                        <td><?php echo e($category->created_at); ?></td>
                        <td><?php echo e($category->updated_at); ?></td>

                        <td>
                            <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('categories.destroy', $category->id)); ?>"  >
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>