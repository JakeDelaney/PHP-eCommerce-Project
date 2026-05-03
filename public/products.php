<?php
require_once("../templates/header-guest.php");
require_once("../src/sanitize.php")
?>

<?php
    try {
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM products";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
?>

<title>Products page</title>
</head>
<body>
    <?php
    require_once("../templates/navbar.php");
    ?>

    <!--MAIN CONTAINER-->
    <div class="container mt-4 text-center">
        <div class="row">
            
        </div>
        <h2>Products</h2>
        <hr>
        <table class="table table-striped mt-4">
            <thead class="table-success">
                <tr>
                    <th class="col-3">Record name</th>
                    <th class="col">Artist</th>
                    <th class="col">Genre</th>
                    <th class="col">Released</th>
                    <th class="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo sanitize($row["product_name"]); ?></td>
                    <td><?php echo sanitize($row["artist_name"]); ?></td>
                    <td><?php echo sanitize($row["music_genre"]); ?></td>
                    <td><?php echo sanitize($row["year_released"]); ?></td>
                    <td><?php echo sanitize($row["quantity"]); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
    require_once("../templates/footer.php");
?>