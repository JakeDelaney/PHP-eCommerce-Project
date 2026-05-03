<footer class="container-fluid fixed-bottom text-center bg-dark text-light">
    <div class="row">

        <h5 class="mt-4">Logged in as:
            <?php
                $hidden = "";
                if(isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                }
                elseif(!isset($_SESSION['username'])) {
                    echo("Guest");
                    $hidden = "hidden";
                }
            ?>
        </h5>
    </div>
    <div class="row">
        <form action="logout.php" method="post" name="Logout_Form" class="form-signin mt-2">
            <button name="Submit" value="Logout" class="btn btn-primary me-2" type="submit" <?php echo($hidden)?> >Log out</button>
        </form>
    </div>
    <div class="row my-4">
        <div class="col">
            <h3>Copyright</h3>
        </div>
        <div class="col">
            <h3>Social media icons</h3>
        </div>
        <div class="col">
            <h3>Student name, number and assignment</h3>
        </div>
    </div>
</footer>
</body>
</html>