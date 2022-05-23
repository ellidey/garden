<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="17">
                        </span>
                    </a>

                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative d-none">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                            id="search-options" value="">
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <?php if(Auth::user()): ?>
                    <?php ($positions = Auth::user()->positions); ?>
                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-cart-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-shopping-bag fs-22'></i>
                            <span
                                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-info"><?php echo e(count($positions)); ?><span
                                    class="visually-hidden">Нечитаемое сообщение</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
                             aria-labelledby="page-header-cart-dropdown">
                            <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold">Моя карзина</h6>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge badge-soft-warning fs-13"><?php echo e(count($positions)); ?> предметом</span>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 300px;">
                                <?php ($summ = 0); ?>
                                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($summ+=$position->item->cost * $position->amount); ?>
                                <div class="p-1">
                                    <div class="d-block dropdown-item text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e(URL::asset('images/' . $position->item->image)); ?>"
                                                 class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="<?php echo e(route('item', $position->item->id)); ?>" class="text-reset">
                                                        <?php echo e($position->item->name); ?>

                                                    </a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Количество: <span><?php echo e($position->amount); ?> x <?php echo e($position->item->cost); ?>р</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal"><?php echo e($position->amount * $position->item->cost); ?>р</h5>
                                            </div>
                                            <div class="ps-2">
                                                <form method="POST" action="<?php echo e(route('basket.remove', $position->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-icon btn-sm btn-ghost-secondary"><i
                                                            class="ri-close-fill fs-16"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border d-grid">
                                <div class="d-flex justify-content-between align-items-center pb-3">
                                    <h5 class="m-0 text-muted">Всего:</h5>
                                    <div class="px-2">
                                        <h5 class="m-0"><?php echo e($summ); ?>р</h5>
                                    </div>
                                </div>

                                <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-success text-center">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" src="<?php if(Auth::user()->avatar != ''): ?><?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?><?php endif; ?>"
                                    alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e(Auth::user()->name); ?></span>
                                    <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo e(Auth::user()->role_name()); ?></span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Привет <?php echo e(Auth::user()->name); ?>!</h6>



                            <a class="dropdown-item " href="javascript:void();"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1"></i> <span
                                    key="t-logout"><?php echo app('translator')->get('translation.logout'); ?></span></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home/ellidey/web/garden/resources/views/layouts/topbar.blade.php ENDPATH**/ ?>