<?php
include 'dbconfig.php';
$result = mysqli_query($conn, "SELECT * FROM mobiles");
?>

<div class="container mt-5">
    <h2 class="mb-4">All Mobile Phones</h2>
    <a href="add.php" class="btn btn-success mb-3">Add New Mobile</a>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['MobileName']); ?></td>
                    <td><?= htmlspecialchars($row['MobilePrice']); ?></td>
                    <td><?= htmlspecialchars($row['MobileQuantity']); ?></td>
                    <td><?= htmlspecialchars($row['MobileDesc']); ?></td>
                    <td><img src="<?= htmlspecialchars($row['MonImgPath']); ?>" width="80" alt="Mobile Image"></td>
                    <td>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
