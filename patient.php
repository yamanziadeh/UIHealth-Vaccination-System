<html>
    <head>
        <title>UIHealth | Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <style>
        <?php include "style.css" ?>
        </style>
    </head>
    <body>
        <div id="header" class="nav">
            <img class="mx-auto" src="logo.png" alt="">
        </div>
        <center><h2>Welcome Patient!</h2></center>
        <br>
        <div id="patient" style="width: 500px; margin:auto;">
            <div class = "card">
                <div class="card-body" style="padding-top: 35px;">
                    <form action="viewPatient.php" method="POST" style="display:inline-block;">
                            <input type="id" name="id" class="form-control" value="<?php echo $_GET["id"] ?>" id="id" hidden>
                            <input type="submit" value="View Info" class="btn btn-primary">
                    </form>
                    <form action="updatePatient.php" method="GET" style="display:inline-block;">
                            <input type="id" name="id" class="form-control" value="<?php echo $_GET["id"] ?>" id="id" hidden>
                            <input type="submit" value="Update Info" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>