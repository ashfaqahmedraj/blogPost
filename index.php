<?php
    require 'header.php';
?>

<div class="blog-page">
    <!-- page title -->
    <div class="page-title pt-30">
        <div class="page-content">
            <h2>Blogwebsite.com</h2>

            <?php

            if (isset($_SESSION['user_id'])) {
                // user is logged in, show logout button
                echo "<nav aria-label='breadcrumb text-center'>
                        <ol class='breadcrumb'>
                            <li class='breadcrumb-item'>For Write your Blog Please <a href='registration.php'>Signup</a></li>
                            <li class='breadcrumb-item'><a href='login.php'>Login</a></li>
                        </ol>
                    </nav> ";
                    
            } else {
                // user is not logged in, show login form
                echo "<nav aria-label='breadcrumb text-center'>
                        <ol class='breadcrumb'>
                            <li class='breadcrumb-item'>For Write your Blog Please <a href='creat-post.php'>creat post</a></li>
                            <li class='breadcrumb-item'><a href='index.php?logout=true'>logout</a></li>
                        </ol>
                    </nav>";
            }
            ?>

        </div>
    </div>

    <div class="container">

        <!-- post card -->
        <div class="post-cards pt-40">
            <div class="row">
                <!-- single card -->
                <?php
                $sul = "SELECT * FROM post_data ORDER BY post_date DESC" ;
                $result = $conn->query($sul);

                if(!$result){
                    die("Invaled Query" . $conn->connect_error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <div class='col-lg-4'>
                        <div class='single-post mb-20'>
                            <div class='card' style='width: 22rem;'>
                            <img src='$row[image]' class='card-img-top' alt='image'>
                                <div class='card-body'>

                                    <a href='single-post.php?user_id={$row['id']}' class='title-cr'><h5 class='card-title'>$row[title]</h5> </a>
                                    <p class='card-text'>$row[disc]</p>
                                    <a href='single-post.php?user_id={$row['id']}' class='btn btn-outline-success'>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                
                }
                
                ?>
            </div>
        </div>

    </div>
</div>


<div class="footer-bar pt-20">
    <p>Project Desing & Develop by <a href="#">Ashfaq Ahmed Raj</a> & <a
            href="https://docs.google.com/document/d/1yrm0Jd6gzIK7HN5ZoFBb-XQHLgfA7qEMnQvzJL7ESbw/edit?usp=sharing">Read
            Documention</a></p>
</div>

<?php
    require 'footer.php';
?>