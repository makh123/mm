<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 8/10/2018
 * Time: 11:50 PM
 */





if (file_exists("photos/1" . $_FILES["upload"]["name"]))
{
    echo $_FILES["upload"]["name"] . " already exists. ";
}
else
{
    move_uploaded_file($_FILES["upload"]["tmp_name"],
        "images/" . $_FILES["upload"]["name"]);
    echo "Stored in: " . "photos/1" . $_FILES["upload"]["name"];
}
?>