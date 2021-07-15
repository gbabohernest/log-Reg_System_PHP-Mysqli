  <?php
session_start();
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/main.css">
    <!-- <style>
      p:last-child{
        color: green;
        text-align: center;
      }
    </style> -->

    <title>Login</title>
  </head>
  <body>
    <header class="container-fluid py-3 bg-light" style="background-color: #e3f2d;">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2d;">
            <div class="container">
                <span class="navbar-brand-mb-0 h1">Developers</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbar">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item active">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">Find Blog</a>
                        </li>
                        <?php
if (isset($_SESSION['sesssion_useruid'])) {
    echo '<li class="nav-item ">
                                <a href="profile.php" class="nav-link">Profile</a>
                            </li>';
    echo '<li class="nav-item ">
                                <a href="logout.php" class="nav-link">Log out</a>
                            </li>';
} else {
    echo '<li class="nav-item ">
                                <a href="signup.php" class="nav-link">Sign Up</a>
                            </li>';
    echo '<li class="nav-item ">
                                <a href="login.php" class="nav-link">Log in</a>
                            </li>';
}

?>
                    </ul>
                </div>

            </div>

            </nav>
        </header>
