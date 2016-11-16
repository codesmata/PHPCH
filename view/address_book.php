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
           <!-- <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout"> Logout</a></li>
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
                        <li class="active"><a href="#">Contacts</a></li>
                        <li><a href="/add">New Contact</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <?php if (! is_null($book) && ! empty($book)) {?>
                        <table class="table table-bordered table-responsive">
                            <caption>Contacts</caption>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $bookCount = count($book); for ($i = 0; $i < $bookCount; $i++) {?>
                                <tr>
                                    <td>
                                        <?php echo $book[$i]["NAME"];?>
                                    </td>
                                    <td>
                                        <?php echo $book[$i]["EMAIL"];?>
                                    </td>
                            <?php }?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                    <p>
                        You have are no contacts for the moment.
                    </p>
                    <?php } ?>
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
