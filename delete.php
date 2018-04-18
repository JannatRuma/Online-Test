<?php
    session_start();
    include("db.php");
    include("header_admin.php");
    if($_SESSION['que_id'] == "") {
        echo "Error! Try again";
    }
    else {
        $delete = $_SESSION['que_id'];
        $delete = mysqli_query($con, "DELETE FROM question WHERE que_id = '$delete'");
        if($delete) {
            echo "Successfully deleted!";
            header("Location:quedelete.php");
            exit();
        } else {
            echo mysqli_error($con);
        }
    }

?>