<?php $__env->startSection('title'); ?> Магазин <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Админ панель <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Позиции <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row d-flex justify-content-center">
        <div class="card col-lg-5">
            <div class="card-header mb-3">
                <span class="fs-15">Создание категории</span>
            </div>
            <form method="POST" action="<?php echo e(route('items.update', $item->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-pencil-line"></i>
                    </span>
                    <input name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="Название" value="<?php echo e($item->name); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="ri-pencil-line"></i>
                    </span>
                    <input name="cost" type="number" class="form-control <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="Цена" value="<?php echo e($item->cost); ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Описание</span>
                    <textarea name="description" class="form-control"
                              aria-label="With textarea" rows="5"><?php echo e($item->description); ?></textarea>
                </div>
                <div class="input-group mb-3 w-50">
                    <select name="category_id" class="form-select form-select-sm fs-14 mb-3 d-inline">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php if($item->category_id == $category->id): echo 'selected'; endif; ?>>
                                <?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="input-group mb-1 w-50">
                    <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="image" id="input-avatar">
                </div>
                <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                    <i class="ri-save-2-line label-icon align-middle fs-16 me-2"></i>
                    Сохранить
                </button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/admin/items/edit.blade.php ENDPATH**/ ?>