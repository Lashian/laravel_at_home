@extends('layout')

@php
    if(isset($_POST['edit'])){
        echo "edit";
    }
    if(isset($_POST['delete'])){
        echo "delete";
    }
@endphp

@section('content')

    <table class="table table-dark table-striped table-bordered">
        <thead class="thead-dark">
        <tr style="font-weight: bold;">
            @if(isset($user_role))
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
                @if($user_role == "admin")
                    <th scope="col">Borrar</th>
                @endif
        </tr>
        </thead>
        @endif
        <tbody>
        @foreach ($userWorks as $row)
            <tr>
                <td>{{$row['full_name_works']}}</td>
                <td>{{$row['phonenumber_works']}}</td>
                <td>{{$row['description_works']}}</td>
                <td>{{$row['email_works']}}</td>
                <td>{{$row['address_works']}}</td>
                <td>{{$row['county_works']}}</td>
                <td>{{$row['town_works']}}</td>
                <td>{{$row['cp_works']}}</td>
                <td>{{$row['status_works']}}</td>
                <td>{{$row['date_of_creation_works']}}</td>
                <td>{{$row['worker_name_works']}}</td>
                <td>{{$row['admin_notes_works']}}</td>
                <td>{{$row['worker_notes_works']}}</td>
                <td>{{$row['date_due_works']}}</td>
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
        @endforeach
        </tbody>
    </table>
@endsection