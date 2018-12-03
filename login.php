<?php 

require_once("koneksi.php");


if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM member WHERE email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            if ($user["level"] == 0) {
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: home.php");
            }
            elseif ($user["level"] == 1) {
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: adminhome.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<body>
    <div class="tab-content">
        <div class="tab-panel" role="tabpanel" id="tab-1"><p></p>
            <form method="POST" action="login.php">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><input class="form-control" type="name" name="email" placeholder="Alamat email"></div>
                            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Kata sandi"></div>
                            <div class="form-group"><input class="form-control" type="submit" name="login" style="background-color:rgb(147,147,147);" value="Masuk"></div>
                            <p class="text-center">Belum punya akun? Klik disini untuk <a href="register.php">daftar</a>.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>

