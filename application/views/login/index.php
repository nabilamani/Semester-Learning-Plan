<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .form-login label {
            text-align: left;
            margin-left: 10px;
        }
        .form-login input {
            padding: 2px 10px;
            margin-bottom: 30px;
            border-radius: 15px;
        }
    </style>
</head>
  <body>
    <div class="container-fluid">
        <div class="row d-grid" style="height: 100vh; place-items: center; background-color: #3468C0">
            <div class="col-4 mx-auto">
                <div class="form-login pt-4 pb-5 px-5 text-center rounded-3 bg-white">
                    <form action="" method="post" class="d-grid">
                        <h2>Login</h2>
                        <p class="small fst-italic mb-4">Masukkan NIK Dosen dan Password</p>
                        <?= $this->session->flashdata('message') ?>
                        <label for="nik">NIK Dosen</label>
                        <input type="text" name="nik" id="nik" placeholder="">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" placeholder="">
                        <div>
                            <button type="submit" name="login" class="btn btn-primary rounded-3">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>