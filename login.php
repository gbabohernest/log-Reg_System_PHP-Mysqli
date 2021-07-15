    <?php require_once "./includes/header.php"?>

    <section class="container  ">
        <div class="container p-5" style="background-color: #eeee"; >
            <h2 class="text-center py-3">Log In</h2>
            <form action="includes/login.inc.php" method="POST" class="mx-auto" style="width: 50%;">
                <div class="row">
                    <div class="col-lg">
                        <label for="mail/user" class="form-label pt-3">Email</label>
                        <input type="text" name="mail" class="form-control" id="mail/user" placeholder="email">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg">
                        <label for="pwd" class="form-label pt-3">Password</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="password">
                    </div>
                </div>
                <div class="d-grid col-4 mx-auto">
                    <button class="btn btn-dark my-3" name="submit" type="submit">Log In</button>
                </div>

            </form>
            <?php

if (isset($_GET['error'])) {

    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!!</p>";

    } else if ($_GET["error"] == "wronguid") {
        echo "<p>Wrong Username / Email!!</p>";

    } else if ($_GET["error"] == "wrongpassword") {
        echo "<p>Password is incorrect!!</p>";
    } else if ($_GET["error"] == "sqli_error") {
        echo "<p>Opps, something went wrong. Try again Please</p>";
    } else if ($_GET["error"] == "user_doesn't_exist") {
        echo "<p>Wrong Email!!</p>";

    } else if ($_GET['error'] == "wrongpwd") {
        echo "<p>Wrong Password!!</p>";
    }
}

if (isset($_GET['success'])) {
    if ($_GET['success'] == "loggedin") {
        echo "<h5>Thanks, You are Logged In!!</h5>";
    }

}

?>
        </div>
    </section>

    <?php require_once "./includes/footer.php"?>
