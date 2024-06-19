<?php
// Oturum başlatma

include "navbar.php";
include "function.php";
include "database/db.php";

$mesaj2 = ""; // Başlangıçta mesaj2 değişkenini boş olarak tanımla

if (isset($_SESSION["message"])) {
    $mesaj2 = $_SESSION["message"];
    unset($_SESSION["message"]); // Mesajı aldıktan sonra oturumdan kaldır
}

if (isset($_POST["login"])) {
    $control = false;

    if (empty($_POST["username"])) {
        $message = "Mail Alanı Boş Geçilemez";
        $control = true;
    } else {
        $username = safety($_POST['username']);
    }

    if (empty($_POST["password"])) {
        $message = "Mail Alanı Boş Geçilemez";
        $control = true;
    } else {
        $password = safety($_POST['password']);
    }

    if ($control == false) {
        $sql = "SELECT id, kullaniciUsername, kullaniciPassword FROM kullanici WHERE kullaniciUsername=?";

        if ($stmt = mysqli_prepare($baglanti, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    //parola
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            $_SESSION["loggedIn"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            header("Location: index.php");
                            exit; // Çıkış yapılmalıdır
                        } else {
                            $_SESSION["message"] = "Username Or Password Invalid. Please Try Again";
                            header("Location: kullaniciLogin.php"); // Yeniden yönlendirme yap
                            exit; // Çıkış yapılmalıdır
                        }
                    }
                } else {
                    $_SESSION["message"] = "Username Or Password Invalid. Please Try Again";
                    header("Location: kullaniciLogin.php"); // Yeniden yönlendirme yap
                    exit; // Çıkış yapılmalıdır
                }
            }
        }
    }
}
?>


<style>
.rounded-5 {
    border-radius: 2%;
}

.container
{
    margin-top: 130px;
}
</style>

<section class="p-3 " style="background-color: black; ">
    <div class="container rounded-5 " style="background-color: #ffb900;">
        <div class="row justify-content-center rounded-5">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 rounded-5">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="images/f0c40dc2da345b941ac669f14d46dc9d.gif"
                                alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <link rel="stylesheet"
                                                    href="path/to/font-awesome/css/font-awesome.min.css">
                                                <h4 class="text-center"><i class="fa fa-taxi"
                                                        aria-hidden="true"></i> User Login <i
                                                        class="fa fa-taxi" aria-hidden="true"></i></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post" action="kullaniciLogin.php">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" value="" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" name="login"
                                                        type="submit">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div
                                                class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                <a href="kullaniciRegister.php"
                                                    class="link-secondary text-decoration-none">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var message2 = "<?php echo $mesaj2; ?>";
    if (message2 !== "") {
        Swal.fire(message2);
    }
</script>


<?php   include "footer.php"     ?>
