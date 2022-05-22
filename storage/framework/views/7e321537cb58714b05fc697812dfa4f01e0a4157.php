<?php $__env->startSection('title'); ?> Пользователи <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Пользователи <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <a type="button" href="<?php echo e(route('users.create')); ?>"
                        class="btn btn-success btn-label waves-effect waves-light">
                    <i class="ri-add-box-line label-icon align-middle fs-16 me-2"></i> Добавить
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Верефицирован</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Обновлен</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($user->id); ?></th>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->role_name()); ?></td>
                            <td>
                                <?php if($user->email_verified_at): ?>
                                    <span class="badge bg-success">Подтвержден</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Не подтвержден</span>
                                <?php endif; ?>
                            </td>

                            <td><?php echo e($user->created_at); ?></td>
                            <td><?php echo e($user->updated_at); ?></td>

                            <td>
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></a>
                                <form class="d-inline" method="POST" action="<?php echo e(route('users.destroy', $user->id)); ?>"  >
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/users/index.blade.php ENDPATH**/ ?>