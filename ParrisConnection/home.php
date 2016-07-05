<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parris Connection</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Profile</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">

                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>Jeremy Parris</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">


            <div class="row" >
                <div class="col-lg-offset-4 col-lg-4" style="padding-top: 10vh;">
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <textarea cols="50" class="form-control">Share Something</textarea>
                            <br/>
                            <input type="submit" class="btn btn-primary pull-right" value="Post"/>
                            <br/><br/>
                            <hr/>
                        </div>
                    </form>

                </div>
                <div class="col-lg-4" style="padding-top: 7.5vh;">
                    <h3>Friends Online</h3>
                    <hr/>
                    <label>Friend 1</label><br/>
                    <label>Friend 1</label><br/>
                    <label>Friend 1</label><br/>
                    <label>Friend 1</label><br/>
                    <label>Friend 1</label><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4">                  
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Some kind of message here</p>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Some kind of message here</p>
                        </div>
                    </div>
                </div>
                
            </div>



        </div>
        <?php
        // put your code here
        ?>
        
    </body>
</html>
