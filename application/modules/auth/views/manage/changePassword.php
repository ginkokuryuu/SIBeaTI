<div class="jumbotron" style="background-color:#092147;">
    <div class="container">
        <h1 style="color:#fff;">SIBeATI</h1>
        <h2><small style="color:#ddd;">Sistem Informasi Beasiswa Alumni Teknik Informatika ITS</small></h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-5 mx-auto mt-5">
            <h1 class="h2">Change Password</h1>
            <form action="<?= site_url('auth/manage/changePassAction') ?>" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password lama" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password baru" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="changePassword" class="btn btn-primary w-100" value="Change Password" />
                    <p><a href="<?php echo site_url('dashboard') ?>">Kembali ke dashboard</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

    var old_password = document.getElementById("old_password");

    function validatePassword(){        
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Password tidak sesuai");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    function validateUsername(){        
        old_password.setCustomValidity('');
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword; // password yg dimasukkan harus ssesuai
    old_password.onchange = validateUsername;       // old_password untuk mahasiswa berupa nrp dgn panjang 14
</script>