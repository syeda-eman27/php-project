<?php
include 'dbconfig.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // First get the image path to delete the image file
    $result = mysqli_query($conn, "SELECT MonImgPath FROM mobiles WHERE id = $id");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imagePath = $row['MonImgPath'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
    }

    // Now delete the record
    $sql = "DELETE FROM mobiles WHERE id = $id";
    $deleteQuery = mysqli_query($conn, $sql);

    if($deleteQuery){
        header("Location: selectall.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: selectall.php");
    exit();
}
