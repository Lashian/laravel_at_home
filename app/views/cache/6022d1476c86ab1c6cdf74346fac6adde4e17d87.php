

<head>
    <title>Delete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/css/style.css">
</head>
<body>
<div id="selection2">

    <section id="contact-area" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center inner">
                    <div class="contact-content">
                        <h1>Delete</h1>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../middleware/RoutingMiddleware.php" method="post" class="contact-form">
                        <div class="col-sm-6 contact-form-left">
                            <div class="form-group">
                                <input type="hidden" name="work_id" id="work_id" value="<?php echo $_GET['work_id']?>">
                                <label>Nombre</label>
                                <input name="full_name" class="form-control" id="full_name" value='<?php echo e($deleteViewData['full_name_works']); ?>' disabled>
                                <label>Telefono</label>
                                <input name="phone_number" class="form-control" id="phone_number" value='<?php echo e($deleteViewData['phonenumber_works']); ?>' disabled>
                                <label>Descipcion</label>
                                <input name="description" class="form-control" id="description" value='<?php echo e($deleteViewData['description_works']); ?>' disabled>
                                <label>Email</label>
                                <input name="email" class="form-control" id="email" value='<?php echo e($deleteViewData['email_works']); ?>' disabled>
                                <label>Direccion</label>
                                <input name="address" class="form-control" id="address" value='<?php echo e($deleteViewData['address_works']); ?>' disabled>
                                <?php
                                    if($deleteViewData['county_works'] == "Huelva"){
                                        $selectedHuelva = "selected";
                                    }elseif($deleteViewData['county_works'] == "Sevilla"){
                                        $selectedSevilla = "selected";
                                    }else{
                                        $selectedCadiz = "selected";
                                    }
                                ?>
                                <label>Provincia</label>
                                <select name="county" class="form-control" id="county" disabled>
                                    <option value='Huelva' <?php echo e($selectedHuelva); ?>>Huelva</option>
                                    <option value='Sevilla' <?php echo e($selectedSevilla); ?>>Sevilla</option>
                                    <option value='Cadiz' <?php echo e($selectedCadiz); ?>>Cadiz</option>
                                </select><br>
                                <label>Ciudad</label>
                                <input name="town" class="form-control" id="town" value='<?php echo e($deleteViewData['town_works']); ?>' disabled>
                                <label>CP</label>
                                <input name="cp" type="number" class="form-control" id="cp" value='<?php echo e($deleteViewData['cp_works']); ?>' disabled>
                                <?php
                                    if($deleteViewData['status_works'] == "pending"){
                                            $checkPending = "checked";
                                        }elseif($deleteViewData['status_works'] == "cancelled"){
                                            $checkCancelled = "checked";
                                        }else{
                                            $checkDone = "checked";
                                            }
                                ?>
                                <label>Status:</label><br>
                                <input type="radio" id="pending" name="status" value="pending" <?php echo e($checkPending); ?> disabled>
                                <labe for="pending">Pending</labe>
                                <input type="radio" id="cancelled" name="status" value="cancelled" <?php echo e($checkCancelled); ?> disabled>
                                <label for="cancelled">Cancelled</label>
                                <input type="radio" id="done" name="status" value="done" <?php echo e($checkDone); ?> disabled>
                                <label for="done">Done</label>
                                <br><br>
                                <label>Notas administrativo</label>
                                <input name="admin_notes_works" class="form-control" id="admin_notes_works" value='<?php echo e($deleteViewData['admin_notes_works']); ?>' disabled>
                                <label>worker_name</label>
                                <input name='worker_name' class='form-control' id='worker_name' value='<?php echo e($deleteViewData['worker_name_works']); ?>' disabled>
                                    <label>Notas encargado</label>
                                    <input name="worker_notes_works" class="form-control" id="worker_notes_works" value='<?php echo e($deleteViewData['worker_notes_works']); ?>' disabled>
                                <button type="submit" id="deleteWork" name="deleteWork" class="btn btn-default">Delete Work</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\PHP_plain_project_done\app\views/delete.blade.php ENDPATH**/ ?>