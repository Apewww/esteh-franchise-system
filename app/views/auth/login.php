<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .login-card {
            max-width: 900px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .login-left {
            background: #ffffff;
            padding: 60px 50px;
        }

        .login-right {
            background: #b6ffad;
        }

        .avatar {
            width: 90px;
            height: 90px;
            background: #ffffff;
            border-radius: 50%;
            margin: 0 auto 40px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar i {
            font-size: 48px;
            color: #9e9e9e;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .form-control:focus {
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

        .btn-login {
            border-radius: 30px;
            padding: 10px 30px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.2);
        }

    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card login-card w-100">
    <div class="row g-0">

        <div class="col-12 col-md-6 login-left text-center">
            <div class="avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username">
                </div>

                <div class="mb-4">
                    <input type="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-light btn-login">
                    Login
                </button>
            </form>
        </div>

        <div class="col-12 col-md-6 login-right"></div>

    </div>
</div>

</body>
</html>
