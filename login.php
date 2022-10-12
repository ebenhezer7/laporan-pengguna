<div class="container">
    <h1 class="text-center">Login</h1>
    <form action="login.php" method="POST" class="w-50 mx-auto">
        <label for="">Username</label>
        <input class="form-control" type="text" name="username" placeholder="ex. asep">
        <br>
        <label for="">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Ex. 123455">
        <br>
        <input class="btn btn-primary" type="submit" name="login" value="Login">
    </form>
</div>
<?php
    include("./input-config.php");
    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM akun WHERE username = '$username' AND password=MD5 ('$password');";
        $data = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($data) > 0)
        {
            $_SESSION["login"] =  true;
            $row = mysqli_fetch_array($data);

            $_SESSION["login"] = true;
            $_SESSION["akun_id"] = $row["akun_id"];
            $_SESSION["username"] = $row["username"];

            echo "
                <script>
                    alert('login berhasil');
                    window.location='pdf.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('akun tidak ditemukan, login gagal');
                    window.location='login.php';
                </script>
            ";
        }
    }
?>