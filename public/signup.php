<?php
require_once("../templates/header.php");
?>
    
<title>Signup page</title>
</head>
<body>
    <?php
    require_once("../templates/navbar.php");
    ?>

    <div class="container mt-4 text-center">
        <div class="row">
            <h2>Sign up - necome a member!</h2>
            <hr>
        </div>
        <div class="row mt-4 signup-form ">
            <form action="" class="bg-dark">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingUserName" placeholder="JohnDeer007">
                    <label for="floatingUserName">Username</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="text" class="form-control" id="floatingAddress" placeholder="37 Make Believe Avenue">
                    <label for="floatingAddress">Address</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingUPassword">Password</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password">
                    <label for="floatingPasswordConfirm">Confirm password</label>
                </div>
            </form>
        </div>
    </div>
<?php
    require_once("../templates/footer.php");
?>