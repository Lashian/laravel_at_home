
<head>
    <title>New work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<div id="selection2">
    <section id="contact-area" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center inner">
                    <div class="contact-content">
                        <h1>New work</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../middleware/RoutingMiddleware.php" method="post" class="contact-form">
                        <div class="col-sm-6 contact-form-left">
                            <label>full_name</label>
                            <input name="full_name" class="form-control" id="full_name">
                            <label>phone_number</label>
                            <input name="phone_number" class="form-control" id="phone_number">
                            <label>description</label>
                            <input name="description" class="form-control" id="description">
                            <label>email</label>
                            <input name="email" class="form-control" id="email">
                            <label>address</label>
                            <input name="address" class="form-control" id="address">
                            <label>County</label>
                            <select name="county" class="form-control" id="county">
                                <option value='Huelva'>Huelva</option>
                                <option value='Sevilla'>Sevilla</option>
                                <option value='Cadiz'>Cadiz</option>
                            </select><br>
                            <label>date due</label>
                            <input type="date" name="date_due_works" id="date_due_works" class="form-control">
                            <label>Town</label>
                            <input name="town" class="form-control" id="town">
                            <label>CP</label>
                            <input name="cp" type="number" class="form-control" id="cp">
                            <label>Status:</label><br>
                            <input type="radio" id="pending" name="status" value="pending">
                            <labe for="pending">Pending</labe>

                            <input type="radio" id="cancelled" name="status" value="cancelled">
                            <label for="cancelled">Cancelled</label>

                            <input type="radio" id="done" name="status" value="done">
                            <label for="done">Done</label>

                            <br><br>
                            <label>worker_name</label>
                            <input name='worker_name' class='form-control' id='worker_name'>

                            <label>admin_notes_works</label>
                            <input name="admin_notes_works" class="form-control" id="admin_notes_works">
                            <br>
                            <button type="submit" id="newWork" name="newWork" class="btn btn-primary">New work
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\PHP_plain_project_done\app\views/register_work.blade.php ENDPATH**/ ?>