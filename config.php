<?php
session_start();


// Create connection 
$conn = new mysqli('localhost', 'root', '', 'blog_post');
// Check connection 
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error); 
} 