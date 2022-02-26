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
            <th scope="col">full_name_works</th>
            <th scope="col">phonenumber_works</th>
            <th scope="col">description_works</th>
            <th scope="col">email_works</th>
            <th scope="col">address_works</th>
            <th scope="col">county</th>
            <th scope="col">town_works</th>
            <th scope="col">cp_works</th>
            <th scope="col">status_works</th>
            <th scope="col">date_of_creation_works</th>
            <th scope="col">worker_name_works</th>
            <th scope="col">admin_notes_works</th>
            <th scope="col">worker_notes_works</th>
            <th scope="col">date_due_works</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
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
                <?php if($_REQUEST['request']){
                    echo '<td> <a href="RoutingMiddleware.php?work_id=' . $row['works_id'] .'&request=edit'. '" class="btn btn-primary">Editar</a></td>';
                }else{
                    echo '<td> <a href="app\middleware\RoutingMiddleware.php?work_id=' . $row['works_id'] .'&request=edit'. '" class="btn btn-primary">Editar</a></td>';
                }
                ?>
                  <?php if($user_role == 'admin')
                    if($_REQUEST['request']){
                        echo '<td> <a href="RoutingMiddleware.php?work_id=' . $row['works_id'] .'&request=delete'. '" class="btn btn-danger">Delete</a></td>';
                    }else{
                        echo '<td> <a href="app\middleware\RoutingMiddleware.php?work_id=' . $row['works_id'] .'&request=delete'. '" class="btn btn-danger">Delete</a></td>';
                    }
                    ?>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection