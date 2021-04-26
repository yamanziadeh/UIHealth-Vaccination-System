<html>
    <head>
        <title>UIHealth | Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="header" class="nav">
            <img class="mx-auto" src="logo.png" alt="">
        </div>
        <div style="margin:auto;width:400px">
            <div class = "card">
                <div class="card-body">
                <center><h2 class="card-title">Login</h2></center>
                <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                        <select class="form-select">
                            <option selected>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="nurse">Nurse</option>
                            <option value="patient">Patient</option>
                        </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>