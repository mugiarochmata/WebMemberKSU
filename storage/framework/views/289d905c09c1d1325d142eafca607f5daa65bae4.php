
<?php $__env->startSection('content'); ?>
<div class="content" style="min-height:205px;">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Login</h3>
                            </div>
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('token')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if(session('message')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper mr-2"></i>
                                <?php echo e(session('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <?php endif; ?>
                                <div class="form-group form-focus">
                                    <input name="username" id="username" class="form-control floating">
                                    <label class="focus-label">Username</label>
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" name="password" class="form-control floating">
                                    <label class="focus-label">Password</label>
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="forgot-password">Forgot Password ?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                
                                <div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\koperasidoccure\resources\views/auth/login.blade.php ENDPATH**/ ?>