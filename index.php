<!doctype html>
<html lang="en">


    <?php require_once "./includes/header.php"?>

    <section class="container  ">
        <div class="container p-5" style="background-color: #eeee"; >
            <h3 class="text-capitalize text-center">This is an introduction</h3>
            <p class="text-muted text-center">Here is an important paragraph that explains the purpose of the website and why you are here!!</p>

            <div class="row">
                <h4 class="text-center text-black ">Some Basic Categories</h4>
                <div class="col text-center p-5 home" >
                    <p class="text-muted text-center ">Fun Stuff</p>
                </div>
                <div class="col text-center p-5 home" >
                    <p class="text-muted text-center">Serious Stuff</p>
                </div>
                <div class="col text-center p-5 home" >
                    <p class="text-muted text-center">Exiciting Stuff</p>
                </div>
                <div class="col text-center p-5 home" >
                    <p class="text-muted text-center">Boring Stuff</p>
                </div>
            </div>
        </div>
    </section>

    <?php
if (isset($_SESSION['session_username'])) {
    echo "you are logged in";

} else {
    echo 'home';
}

?>



    <?php require_once "./includes/footer.php"?>
</html>
