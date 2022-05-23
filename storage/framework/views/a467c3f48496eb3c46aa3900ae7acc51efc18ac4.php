<?php $__env->startSection('title'); ?> Магазин <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Пользователи <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Редактирование пользователя</span>
            </div>
            <form method="POST" action="<?php echo e(route('users.update', $user->id)); ?>" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="input-group mb-3">
                    <span class="input-group-text">@</span>
                    <input name="email" type="text" class="form-control" placeholder="email адрес" value="<?php echo e($user->email); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-user-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control" placeholder="Имя пользователя" value="<?php echo e($user->name); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-key-line"></i>
                    </span>
                    <input name="password" type="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="input-group mb-1 w-50">
                    <select name="role_id" class="form-select form-select-sm fs-14 mb-3 d-inline">
                        <option value="0" <?php if($user->role_id == 0): echo 'selected'; endif; ?>>Пользователь</option>
                        <option value="1" <?php if($user->role_id == 1): echo 'selected'; endif; ?>>Администратор</option>
                        <option value="2" <?php if($user->role_id == 2): echo 'selected'; endif; ?>>Оператор</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1"><i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i> Сохранить</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>