
    <?php require_once "./includes/header.php"?>

    <section class="container  ">
        <div class="container p-5" style="background-color: #eeee"; >
            <h2 class="text-center py-3">Sign Up</h2>
            <form action="includes/signup.inc.php" method="POST" class="">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="firstname" class="form-label pt-3">First name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="first name">
                    </div>
                    <div class="col-lg-6">
                        <label for="lastname" class="form-label pt-3">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="email" class="form-label pt-3">Email</label>
                        <input type="email" name="email" class="form-control" id="lastname" placeholder="email">
                    </div>
                    <div class="col-lg-6">
                        <label for="uid" class="form-label pt-3">Username</label>
                        <input type="text" name="username" class="form-control" id="uid" placeholder="user-name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="pwd" class="form-label pt-3">Password</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="password">
                    </div>
                    <div class="col-lg-6">
                        <label for="c_pwd" class="form-label pt-3">Confirm Password</label>
                        <input type="password" name="c_pwd" class="form-control" id="c_pwd" placeholder="confirm password">
                    </div>
                </div>
                <div class="d-grid col-4 mx-auto">
                    <button class="btn btn-dark my-3" name="submit" type="submit">Sign Up</button>
                </div>

            </form>
      <?php

if (isset($_GET['error'])) {

    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!!</p>";

    } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Email is not a valid email!!</p>";

    } else if ($_GET["error"] == "invalidusername") {
        echo "<p>Email is not a valid email!!</p>";

    } else if ($_GET["error"] == "password-doesnot-match") {
        echo "<p>Password does not match !!</p>";

    } else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already exist !!</p>";

    } else if ($_GET["error"] == "useremailtaken") {
        echo "<p>Email already exist !!</p>";

    } else if ($_GET["error"] == "connection-username_failed!!") {
        echo "<p>Oops, Something went wrong. Try again please</p>";

    } else if ($_GET["error"] == "connection-usersEmail_failed!!") {
        echo "<p>Oops, Something went wrong. Try again please</p>";

    } else if ($_GET["error"] == "database_error") {
        echo "<p>Oops, Something went wrong. Try again please</p>";
    }
}

if (isset($_GET['success'])) {
    if ($_GET['success'] == "signedup") {
        echo "<h5>Thanks, You are Signed up!!</h5>";
    }

}
?>
</div>
 </section>

<?php require_once "./includes/footer.php"?>
