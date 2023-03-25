<?php
    require 'header.php';

    //Get variables 
    $title = "";
    $disc = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $title = $_POST["title"];
        $disc = $_POST["disc"];
    
    
            //add new DataBase
            $sql = "INSERT INTO post_data (title, disc) VALUES ('$title', '$disc')";
            $result = $conn->query($sql);
    
            
    
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
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title here">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Write You're Blog ...</label>
                    <textarea type="text" name="disc" class="form-control" id="" rows="6"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Post Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require 'footer.php';
?>