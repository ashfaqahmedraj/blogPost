<?php
    require 'header.php';

    //get the student_id parameter from the URL
    $user_id = $_GET['user_id'];

    //retrieve the student record from the database using the student_id
    $sql = "SELECT * FROM post_data WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //display the student details
        $title = $row['title'];
        $disc = $row['disc'];
        
    } else {
        echo "No student record found";
    }

    
?>

<div class="single-post-page">
    <!-- page title -->
    <div class="page-title pt-30 mb-20">
        <div class="page-content">
            <h2>Blogwebsite.com</h2>
            <nav aria-label="breadcrumb text-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">View All</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Single-post</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <!-- post card -->
        <div class="blog-cards">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="title pt-20">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="col-12">
                        <div class="blog-cnt">
                            <p><?php echo $disc; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php
    require 'footer.php';
?>