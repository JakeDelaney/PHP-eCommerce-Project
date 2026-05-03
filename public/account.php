<?php
require_once("../templates/header-member.php");
?>

<?php
if(isset($_SESSION['username'])) {
    require_once('../src/sanitize.php');
    try {
        require_once('../src/DBconnect.php');
        $sql = "SELECT * FROM users WHERE username = :username"; //select all from users where username = username
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR); //bind sanitized data from $loginUser variable to username
        $statement->execute();
        $result = $statement->fetchAll(); //assign returned result to $result variable

    }  catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<title>Account details</title>
</head>
<body>
    <?php
    require_once("../templates/navbar.php");
    ?>

    <!--MAIN CONTAINER-->
    <div class="container mt-4 text-center">
        <!--ROW-->
        <div class="row">
            <h2>Account details</h2>
            <hr>
        </div>

        <!--ROW 1-->
        <div class="row mt-2">
            <p>Below are your current account details. You can choose to update them all, or a specific value.</p>
            <!--COLUMN-->
            <div class="col-4 mx-auto form-container mt-2 p-3 gap-4">
                <!--ACCOUNT DETAILS FORM-->
                <?php foreach($result as $row) { ?>
                <form action="" method="POST" id="details-form">
                    <div class="form-floating">
                        <input name="username" type="text" class="form-control" id="floatingUserName" value="<?php echo sanitize($row['username']); ?>" required>
                        <label for="floatingUserName">Username</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="email" type="email" class="form-control" id="floatingEmail" value="<?php echo sanitize($row['email']); ?>" required>
                        <label for="floatingEmail">Password</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="address" type="text" class="form-control" id="floatingAddress" value="<?php echo sanitize($row['address']); ?>" required>
                        <label for="floatingAddress">Address</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" value="<?php echo sanitize($row['password']); ?>" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="password" type="password" class="form-control" id="floatingPasswordConfirm" required>
                        <label for="floatingPasswordConfirm">Confirm password</label>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <!--ROW 2-->
        <div class="row mt-4">
            <!--COLUMN
                Places buttons outside of form for styling, but links them by the button 'form' attribute, to the 'id' attribute of the form itself
            -->
            <div class="col">
                <button name="update" type="submit" form="details-form" class="btn btn-primary me-2">Submit</button>
                <button type="reset" form="details-form" class="btn btn-secondary ms-2">Reset</button>
            </div>
        </div>
    </div>

<?php
    require_once("../templates/footer.php");
?>