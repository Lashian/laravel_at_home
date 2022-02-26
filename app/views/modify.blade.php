@extends ('layout')

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
                            @php
                                if($_SESSION['user_role'] !== "admin"){
                                    $flagDisabled = "disabled";
                                }
                            @endphp
                                <label>full_name</label>
                                <input name="full_name" class="form-control" id="full_name" value='{{$singleRowOfWorkData['full_name_works']}}' {{$flagDisabled}}>
                                <label>phone_number</label>
                                <input name="phone_number" class="form-control" id="phone_number" value='{{$singleRowOfWorkData['phonenumber_works']}}' {{$flagDisabled}}>
                                <label>description</label>
                                <input name="description" class="form-control" id="description" value='{{$singleRowOfWorkData['description_works']}}' {{$flagDisabled}}>
                                <label>email</label>
                                <input name="email" class="form-control" id="email" value='{{$singleRowOfWorkData['email_works']}}' {{$flagDisabled}}>
                                <label>address</label>
                                <input name="address" class="form-control" id="address" value='{{$singleRowOfWorkData['address_works']}}' {{$flagDisabled}}>
                                @php
                                if($singleRowOfWorkData['county_works'] == "Huelva"){
                                $selectedHuelva = "selected";
                                }elseif($singleRowOfWorkData['county_works'] == "Sevilla"){
                                $selectedSevilla = "selected";
                                }else{
                                $selectedCadiz = "selected";
                                }
                                @endphp
                                <label>County</label>
                                <select name="county" class="form-control" id="county"  {{$flagDisabled}}>
                                 <option value='Huelva' {{$selectedHuelva}}>Huelva</option>
                                <option value='Sevilla' {{$selectedSevilla}}>Sevilla</option>
                                <option value='Cadiz' {{$selectedCadiz}}>Cadiz</option>
                                </select><br>
                                <label>Town</label>
                                <input name="town" class="form-control" id="town" value='{{$singleRowOfWorkData['town_works']}}' {{$flagDisabled}}>
                                <label>CP</label>
                                <input name="cp" type="number" class="form-control" id="cp" value='{{$singleRowOfWorkData['cp_works']}}' {{$flagDisabled}}>
                                @php
                                if($singleRowOfWorkData['status_works'] == "pending"){
                                $checkedPending = "checked";
                                }elseif($singleRowOfWorkData['status_works'] == "cancelled"){
                                $checkedCancelled = "checked";
                                }else{
                                $checkDone = "checked";
                                }
                                @endphp
                                <label>Status:</label><br>
                                <input type="radio" id="pending" name="status" value="pending" {{$checkedPending}}>
                                <labe for="pending">Pending</labe>

                                <input type="radio" id="cancelled" name="status" value="cancelled" {{$checkedCancelled}}>
                                <label for="cancelled">Cancelled</label>

                                <input type="radio" id="done" name="status" value="done" {{$checkDone}}>
                                <label for="done">Done</label>

                                <br><br>
                                <label>worker_name</label>
                                <input name='worker_name' class='form-control' id='worker_name' value='{{$singleRowOfWorkData['worker_name_works']}}' {{$flagDisabled}}>

                               @if($_SESSION['user_role'] == "admin")
                                <label>{{"admin_notes_works"}}</label>
                                <input name="admin_notes_works" class="form-control" id="admin_notes_works" value='{{$singleRowOfWorkData['admin_notes_works']}}' {{$flagDisabled}}>
                                @else
                                <label>worker_notes_works</label>
                                    @php
                                    if($_SESSION['user_role'] == "admin"){
                                            $flagDisabled = "disabled";
                                        }elseif($_SESSION['user_role'] == "worker"){
                                            $flagDisabled = "";
                                        }
                                    @endphp
                                <input name="worker_notes_works" class="form-control" id="worker_notes_works" value='{{$singleRowOfWorkData['worker_notes_works']}}' {{$flagDisabled}}>
                                @endif
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