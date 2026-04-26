<?php
require_once("../templates/header.php");
?>

<?php
//IF STATEMENT
//Check if POST data is set, and if so execute below code block
if(isset($_POST['create'])) {
    //TRY STATEMENT
    try {
        //require DBConnect
        require_once("../src/DBConnect.php");
        //create $newUser array and pass values into it from POST super global
        $newUser = array (
            "username" => ($_POST['username']),
            "email" => ($_POST['email']),
            "address" => ($_POST['address']),
            "password" => ($_POST['password'])
        );

        //Insert values from $new_user array into database as a prepared SQL statement
        $sql = sprintf( "INSERT INTO %s (%s) values (%s)", "users", 
               implode(", ",array_keys($newUser)), ":" . implode(", :", array_keys($newUser)) );
        $statement = $connection->prepare($sql);
        $statement->execute($newUser);
        
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<title>Signup page</title>
</head>
<body>
    <?php
    require_once("../templates/navbar.php");
    ?>

    <!--MAIN CONTAINER-->
    <div class="container mt-4 text-center">
        <!--ROW 1-->
        <div class="row">
            <h2>Sign up - become a member!</h2>
            <hr>
        </div>
        <!--ROW 2-->
        <div class="row mt-4">
            <!--COLUMN-->
            <div class="col-4 mx-auto form-container p-3 gap-4">
                <!--SIGNUP FORM-->
                <form action="" method="POST" id="signup-form">
                    <div class="form-floating">
                        <input name ="username" type="text" class="form-control" id="floatingUserName" placeholder="JohnDeer007">
                        <label for="floatingUserName">Username</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="address" type="text" class="form-control" id="floatingAddress" placeholder="37 Make Believe Avenue">
                        <label for="floatingAddress">Address</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingUPassword">Password</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password">
                        <label for="floatingPasswordConfirm">Confirm password</label>
                    </div>
                </form>
            </div>
        </div>
        <!--ROW 3-->
        <div class="row mt-4">
            <!--COLUMN
                Places buttons outside of form for styling, but links them by the button 'form' attribute, to the 'id' attribute of the form itself
            -->
            <div class="col">
                <button name="create" type="submit" form="signup-form" class="btn btn-primary me-2">Submit</button>
                <button type="reset" form="signup-form" class="btn btn-secondary ms-2">Reset</button>
            </div>
        </div>
    </div>
<?php
    require_once("../templates/footer.php");
?>