<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_user = mysqli_query($conn, "select * from user where id_user = '" . $_GET['id_user'] . "'");
    $dt_user = mysqli_fetch_array($qry_get_user);
    ?>
    <h3>Ubah User</h3>
    <form action="proses_ubah_user.php" method="post">
        <input type="hidden" name="id_user" value="<?= $dt_user['id_user'] ?>">
        Nama :
        <input type="text" name="nama_user" value="<?= $dt_user['nama_user'] ?>" class="form-control">
        Username :
        <input type="text" name="username" value="<?= $dt_user['username'] ?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        Role :
        <?php
        $arr_role = array('Owner' => 'Owner', 'Admin' => 'Admin', 'Kasir' => 'Kasir');
        ?>
        <select name="role" class="form-control">
            <option></option>
            <?php foreach ($arr_role as $key_role => $val_role) :
                if ($key_role == $dt_role['role']) {
                    $selek = "selected";
                } else {
                    $selek = "";
                }
            ?>
                <option value="<?= $key_role ?>" <?= $selek ?>><?= $val_role ?></option>
            <?php endforeach ?>
        </select><br>
        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>