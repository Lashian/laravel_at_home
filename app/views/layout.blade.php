<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>No me caigo</title>
</head>
<?php
include_once('./config.php');
include_once('../../vendor/autoload.php');
use Jenssegers\Blade\Blade;

?>
@if ($user_role == "admin")
    @php
    echo '<a href="http://localhost/PHP_plain_project_done/app/middleware/RoutingMiddleware.php?request=newWork&user_id='.$_SESSION['user_id'].'" class="btn btn-primary">New Work</a>';
    @endphp
@endif
@yield('content')
