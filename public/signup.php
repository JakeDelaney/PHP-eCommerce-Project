<?php
require_once("../templates/header.php");
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
                <form action="" id="signup-form">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingUserName" placeholder="JohnDeer007">
                        <label for="floatingUserName">Username</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" id="floatingAddress" placeholder="37 Make Believe Avenue">
                        <label for="floatingAddress">Address</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
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
                <button type="submit" form="signup-form" class="btn btn-primary me-2">Submit</button>
                <button type="reset" form="signup-form" class="btn btn-secondary ms-2">Reset</button>
            </div>
        </div>
    </div>
<?php
    require_once("../templates/footer.php");
?>