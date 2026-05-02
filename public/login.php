<?php
require_once("../templates/header-guest.php");
?>

<?php
$loginPassErr = ""; //initiate var with empty string to prevent undefined variable error (if called later on with no value)

//IF STATEMENT
//Check if POST data in login form is set, and if so execute below code block
if(isset($_POST['login'])) {
    require_once('../src/sanitize.php'); //require sanitize.php file

    $loginUser = sanitize($_POST['username']); //pass username data from POST Super global into sanitize() function from sanitize file and assign to $loginUser var
    $loginPassword = sanitize($_POST['password']); //pass password data from POST Super global into sanitize() function from sanitize file and assign to $loginPass var

    //TRY STATEMENT
    //require DBconnect and attempt to connect and query to DB with prepared SQL query
    try {
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM users WHERE username = :username"; //select all from users where username = username
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $loginUser, PDO::PARAM_STR); //bind sanitized data from $loginUser variable to username
        $statement->execute();
        $result = $statement->fetchAll(); //assign returned result to $result variable

        //FOR LOOP
        //look through elements in $result array
        foreach($result as $row) {
            //IF STATEMENT
            //if value associated with password key in $result array matches value in $loginPassword var, execute below code block
            if($row['password'] == $loginPassword) {
                $_SESSION['username'] = $loginUser; //set session username
                $_SESSION['active'] = true; //set session to 'Active' and allow user to access member pages
                //redirect user to home page after successful login, and exit to prevent remaining code from running
                header("location:index.php");
                exit;
            //ELSE if values do not match, assign text to $loginPassErr
            } else {
                $loginPassErr = "Invalid username or password.";
            }
        }

    //catch any errors related to attempted DB connection
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
    
<title>Login page</title>
</head>
<body>
    <?php
    require_once("../templates/navbar.php");
    ?>

    <!--MAIN CONTAINER-->
    <div class="container mt-4 text-center">
        <!--ROW 1-->
        <div class="row">
            <h2>Please login to view this page.</h2>
            <hr>
        </div>
        <!--ROW 2-->
        <div class="row mt-4">
            <!--COLUMN-->
            <div class="col-4 mx-auto form-container p-3 gap-4">
                <!--LOGIN FORM-->
                <form action="" method="POST" id="login-form">
                    <div class="form-floating">
                        <input name="username" type="text" class="form-control" id="floatingUserName" placeholder="" required>
                        <label for="floatingUserName">Username</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="" required>
                        <label for="floatingUPassword">Password</label>
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
                <button name="login" type="submit" form="login-form" class="btn btn-primary me-2">login</button>
            </div>
            <h5 class="text-danger mt-4"><?php echo($loginPassErr);?></h5>
        </div>

        <!--ROW 4-->
        <div class="row mt-4">
            <h6>Not a member? click below to create an account</h6>
            <a href="signup.php">Click me!</a>
        </div>
    </div>

<?php
    require_once("../templates/footer.php");
?>