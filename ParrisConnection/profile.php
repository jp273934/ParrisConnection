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
<script src="Scripts/Scripts.js"></script>

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
                     <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>About Me</h3>
                                </div>
                            </div>
                            <div class="panelHeight">
                                <div class="row">
                                    <div class="col-lg-3">                                  
                                        <label>Introduction</label>                                  
                                    </div>
                                    <div class="col-lg-9">
                                        <?php
                                            $intro = GetIntroduction($_SESSION['UserId']);
                                            if($intro->num_rows)
                                            {
                                                $row = $intro->fetch_array(MYSQLI_NUM);
                                                print "<p>" . $row[2] . "</p>";
                                            }
                                            else
                                            {
                                                print "<p>Give a description about yourself</p>";
                                            }
                                        ?>
                                        
                                        <a onclick="ToggleEdit('#introductionform')" class="btn btn-primary">Edit</a>
                                        <form method="post" action="profile.php" id="introductionform" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <br/>
                                                    <textarea class="form-control" name="introductionbox"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <br/>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>                                          
                                        </form>
                                        <?php
                                            if(isset($_POST['introductionbox']))
                                            {
                                                $introduction = $_POST['introductionbox'];
                                                
                                                SaveIntroduction($_SESSION['UserId'], $introduction);                                                                                              
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">    
                                        <br/>
                                        <label>Accomplishments</label>                                   
                                    </div>
                                    <div class="col-lg-9">
                                        <br/>
                                        <?php
                                            $accom = GetAccomplishment($_SESSION['UserId']);
                                            $row = $accom->fetch_array(MYSQLI_NUM);
                                            
                                            if($accom->num_rows && $row[3] != "")
                                            {                                               
                                                print "<p>" . $row[3] . "</p>";
                                            }
                                            else
                                            {
                                                print "<p>Give a description about yourself</p>";
                                            }
                                        ?>
                                                                               
                                        <a onclick="ToggleEdit('#accomplishmentform')" class="btn btn-primary">Edit</a>
                                        <form method="post" action="profile.php" id="accomplishmentform" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-12">                                                   
                                                    <textarea class="form-control" name="accomplishmentbox"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <br/>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>                                           
                                        </form>
                                         <?php
                                            if(isset($_POST['accomplishmentbox']))
                                            {
                                                $accomplishment = $_POST['accomplishmentbox'];
                                                
                                                SaveAccomplishment($_SESSION['UserId'], $accomplishment);                                                                                              
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <br/>
                                        <label>Education</label>                                  
                                    </div>
                                    <div class="col-lg-9">
                                        <br/>
                                        <p>Add education</p>
                                        <button onclick="ToggleEdit('#educationform')" class="btn btn-primary">Edit</button>
                                        <form method="post" action="profile.php" id="educationform" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <br/>
                                                    <textarea class="form-control" name="educationbox"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <br/>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>                                                                                     
                                        </form>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default panelHeight">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Contact Info</h3>
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label>Home</label>                                  
                                </div>
                                <div class="col-lg-10">
                                    <?php
                                            $contact = GetContact($_SESSION['UserId']);
                                            $row = $contact->fetch_array(MYSQLI_NUM);
                                            
                                            if($contact->num_rows && $row[2] != "")
                                            {                                               
                                                print "<p>" . $row[2] . "</p>";
                                            }
                                            else
                                            {
                                                print "<p>Ask for home number</p>";
                                            }
                                        ?>
                                    
                                    <button type="button" class="btn btn-primary" onclick="ToggleEdit('#homeform')">Edit</button>
                                    <form method="post" action="profile.php" id="homeform" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-12">   
                                                <br/>
                                                <input type="text" class="form-control" name="hometextbox"></input>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>                                           
                                    </form>
                                    <?php
                                            if(isset($_POST['hometextbox']))
                                            {
                                                $home = $_POST['hometextbox'];
                                                
                                                SaveHomePhone($_SESSION['UserId'], $home);                                                                                              
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <br/>
                                    <label>Cell</label>                                  
                                </div>
                                <div class="col-lg-10">
                                    <br/>
                                    <?php
                                            $contact = GetContact($_SESSION['UserId']);
                                            $row = $contact->fetch_array(MYSQLI_NUM);
                                            
                                            if($contact->num_rows && $row[3] != "")
                                            {                                               
                                                print "<p>" . $row[3] . "</p>";
                                            }
                                            else
                                            {
                                                print "<p>Ask for mobile number</p>";
                                            }
                                        ?>
                                   
                                    <button type="button" class="btn btn-primary" onclick="ToggleEdit('#cellform')">Edit</button>
                                    <br/>
                                    <form method="post" action="profile.php" id="cellform" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-12">   
                                                <br/>
                                                <input type="text" class="form-control" name="celltextbox"></input>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>                                           
                                    </form>
                                    <?php
                                            if(isset($_POST['celltextbox']))
                                            {
                                                $cell = $_POST['celltextbox'];
                                                
                                                SaveCellPhone($_SESSION['UserId'], $cell);                                                                                              
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <br/>
                                    <label>Email</label>                                  
                                </div>
                                <div class="col-lg-10">
                                    <br/>
                                    <?php
                                            $contact = GetContact($_SESSION['UserId']);
                                            $row = $contact->fetch_array(MYSQLI_NUM);
                                            
                                            if($contact->num_rows && $row[4] != "")
                                            {                                               
                                                print "<p>" . $row[4] . "</p>";
                                            }
                                            else
                                            {
                                                print "<p>Ask for mobile number</p>";
                                            }
                                        ?>
                                    
                                    <button type="button" class="btn btn-primary" onclick="ToggleEdit('#emailform')">Edit</button>
                                    <form method="post" action="profile.php" id="emailform" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-12">   
                                                <br/>
                                                <input type="text" class="form-control" name="emailtextbox"></input>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <br/>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>                                           
                                    </form>
                                     <?php
                                            if(isset($_POST['emailtextbox']))
                                            {
                                                $email = $_POST['emailtextbox'];
                                                
                                                SaveEmail($_SESSION['UserId'], $email);                                                                                              
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Personal Links</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-offset-3 col-lg-9">
                                    <button type="button" class="btn btn-primary" onclick="ToggleEdit('#linkform')">Add Link</button>
                                </div>
                            </div>
                            <form method="post" action="profile.php" id="linkform" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="text" name="secondtypelabel" style="display: none;"/>
                                                 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Link Type
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a id="FaceBookLink" aria-hidden="true" style="color : blue;"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                                    <li><a id="GooglePlusLink"><i class="fa fa-google-plus-square" aria-hidden="true" style="color: red;"></i> Google Plus</a></li>
                                                    <li><a id="YouTubeLink"><i class="fa fa-youtube-square" aria-hidden="true" style="color: red;"></i> You Tube</a></li>                                            
                                                    <li><a id="LinkedInLink"><i class="fa fa-linkedin-square" aria-hidden="true" style="color: blue;"></i> Linked In</a></li>
                                                    <li><a id="TwitterLink"><i class="fa fa-twitter" aria-hidden="true" style="color: cyan;"></i> Twitter</a></li>
                                                    <li><a id="PersonalLink">Personal</a></li>
                                                </ul>
                                                <label id="typelabel"/><br/>
                                                
                                            </div>
                                            
                                            </div>
                                            <div class="dropdown">
                                               
                                        </div>
                                        <div class="form-group">
                                            <label>Link Text</label>
                                            <input type="text" class="form-control" name="texttextbox"/>
                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" class="form-control" name="urltextbox"/>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>                               
                                
                            </form>
                            
                            <?php 
                                    if(isset($_POST['secondtypelabel']))
                                    {
                                        $type = $_POST['secondtypelabel'];
                                        $text = $_POST['texttextbox'];
                                        $url = $_POST['urltextbox'];
                                        
                                        SaveLink($_SESSION['UserId'], $type, $text, $url);
                                    }
                                    
                                    $links = GetLink($_SESSION['UserId']);
                                    $num = $links->num_rows;
                                    
                                    for($i = 0; $i < $num; ++$i)
                                    {
                                        $row = $links->fetch_array(MYSQLI_ASSOC);
                                        
                                        print "<form method='post' action='profile.php'>";
                                        print "<div class='row'>\n";
                                        print "<div class='col-lg-3'>";
                                        print GetLinkIcon($row['Type']) . "\n";
                                        print "<label>" . $row['Type'] . "</label>\n";
                                        print "</div>\n";
                                        print "<div class='col-lg-6'>\n";
                                        print "<a href='" . $row['URL'] . "' target='_blank'>" . $row['Text'] . "</a>\n";
                                        print "</div>\n";
                                        print "<div class='col-lg-1'>\n";
                                        print "<input type='hidden' name='id' value='" . $row['Id'] . "'></input>";
                                        print "<button type='submit' class='btn btn-primary'>Remove</button>";
                                        print "</div>\n";
                                        print "</div>\n";
                      
                                        print "</form>\n";
                                    }
                                    
                                    if(isset($_POST['id']))
                                    {
                                        $id = $_POST['id'];
                                        DeleteLink($id);
                                    }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Career</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Occupation</label>                                  
                                </div>
                                <div class="col-lg-6">
                                    <p>Some text here</p>
                                    <a>Edit</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Status</label>                                   
                                </div>
                                <div class="col-lg-6">
                                    <p>Some text here</p>
                                    <a>Edit</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Employment</label>                                   
                                </div>
                                <div class="col-lg-6">
                                    <p>Some text here</p>
                                    <a>Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 10vh;">
                <div class="col-lg-4">
                   
                </div>
                <div class="col-lg-4">
                    
                </div>  
                <div class="col-lg-4">
                    
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-6">
                    
                </div>
            </div>
        </div>  
    </body>
</html>

