<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Halaman Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card shadow-lg rounded-3">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-4">Halaman Login</h2>
                        
                        <form action="proses_login.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                                </div>

                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="register.php" class="btn btn-danger">Register</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>