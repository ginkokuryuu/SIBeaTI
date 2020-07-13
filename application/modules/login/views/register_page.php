<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="jumbotron" style="background-color:#092147;">
        <div class="container">
            <h1 style="color:#fff;">SIBeATI</h1>
            <h2><small style="color:#ddd;">Sistem Informasi Beasiswa Alumni Teknik Informatika ITS</small></h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-5">
                <h1 class="h2">Register</h1>
                <form action="<?= site_url('/login/register') ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="NRP" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary w-100" value="Sign Up" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        var username = document.getElementById("username");

        function validatePassword(){        
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Password tidak sesuai");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        function validateUsername(){        
            var nrp = username.value;
            if(isNaN(nrp) || nrp.length != 14){
                username.setCustomValidity("Isi dengan NRP yang valid");
            } else {
                username.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword; // password yg dimasukkan harus ssesuai
        username.onchange = validateUsername;       // username untuk mahasiswa berupa nrp dgn panjang 14
    </script>
</body>

</html>
