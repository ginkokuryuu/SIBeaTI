<div class="jumbotron" style="background-color:#092147;">
    <div class="container">
        <h1 style="color:#fff;">SIBeATI</h1>
        <h2><small style="color:#ddd;">Sistem Informasi Beasiswa Alumni Teknik Informatika ITS</small></h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-5 mx-auto mt-5">
            <h1 class="h2">Register Admin</h1>
            <form action="<?= site_url('auth/register/regis') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required />
                </div>
                <div class="form-group">
                    <label for="sel1">Select role:</label>
                    <select class="form-control" name="role" id="sel1">
                    <!-- ntar bikin tabel role ae dan ntar di loop lewat data tabel itu -->
                        <option>voter</option>
                        <option>selektor</option>
                        <option>bendahara</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-primary w-100" value="Sign Up" />
                    <p>Silakan <a href="<?php echo site_url('auth') ?>">login</a> jika sudah punya akun.</p>
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
        username.setCustomValidity('');
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword; // password yg dimasukkan harus ssesuai
    username.onchange = validateUsername;       
</script>