<?php
session_start();
include("../config/db.php");

// Only admin
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}

// Validate
if(!isset($_POST['ticket_id'])){
    echo "Invalid request!";
    exit();
}

$ticket_id = $_POST['ticket_id'];
$status = $_POST['status'];
$new_assignee = $_POST['assigned_to'];

// If no assignee selected
if($new_assignee === "" || $new_assignee == 0){
    $new_assignee = NULL;
}

// Find old assignee
$old = $conn->query("SELECT assigned_to FROM tickets WHERE id=$ticket_id")->fetch_assoc();
$old_assignee = $old['assigned_to'];

// Update status
$stmt = $conn->prepare("UPDATE tickets SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $ticket_id);
$update_status_ok = $stmt->execute();

// If reassigned
if($old_assignee != $new_assignee){

    if($new_assignee == NULL){
        $role = "author";
        $assigned_to = NULL;
    } else {
        $role = "assignee";
        $assigned_to = $new_assignee;
    }

    $upd = $conn->prepare("UPDATE tickets SET assigned_to=?, role=? WHERE id=?");
    $upd->bind_param("isi", $assigned_to, $role, $ticket_id);
    $upd->execute();
}

// Redirect
if($update_status_ok){
    header("Location: index.php?page=manage_ticket&msg=updated");
    exit();
}
else{
    echo "Error updating ticket:".$conn->error;
}
?>