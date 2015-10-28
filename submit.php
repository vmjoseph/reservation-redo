<?php

$firstname = ucfirst(trim($_POST["firstname"]));
$lastname= ucfirst(trim($_POST["lastname"]));
$cwid= trim($_POST["cwid"]);
$year= $_POST["year"];
$laundry= ($_POST["laundry"]);
$sservices= ($_POST["sservices"]);
$kitchen=($_POST["kitchen"]);
$residence= ($_POST["residence"]);
#Placing each group of residence halls (halls for seniors/juniors, halls for freshman ect) into an array
$seniorJunior= array("newfulton", "lowerwest","upperwest","fulton","talmadge");
$freshman=array("sheahan","leo","marian","champagnat");
$sophomore=array("midrise","gartland","foy","uppernew","lowernew");

echo "<table>
        <tr><td>Name: </td><td>$firstname $lastname</td</tr>
        <tr><td>Year: </td><td>".ucfirst($year)."</td</tr>
        <tr><td>Residence Hall: </td><td>".ucfirst($residence)."</td</tr>
        <tr><td>Preferences: </td><td>Preference</td><td>Yes/No</td></tr>
        <tr><td></td><td> Kitchen: </td><td>$kitchen</td></tr>
        <tr><td></td><td> Laundry: </td><td>$laundry</td></tr>
        <tr><td></td><td>  Special Services: </td><td>$sservices</td></tr>
        </table>";
?>