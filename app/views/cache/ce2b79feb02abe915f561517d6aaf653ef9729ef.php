

<head>
    <title>Modificar</title>
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
                        <h1>Modificar</h1>
                        </div>

                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">

                    <form action="../middleware/RoutingMiddleware.php" method="post" class="contact-form">
                        <div class="col-sm-6 contact-form-left">
                            <div class="form-group">
                            <?php
                                if($_SESSION['user_role'] !== "admin"){
                                    $flagDisabled = "disabled";
                                }
                            ?>
                                <input type="hidden" name="work_id" id="work_id" value="<?php echo $_GET['work_id']?>">
                                <label>full_name</label>
                                <input name="full_name" class="form-control" id="full_name" value='<?php echo e($singleRowOfWorkData['full_name_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <label>phone_number</label>
                                <input name="phone_number" class="form-control" id="phone_number" value='<?php echo e($singleRowOfWorkData['phonenumber_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <label>description</label>
                                <input name="description" class="form-control" id="description" value='<?php echo e($singleRowOfWorkData['description_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <label>email</label>
                                <input name="email" class="form-control" id="email" value='<?php echo e($singleRowOfWorkData['email_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <label>address</label>
                                <input name="address" class="form-control" id="address" value='<?php echo e($singleRowOfWorkData['address_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <?php
                                if($singleRowOfWorkData['county_works'] == "Huelva"){
                                $selectedHuelva = "selected";
                                }elseif($singleRowOfWorkData['county_works'] == "Sevilla"){
                                $selectedSevilla = "selected";
                                }else{
                                $selectedCadiz = "selected";
                                }
                                ?>
                                <label>County</label>
                                <select name="county" class="form-control" id="county"  <?php echo e($flagDisabled); ?>>
                                 <option value='Huelva' <?php echo e($selectedHuelva); ?>>Huelva</option>
                                <option value='Sevilla' <?php echo e($selectedSevilla); ?>>Sevilla</option>
                                <option value='Cadiz' <?php echo e($selectedCadiz); ?>>Cadiz</option>
                                </select><br>
                                <label>Town</label>
                                <input name="town" class="form-control" id="town" value='<?php echo e($singleRowOfWorkData['town_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <label>date due</label>
                                <input type="date" name="date_due_works" id="date_due_works" value="<?php echo e($singleRowOfWorkData['date_due_works']); ?>" <?php echo e($flagDisabled); ?> class="form-control">
                                <label>CP</label>
                                <input name="cp" type="number" class="form-control" id="cp" value='<?php echo e($singleRowOfWorkData['cp_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <?php
                                if($singleRowOfWorkData['status_works'] == "pending"){
                                $checkedPending = "checked";
                                }elseif($singleRowOfWorkData['status_works'] == "cancelled"){
                                $checkedCancelled = "checked";
                                }else{
                                $checkDone = "checked";
                                }
                                ?>
                                <label>Status:</label><br>
                                <input type="radio" id="pending" name="status" value="pending" <?php echo e($checkedPending); ?>>
                                <labe for="pending">Pending</labe>

                                <input type="radio" id="cancelled" name="status" value="cancelled" <?php echo e($checkedCancelled); ?>>
                                <label for="cancelled">Cancelled</label>

                                <input type="radio" id="done" name="status" value="done" <?php echo e($checkDone); ?>>
                                <label for="done">Done</label>

                                <br><br>
                                <label>worker_name</label>
                                <input name='worker_name' class='form-control' id='worker_name' value='<?php echo e($singleRowOfWorkData['worker_name_works']); ?>' <?php echo e($flagDisabled); ?>>

                               <?php if($_SESSION['user_role'] == "admin"): ?>
                                <label><?php echo e("admin_notes_works"); ?></label>
                                <input name="admin_notes_works" class="form-control" id="admin_notes_works" value='<?php echo e($singleRowOfWorkData['admin_notes_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <?php else: ?>
                                <label>worker_notes_works</label>
                                    <?php
                                    if($_SESSION['user_role'] == "admin"){
                                            $flagDisabled = "disabled";
                                        }elseif($_SESSION['user_role'] == "worker"){
                                            $flagDisabled = "";
                                        }
                                    ?>
                                <input name="worker_notes_works" class="form-control" id="worker_notes_works" value='<?php echo e($singleRowOfWorkData['worker_notes_works']); ?>' <?php echo e($flagDisabled); ?>>
                                <?php endif; ?>
                                <button type="submit" id="modifyWork" name="modifyWork" class="btn btn-default">Modify Work</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\PHP_plain_project_done\app\views/modify.blade.php ENDPATH**/ ?>