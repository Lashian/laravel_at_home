@extends ('layout')

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
                                <label>full_name</label>
                                <input name="full_name" class="form-control" id="full_name" value='{{$deleteViewData['full_name_works']}}' disabled>
                                <label>phone_number</label>
                                <input name="phone_number" class="form-control" id="phone_number" value='{{$deleteViewData['phonenumber_works']}}' disabled>
                                <label>description</label>
                                <input name="description" class="form-control" id="description" value='{{$deleteViewData['description_works']}}' disabled>
                                <label>email</label>
                                <input name="email" class="form-control" id="email" value='{{$deleteViewData['email_works']}}' disabled>
                                <label>address</label>
                                <input name="address" class="form-control" id="address" value='{{$deleteViewData['address_works']}}' disabled>
                                @php
                                    if($deleteViewData['county_works'] == "Huelva"){
                                        $selectedHuelva = "selected";
                                    }elseif($deleteViewData['county_works'] == "Sevilla"){
                                        $selectedSevilla = "selected";
                                    }else{
                                        $selectedCadiz = "selected";
                                    }
                                @endphp
                                <label>County</label>
                                <select name="county" class="form-control" id="county" disabled>
                                    <option value='Huelva' {{$selectedHuelva}}>Huelva</option>
                                    <option value='Sevilla' {{$selectedSevilla}}>Sevilla</option>
                                    <option value='Cadiz' {{$selectedCadiz}}>Cadiz</option>
                                </select><br>
                                <label>Town</label>
                                <input name="town" class="form-control" id="town" value='{{$deleteViewData['town_works']}}' disabled>
                                <label>CP</label>
                                <input name="cp" type="number" class="form-control" id="cp" value='{{$deleteViewData['cp_works']}}' disabled>
                                @php
                                    if($deleteViewData['status_works'] == "pending"){
                                            $checkPending = "checked";
                                        }elseif($deleteViewData['status_works'] == "cancelled"){
                                            $checkCancelled = "checked";
                                        }else{
                                            $checkDone = "checked";
                                            }
                                @endphp
                                <label>Status:</label><br>
                                <input type="radio" id="pending" name="status" value="pending" {{$checkPending}} disabled>
                                <labe for="pending">Pending</labe>
                                <input type="radio" id="cancelled" name="status" value="cancelled" {{$checkCancelled}} disabled>
                                <label for="cancelled">Cancelled</label>
                                <input type="radio" id="done" name="status" value="done" {{$checkDone}} disabled>
                                <label for="done">Done</label>
                                <br><br>
                                <label>admin_notes_works</label>
                                <input name="admin_notes_works" class="form-control" id="admin_notes_works" value='{{$deleteViewData['admin_notes_works']}}' disabled>
                                <label>worker_name</label>
                                <input name='worker_name' class='form-control' id='worker_name' value='{{$deleteViewData['worker_name_works']}}' disabled>
                                    <label>worker_notes_works</label>
                                    <input name="worker_notes_works" class="form-control" id="worker_notes_works" value='{{$deleteViewData['worker_notes_works']}}' disabled>
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