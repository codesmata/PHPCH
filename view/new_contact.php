
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address Book</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Code+Pro:300,400,500,700">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<header>
    <nav class="navbar">
        <div class="container">
         <!--   <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"> Logout</a></li>
            </ul>-->
        </div>
    </nav>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div>
                    <ul class="nav nav-tabs">
                        <li><a href="/list">Contacts</a></li>
                        <li class="active"><a href="#">New Contact</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/add">
                        <?php if (isset($flash)) ?>
                        <div class="panel alert-danger"><?php echo $flash['error']; ?></div>

                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                       value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="phone" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>

<script src="assets/js/jquery-2.1.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
