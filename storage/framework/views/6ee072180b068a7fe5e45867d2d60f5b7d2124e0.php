<!--
************************************************************************************************
                        Book for Fix
                        Development Date : 14-03-2024
                        Development Date   : 16-03-2024
************************************************************************************************
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $__env->yieldContent('title' , 'Login'); ?> </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('assets/image/logo.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('assets/image/logo.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('assets/image/logo.png')); ?>">
    <link rel="manifest" href="<?php echo e(url('backend/images/favicon/site.webmanifest')); ?>">
    <link href="<?php echo e(url('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo e(url('backend/css/admin.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(url('backend/vendor/sweetalert/sweetalert.min.js')); ?>"></script>
    <link href="<?php echo e(url('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            height: 100%;
            min-height: 100vh;
        }

        a:hover {
            text-decoration: none;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }

        .card-body {
            border-top: 4px solid #f97316;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .form-control, .form-control-user {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.6rem 1rem;
            transition: all 0.2s;
        }

        .form-control:focus, .form-control-user:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
        }

        .btn-user {
            border-radius: 8px;
            transition: all 0.2s;
            padding: 0.6rem 1rem;
        }

        .btn-info {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%) !important;
            border: none !important;
            color: white !important;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.4);
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px -1px rgba(249, 115, 22, 0.6);
            color: white !important;
        }

        h1.h5 {
            color: #1f2937 !important;
        }

        label {
            color: #334155;
            font-weight: 500;
        }

        .text-info {
            color: #f97316 !important;
        }

        a.text-info:hover {
            color: #dc2626 !important;
        }

        .alert-danger {
            background-color: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
            border-radius: 8px;
        }
    </style>
</head>

<body class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo e(url('assets/image/logo.png')); ?>" height="70px"
                                            alt="<?php echo e(config('app.name')); ?>"><br><br>
                                        <h1 class="h5 text-gray-900 mb-4">Login Area</h1>
                                    </div>
                                    <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <p><?php echo e(session()->get('error')); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="post" action="<?php echo e(url('/admin/login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="text" class="form-control form-control-user" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                name="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password" required="">
                                        </div>
                                        <input type="submit" name="submit"
                                            class="btn btn-info btn-user btn-block mt-4" value="Login">
                                    </form>
                                    <center style="margin-top:20px;">
                                        <a class="mb-4 text-info" href="<?php echo e(url('/')); ?>">Back to Home</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(url('backend/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(url('backend/js/admin.min.js')); ?>"></script>
    <script src="<?php echo e(url('backend/vendor/jquery/jquery.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\login.blade.php ENDPATH**/ ?>