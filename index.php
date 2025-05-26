<?php
include 'dbconfig.php';

if(isset($_POST['btnSave'])){
    $Mobname = $_POST['mobname'];
    $MobPrice = $_POST['mobprice'];
    $MobQunatity = $_POST['mobQunat'];
    $Mobdesc = $_POST['mobdesc'];
    $mobimgName = $_FILES['mobimg']['name'];
    $mobtempName = $_FILES['mobimg']['tmp_name'];
    $TargetDirectry = "./img/";
    $imgPath = $TargetDirectry . basename($mobimgName);
    
    move_uploaded_file($mobtempName, $imgPath);
    
    $sql = "INSERT INTO mobiles (MobileName, MobilePrice, MobileQuantity, MobileDesc, MonImgPath) 
            VALUES ('$Mobname', '$MobPrice', '$MobQunatity', '$Mobdesc', '$imgPath')";
    $Query = mysqli_query($conn, $sql);
    
    // if($Query){
    //     header("Location: selectall.php");  // Redirect after save
    //     exit();
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
}
 unset($_POST['btnSave']);
?>

<!-- Your existing HTML form here -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Add Mobile Phone</h2>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="mobname" class="form-label">Mobile Name:</label>
                            <input type="text" class="form-control" id="mobname" name="mobname" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobprice" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="mobprice" name="mobprice" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobQunat" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="mobQunat" name="mobQunat" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobdesc" class="form-label">Description:</label>
                            <textarea class="form-control" id="mobdesc" name="mobdesc" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="mobimg" class="form-label">Image:</label>
                            <input class="form-control" type="file" id="mobimg" name="mobimg" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
