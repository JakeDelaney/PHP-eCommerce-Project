<?php
require_once("../templates/header-member.php");
?>

<?php
//SQL QUERY 1 - This query is responsible for querying the database with the value stored in $_SESSION[username] 
//and retrieving any user data associated with that username

//IF STATEMENT
//if $_SESSION[username] has a value, execute below code block
if(isset($_SESSION['username'])) {
    require_once('../src/sanitize.php'); //require sanitize.php for its sanitize function

    //TRY STATEMENT
    //require DBconnect and attempt to connect and query to DB with prepared SQL query
    try {
        require_once('../src/DBconnect.php');
        $sql = "SELECT * FROM users WHERE username = :username"; //select all from users where username = username
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR); //bind data from $_SESSION[username] to username
        $statement->execute();
        $result = $statement->fetchAll(); //assign returned result to $result variable

       //catch any errors related to attempted DB connection
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php
//SQL QUERY 2 - This query is reponsible for updating the account details of the currently logged in user
//the SQL statements takes sanitized values from the details-form and binds them into the SQL statement that targets by user_id

$detailsPassErr=""; //initiate var with empty string to prevent undefined variable error (if called later on with no value)

//IF STATEMENT
//if $_POST has data set, execute below code block
if(isset($_POST['update'])) {

    //INNER IF STATEMENT
    //if values in password and passwordConfirm match, execute below code block
    if($_POST['password'] == $_POST['passwordConfirm']) {

        //FOR LOOP
        //loop through each row, and pass the key for user_id into the variable after running it through the sanitize function
        foreach($result as $row) { 
            $user_id = sanitize($row['user_id']);
        };

        try {
            //require DBconnect and attempt to connect and query to DB with prepared SQL query
            require_once('../src/DBconnect.php');

            //Create $updateUser array and pass it sanitize values from POST superglobal
            $updateUser = array (
                    "username" => sanitize($_POST['username']),
                    "email" => sanitize($_POST['email']),
                    "address" => sanitize($_POST['address']),
                    "password" => sanitize($_POST['password'])
                );

            //Updates users table and user properties where the user_id matches the logged in user
            $sql = "UPDATE users
                    SET username = :username, email = :email, address = :address, password = :password
                    WHERE user_id = :user_id";

            //Bind $updateUser array values to SQL statement
            $statement = $connection->prepare($sql);
            $statement->bindParam(':username', $updateUser['username'], PDO::PARAM_STR); //bind data from $_POST[username] to username
            $statement->bindParam(':email', $updateUser['email'], PDO::PARAM_STR); //bind data from $_POST[username] to username
            $statement->bindParam(':address', $updateUser['address'], PDO::PARAM_STR); //bind data from $_POST[username] to username
            $statement->bindParam(':password', $updateUser['password'], PDO::PARAM_STR); //bind data from $_POST[username] to username
            $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR); //bind data from $_POST[username] to username
            $statement->execute();

            //update $S_SESSION username to match any changes and redirect user to account update success page, exit to prevent any further code from running
            $_SESSION['username'] = $updateUser['username'];
            header("location:success-account-update.php");
            exit;

        //catch any errors related to attempted DB connection
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

      //else if passwords do not match, assign string to variable and print to screen
    } else {
        $detailsPassErr= ("Updated passwords not do match. Please try again.");
    }
}

    //SQL QUERY 3 - This query is reponsible for deleting the account of the signed in user
    //IF statement
    //if POST is set, execute below code block
    if(isset($_POST['delete'])) { 
        $sql = "DELETE FROM users WHERE username = :username";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
        $statement->execute();
        header("location:logout.php");
        exit;
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
                        <label for="floatingEmail">Email</label>
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
                        <input name="passwordConfirm" type="password" class="form-control" id="floatingPasswordConfirm" value="<?php echo sanitize($row['password']); ?>" required>
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
            <h5 class="text-danger mt-4"><?php echo($detailsPassErr);?></h5>
        </div>

        <!--ROW 3-->
        <div class="row mt-4">
            <h5>Click below to delete your account</h5>
            <form action="" method="POST" id="delete-form"></form>
            <div class="col">
                <button name="delete" type="submit" form="delete-form" class="btn btn-danger me-2 mt-2">Submit</button>
            </div>
        </div>
    </div>
    

<?php
    require_once("../templates/footer.php");
?>