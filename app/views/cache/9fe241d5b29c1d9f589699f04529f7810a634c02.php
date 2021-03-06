

<?php
    if(isset($_POST['edit'])){
        echo "edit";
    }
    if(isset($_POST['delete'])){
        echo "delete";
    }
?>

<?php $__env->startSection('content'); ?>

    <table class="table table-dark table-striped table-bordered">
        <thead class="thead-dark">
        <tr style="font-weight: bold;">
            <?php if(isset($user_role)): ?>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Email</th>
                <th scope="col">Direccion</th>
                <th scope="col">Provincia</th>
                <th scope="col">Ciudad</th>
                <th scope="col">CP</th>
                <th scope="col">Status</th>
                <th scope="col">Fecha creacion</th>
                <th scope="col">Nombre encargado</th>
                <th scope="col">Notas administrativo</th>
                <th scope="col">Notas encargado</th>
                <th scope="col">Fecha entrega</th>
                <th scope="col">Editar</th>
                <?php if($user_role == "admin"): ?>
                    <th scope="col">Borrar</th>
                <?php endif; ?>
        </tr>
        </thead>
        <?php endif; ?>
        <tbody>
        <?php $__currentLoopData = $userWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($row['full_name_works']); ?></td>
                <td><?php echo e($row['phonenumber_works']); ?></td>
                <td><?php echo e($row['description_works']); ?></td>
                <td><?php echo e($row['email_works']); ?></td>
                <td><?php echo e($row['address_works']); ?></td>
                <td><?php echo e($row['county_works']); ?></td>
                <td><?php echo e($row['town_works']); ?></td>
                <td><?php echo e($row['cp_works']); ?></td>
                <td><?php echo e($row['status_works']); ?></td>
                <td><?php echo e($row['date_of_creation_works']); ?></td>
                <td><?php echo e($row['worker_name_works']); ?></td>
                <td><?php echo e($row['admin_notes_works']); ?></td>
                <td><?php echo e($row['worker_notes_works']); ?></td>
                <td><?php echo e($row['date_due_works']); ?></td>
                <?php if ($_REQUEST['request']) {
                    echo '<td> <a href="RoutingMiddleware.php?work_id=' . $row['works_id'] . '&request=edit' . '" class="btn btn-primary">Editar</a></td>';
                } else {
                    echo '<td> <a href="app\middleware\RoutingMiddleware.php?work_id=' . $row['works_id'] . '&request=edit' . '" class="btn btn-primary">Editar</a></td>';
                }
                ?>
                <?php if ($user_role == 'admin')
                    if ($_REQUEST['request']) {
                        echo '<td> <a href="RoutingMiddleware.php?work_id=' . $row['works_id'] . '&request=delete' . '" class="btn btn-danger">Delete</a></td>';
                    } else {
                        echo '<td> <a href="app\middleware\RoutingMiddleware.php?work_id=' . $row['works_id'] . '&request=delete' . '" class="btn btn-danger">Delete</a></td>';
                    }
                ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\PHP_plain_project_done\app\views/works.blade.php ENDPATH**/ ?>