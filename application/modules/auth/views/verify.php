<div style='width: 100%; margin-left: 5%; margin-right: 5%;'>
    <table class="table table-light" style='width: 30%;'>
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0;
            foreach($allUnverified as $akun): ?>
            <tr>
                <th scope="row"><?php echo $count + 1; ?></th>
                <form action='<?= site_url("auth/verify/verif/") ?>' method="POST" id='verif-form'>
                    <input type="hidden" name="user_id" id="user_id" placeholder="user_id" value='<?php echo $akun->user_id; ?>' readonly></input>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Username" value='<?php echo $akun->username; ?>' readonly></input>
                    </td>
                    <td>
                        <input type="text" name="role" id="role" placeholder="Role" value='<?php echo $akun->role; ?>' readonly></input>
                    </td>
                    <td>
                        <input type="submit" name="submit" id="submit" class='btn btn-primary' value="Verify"></input>
                    </td>
                </form>
            </tr>
            <?php $count++;
            endforeach;?>
        </tbody>
    </table>
</div>