@extends ('layout')

@section('content')
<body>
<div id="selection2">
    <section id="contact-area" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center inner">
                    <div class="contact-content">
                        <h1>Log in</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="./config.php" method="post" class="contact-form">
                        <div class="col-sm-6 contact-form-left">
                            <div class="form-group">
                                <input name="user_login" class="form-control" id="user_login"
                                       placeholder="Nombre usuario (A-Z, a-z and 0-9)">
                                <input name="user_password" type="password" class="form-control" id="user_password"
                                       placeholder="Contraseña (Min 8 characters)">
                                <button type="submit" name="login" id="login" class="btn btn-primary">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
@endsection