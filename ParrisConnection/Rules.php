<?php
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die($conn->connect_error);   
        
        function ConnectToDB($query)
        {
           global $conn;
           $result = $conn->query($query);
           if(!$result) die($conn->error);
           
           return $result;
        }
        
        function GetData($query) 
        {    
           return ConnectToDB($query);
        }
              
        function SaveData($query)
        {
            ConnectToDB($query);
        }
        
        function RedirectPage($page)
        {
            header("Location : " . $page);
        }
        
        function Authenticate($username, $password)
        {
            $salt1 = "qm&h";
            $salt2 = "pg!@";
            $token = hash('ripemd128', "$salt1$password$salt2");
            $query = "SELECT * FROM Users WHERE UserName='$username' AND Password='$token'";
            return GetData($query);
        }
        
        function RegisterNewUser($firstName, $lastName, $username, $password)
        {
            $salt1 = "qm&h";
            $salt2 = "pg!@";
            $token = hash('ripemd128', "$salt1$password$salt2");
            $query = "INSERT INTO Users (LastName, FirstName, UserName, Password, IsApproved, IsAdmin) VALUES('$lastName', '$firstName', '$username', '$token', '0', '0')";
            SaveData($query);
        }
        
        function GetUserAccount($userid)
        {          
            $query = "SELECT * FROM Users WHERE Id='$userid'";
            return GetData($query);
        }
        
        function PostMessage($userid, $message)
        {
            $query = "INSERT INTO Messages (UserId, Message) VALUES ('$userid', '$message')";
            SaveData($query);
        }
        
        function GetMessages()
        {
            $query = "SELECT * FROM Messages";
            return GetData($query);
        }
        
        function GetIntroduction($userid)
        {
            $query = "SELECT * FROM About WHERE UserId='$userid'";
            return GetData($query);
        }
        
        function SaveIntroduction($userid, $intro)
        {
            $query = "";
            
            if(GetIntroduction($userid)->num_rows)
            {
                $query = "UPDATE About SET Introduction='$intro' WHERE USERId='$userid'";
            }
            else
            {
                $query = "INSERT INTO About (UserId, Introduction) VALUES('$userid', '$intro')";               
            }
            
            SaveData($query);
        }
        
        function GetAccomplishment($userid)
        {
            $query = "SELECT * FROM About WHERE UserId='$userid'";
            return GetData($query);
        }
        
        function SaveAccomplishment($userid, $accomplishment)
        {
            $query = "";
            
            if(GetIntroduction($userid)->num_rows)
            {
                $query = "UPDATE About SET Accomplishments='$accomplishment' WHERE USERId='$userid'";
            }
            else
            {
                $query = "INSERT INTO About (UserId, Accomplishments) VALUES('$userid', '$accomplishment')";               
            }
            
            SaveData($query);
        }
        
        function GetContact($userid)
        {
            $query = "SELECT * FROM Contact WHERE UserId='$userid'";
            return GetData($query);
        }
        
        function SaveHomePhone($userid, $home)
        {
            $query = "";
            
            if(GetContact($userid)->num_rows)
            {
                $query = "UPDATE Contact SET Home='$home' WHERE USERId='$userid'";
            }
            else
            {
                $query = "INSERT INTO Contact (UserId, Home) VALUES('$userid', '$home')";               
            }
            
            SaveData($query);
        }
        
        function SaveCellPhone($userid, $cell)
        {
            $query = "";
            
            if(GetContact($userid)->num_rows)
            {
                $query = "UPDATE Contact SET Cell='$cell' WHERE USERId='$userid'";
            }
            else
            {
                $query = "INSERT INTO Contact (UserId, Cell) VALUES('$userid', '$cell')";               
            }
            
            SaveData($query);
        }
        
        function SaveEmail($userid, $email)
        {
            $query = "";
            
            if(GetContact($userid)->num_rows)
            {
                $query = "UPDATE Contact SET Email='$email' WHERE USERId='$userid'";
            }
            else
            {
                $query = "INSERT INTO Contact (UserId, Email) VALUES('$userid', '$email')";               
            }
            
            SaveData($query);
        }
?>

