<?php
    require 'header.php';

    if(isset($_SESSION['user_id'])){
        if($_SESSION['user_id']):
            header('Location: creat-post.php');
            exit();
        endif;
    }

    if(isset($_POST['submit-login'])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows ($result) == 1) {
            
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];

            header('Location: creat-post.php');
            exit();
            
        } else {
            echo "No student record found";
        }

    }
    
    if(isset($_GET['logout'])){
        if($_GET['logout'] == 'true'){
    
            $_SESSION['user_id'] = '';
            header('Location: login.php');
            exit();
        }
    }
?>

<div class="login-page">
    <!-- page title -->
    <div class="page-title pt-30">
        <div class="page-content">
            <h2>Login User</h2>
            <p>We post Our Blogs Everyday In This Site.</p>
        </div>
    </div>

    <div class="container">
        <!-- post card -->
        <div class="login-cards">
            <form class="row g-3" action="login.php" method="post">
                <div class="col-12 text-center">
                    <h2>Login Your Account</h2>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="col-12">
                    <button type="submit" name="submit-login" class="btn btn-success">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require 'footer.php';
?>