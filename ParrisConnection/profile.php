<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parris Connection</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/Styles.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/4bf83f2a2c.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="font-size: 2em;">Parris Connection</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
                        <li class="active"><a href="profile.php">Profile<span class="sr-only">(current)</span></a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">

                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php                            
                            require_once 'Rules.php';
                            
                           
                             if(isset($_SESSION['UserId']))
                            {
                                $useraccount = GetUserAccount($_SESSION['UserId']);

                                if($useraccount->num_rows)
                                {
                                    $row = $useraccount->fetch_array(MYSQLI_NUM);
                                    $useraccount->close();

                                    print "<a><li>" . $row[2] . " " . $row[1] . "</a><li>" ;
                                }
                            }
                        ?>
                        <li><a href="index.php">Logout</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row" style="padding-top: 10vh;">
                <div class="col-lg-4">
                    <div class="panel panel-default panelHeight">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Introduction</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Accomplishments</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Home</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Cell</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Email</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Occupation</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Status</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Employment</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Education</h3>
                                    <p>Some text here</p>
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            <div class="item">
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            ...
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </body>
</html>

