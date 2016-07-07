<?php
    session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Parris Connection</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/4bf83f2a2c.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
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
                        
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">

                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <?php
                    
                    
                    
                ?>
                
                <div class="col-lg-offset-4 col-lg-4" style="padding-top: 25vh;">
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <label for="user">User Name :</label>
                            <input type="text" class="form-control" name="username"/>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password :</label>
                            <input type="password" class="form-control" name="password"/><br/>
                            <input type="submit" class="btn btn-primary pull-right" value="Log In"/>
                            <a href="SignUp.php" class="btn btn-warning">Sign Up</a>
                            <a href="#" class="btn btn-warning">Forgot Password</a>
                        </div>
                    </form> 
                    <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) 
                    {
                        
                        $password = $_POST['password'];
                        $username = $_POST['username'];
                        require_once 'Rules.php';
                        
                        $result = Authenticate($username, $password);
                        if($result->num_rows)
                        {
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $result->close();
                            
                            $salt1 = "qm&h";
                            $salt2 = "pg!@";
                            $token = hash('ripemd128', "$salt1$password$salt2");
//                            print $row[4] . "<br/>";
//                            print $token;
                            if($token == $row[4])
                            {                               
                                print "<p class='text-success'>Login Success</p>";
                                $_SESSION['UserId'] = $row[0];
                                
                                header("Location:home.php");
                            }
                            else
                            {
                                print "<p class='text-danger'>Invalid Username/Password</p>";
                            }
                        }
                        else
                        {
                            die("<p class='text-danger'>Invalid Username/Password</p>");
                        }
                    }
                    ?>
                    
                </div>
            </div>            
        </div>
    </body>
</html>