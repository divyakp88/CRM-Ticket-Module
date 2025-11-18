<?php
session_start();

//redirect if not logged in

if(!isset($_SESSION["user_id"])){
    header("Location: ../auth/login.php");
    exit();
}

//only authors can update tickets
if($_SESSION["role"]!="author"){
    echo "You do not have permission to edit tickets.";
    exit();
}

require_once "../config/db.php";

$user_id=$_SESSION["user_id"];

//Get ticket ID from the URL
$ticket_id=$_GET['id']??null;
if(!$ticket_id){
    header("Location: my_tickets.php");
    exit();

}

//Fetch ticket details
$stmt=$conn->prepare("SELECT * FROM tickets WHERE id=? AND created_by=?");
$stmt->bind_param("ii",$ticket_id,$user_id);
$stmt.execute();
$ticket=$stmt->get_result()->fetch_assoc();

if(!$ticket){
    echo "Tickets not found or You do not have permission to edit it";
    exit();
}

//form submission
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=trim($_POST["name"]);
    $description=trim($_POST["description"]);
    $assigned_to=$_POST["assigned_to"]??NULL;

    //handle file upload
    $file_path=$ticket['file']; //keep the existing file if not changed
    if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0){
        $upload_dir="../uploads/";
        $filename=basename($_FILES["file"]["name"]);
        $file_path = $upload_dir . time() . "_" . $filename;
        if(!move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)){
            $message="Failed To upload File.";
        }
    }
    if(empty($name) || empty($description)){
        $message = "Title and Description are required.";
    }else {
        
    }
      
    
}













