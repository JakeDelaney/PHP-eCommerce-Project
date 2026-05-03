<!--This template provides the footer for all website pages-->

<!--MAIN CONTAINER-->
<footer class="container-fluid fixed-bottom text-center bg-dark text-light">
    <!--ROW-->
    <div class="row my-4">
        <!--COL 1-->
        <div class="col">
            <h3>Copyright &copy</h3>
        </div>
        <!--COL 2-->
        <div class="col">
            <h5>Logged in as:
                <?php
                    $hidden = ""; //initialize var with empty string
                    //IF STATEMENT
                    //if $_SESSION username key has a value, echo it to screen
                    if(isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    }
                    //else if username key has no value, echo guest and assign "hidden" string to $hidden var to hide logout button
                    elseif(!isset($_SESSION['username'])) {
                        echo("Guest");
                        $hidden = "hidden";
                    }
                ?>
            </h5>
            <!--logout button-->
            <form action="logout.php" method="post" name="Logout_Form" class="form-signin mt-3">
                <button name="Submit" value="Logout" class="btn btn-primary me-2" type="submit" <?php echo($hidden)?> >Log out</button>
            </form>
        </div>
        <!--COL 3-->
        <div class="col">
            <h3>Jake Delaney - B00148433</h3>
        </div>
    </div>
    
</footer>
</body>
</html>