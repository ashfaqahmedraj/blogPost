<?php
    require 'header.php';

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $disc = $_POST['disc'];
    
        // Check if file was uploaded successfully
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            $uploc = 'img/'.$image;
    
            // Validate the file size, type, and dimensions before uploading
            // ...
    
            // Add new data to the database
            $sql = "INSERT INTO post_data (title, disc, image) VALUES ('$title', '$disc', '$image')";
    
            if(mysqli_query($conn, $sql) == TRUE){
                move_uploaded_file($tmpName, $uploc);
                echo "Data inserted successfully";
            } else {
                echo "Data not inserted";
            }
        } else {
            // Handle file upload errors
            switch($_FILES['image']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "The uploaded file exceeds the maximum file size limit";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "The uploaded file was only partially uploaded";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "No file was uploaded";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "Missing a temporary folder";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo "Failed to write file to disk";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo "A PHP extension stopped the file upload";
                    break;
                default:
                    echo "Unknown file upload error";
            }
        }
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
            <form action="" method="post">

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
                        <button type="submit" name="submit" value="insert" class="btn btn-success">Post Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    require 'footer.php';
?>