<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        body {

            background-color: rgb(238, 241, 242); /* Background putih */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .card {

            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Shadow untuk card */

        }


        .btn-primary {

            background-color: #0984e3;
            border: none;

        }


        .btn-primary:hover {

            background-color: #74b9ff;

        }


        .card-title {

            font-weight: bold;
            text-transform: uppercase;
            color: #2d3436;
            text-align: center;

        }


        /* Menambahkan style untuk link di bawah */

        .text-primary:hover {
            text-decoration: underline;
        }

    </style>

</head>


<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="card-title">Login Admin</h3>
                        <form action="/admin/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email admin" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">
                            <small>login user <a href="/user/login" class="text-primary">klik</a></small>
                        </p>
                    </div>
                </div>
            </div>
        <div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>


</html>


