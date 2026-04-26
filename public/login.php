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
            <h2>Please login to view this page.</h2>
            <hr>
        </div>
        <div class="row mt-4">
            <div class="col-4 mx-auto form-container p-3 gap-4">
                <form action="" id="login-form">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingUserName" placeholder="JohnDeer007">
                        <label for="floatingUserName">Username</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingUPassword">Password</label>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" form="login-form" class="btn btn-primary me-2">login</button>
            </div>
        </div>
    </div>
<?php
    require_once("../templates/footer.php");
?>