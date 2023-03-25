<?php
    require 'header.php';
    //Get variables 
    $title = "";
    $disc = "";
    $image = "";
    $tmpName = "";
    $uploc = "";

    $errorMessage = "";
    $successMessage = "";
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $title = $_POST["title"];
        $disc = $_POST["disc"];
        
        
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];



        if ($fileSize < 500000000) {

            // Generate a unique filename to avoid overwriting existing files
            $fileNewName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // Set the upload directory
            $uploadDir = 'assets/img/';

            // Create the upload directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            // Move the uploaded file to the upload directory
            $fileDestination = $uploadDir . $fileNewName;
            move_uploaded_file($fileTmpName, $fileDestination);

        }


        do { 
    
            if( empty($title) || empty($disc)){
                
                $errorMessage = "All fields need to be filled!";
                break;
            }
    
            //add new DataBase
            $sql = "INSERT INTO post_data (title, disc, image) VALUES ('$title', '$disc', '$fileDestination')";
            $result = $conn->query($sql);

            if(!$result){
                $errorMessage = "Invalide query" . $conn->error;
                break;
            }
    


            
            $title = "";
            $disc = "";

            $errorMessage = "";
            $successMessage = "";
    
            $successMessage = "Mumber Added Sucessfully";
    
    
            header("location: index.php");
            exit;
    
        }while(false);
    }
    if(isset($_SESSION['user_id'])){
        if(!$_SESSION['user_id']):
            header('Location: login.php');
            exit();
        endif;
    }
?>

<div class="dashbord-page">
    <!-- page title -->
    <div class="page-title pt-30">
        <div class="page-content">
            <h2>Welcome To Deshbord!</h2>
            <p>We post Our Blogs Everyday In This Site.</p>

            <nav aria-label="breadcrumb text-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="creat-post.php?logout=true">LogOut</a></li>
                    <li class="breadcrumb-item"><a href="index.php">View posts</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <!-- post card -->
        <div class="form-cards pt-40">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title here">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Write You're Blog ...</label>
                            <textarea type="text" name="disc" class="form-control" id="" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="wrapper">
                            <input class="file-input" type="file" name="image" hidden>
                            <img src="assets/img/upload-icon.png" alt="icon">
                            <p>Upload Feture Iamge</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class=" btn btn-success">Post Now</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


<?php
    require 'footer.php';
?>