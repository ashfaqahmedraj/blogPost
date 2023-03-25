<?php
    require 'header.php';

    //Get variables 
    $name = "";
    $email = "";
    $password = "";

    $errorMessage = "";
    $successMessage = "";
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        do { 
    
            if( empty($name) || empty($email) || empty($password)){
                
                $errorMessage = "All fields need to be filled!";
                break;
            }
    
            //add new DataBase
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            $result = $conn->query($sql);
    
            if(!$result){
                $errorMessage = "Invalide query" . $conn->error;
                break;
            }
    
            $name = "";
            $email = "";
            $password = "";

            $errorMessage = "";
            $successMessage = "";
    
            $successMessage = "Mumber Added Sucessfully";
    
    
            header("location: creat-post.php");
            exit;
    
        }while(false);
    }


?>

<div class="reg-page">
    <!-- page title -->
    <div class="page-title pt-30">
        <div class="page-content">
            <h2>Register User!</h2>
            <p>We post Our Blogs Everyday In This Site.</p>
        </div>
    </div>

    <div class="container">
        <!-- post card -->
        <div class="reg-cards">
            <form class="row g-3" action="" method="post">
                <div class="col-12 text-center">
                    <h2>Registration From</h2>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
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
                    <button type="submit" class="btn btn-success">Register Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require 'footer.php';
?>