<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 col-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                LOGIN
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">
                        Username
                    </label>
                    <input type="text" name="username"
                    class="form-control" id="inputUsername"
                    placeholder="Masukkan Username">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">
                        Password
                    </label>
                    <input type="text" name="password"
                    class="form-control" id="inputPassword"
                    placeholder="Masukkan Password...">
            </div>
            <div class="mb-3">
                <input type="submit" name="login" class="btn
                btn-primary" value="LOGIN"/>
            </div>
        </div>
    </div>
</body>
</html>