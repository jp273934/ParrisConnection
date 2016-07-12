<?php
require_once 'Rules.php';

function GetProfileImage($userid) 
{
    $query = "SELECT * FROM About WHERE UserId='$userid'";
    return GetData($query);
}

function SaveProfileImage($userid, $image) 
{
    $query = "";

    if (GetProfileImage($userid)->num_rows) {
        $query = "UPDATE About SET ProfileImage='$image' WHERE USERId='$userid'";
    } else {
        $query = "INSERT INTO About (UserId, ProfileImage) VALUES('$userid', '$image')";
    }

    SaveData($query);
}

?>

