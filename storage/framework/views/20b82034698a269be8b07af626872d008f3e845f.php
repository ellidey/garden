<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.order-details'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Магазин <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Создание заказа <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0 fw-bold">Заказ</h5>
                </div>
            </div>
            <div class="card-body">
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
                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        </div><!--end card-->
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0 fw-bold">Оформление</h5>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('orders.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-4">
                        <div class="input-group"  style="width: 33%">
                        <span class="input-group-text">
                            <i class="ri-user-line"></i>
                        </span>
                            <input name="surname" type="text" class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Фамилия" value="<?php echo e(old('surname')); ?>" required>
                        </div>
                        <div class="input-group"  style="width: 33%">
                        <span class="input-group-text">
                            <i class="ri-user-2-line"></i>
                        </span>
                            <input name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Имя" value="<?php echo e(old('name')); ?>" required>
                        </div>
                        <div class="input-group" style="width: 34%">
                        <span class="input-group-text">
                            <i class="ri-user-5-line"></i>
                        </span>
                            <input name="lastname" type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Отчество" value="<?php echo e(old('lastname')); ?>">
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="ri-home-5-line"></i>
                        </span>
                        <input name="address" type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="Адрес" value="<?php echo e(old('address')); ?>" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="ri-inbox-line"></i>
                        </span>
                        <input name="index" type="text" class="form-control <?php $__errorArgs = ['index'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="Индекс" value="<?php echo e(old('index')); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-label waves-effect waves-light mb-4 mt-1">
                        <i class="ri-send-plane-line label-icon align-middle fs-16 me-2"></i>
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    <div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ellidey/web/garden/resources/views/order/create.blade.php ENDPATH**/ ?>