<?php
/**
 * This File Implements select for MVC
 *
 */
?>
<?php

if ($result)
    echo "<script type='text/javascript'>alert('$result');</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h1>Delete Teacher</h1>
<form  name = "form1" method="post" action="<?php $_SERVER['index.php'];?>">
    <div class = "container">
        <div class = "form_group">
            <input type = "hidden" name = "getcontroller" value = "teacherController" required/>
        </div>
        <div class = "form_group">
            <input type = "hidden" name = "action" value = "delete" required />
            <div class = "form_group">
                <label> ID:</label>
                <input  style="margin-left: 20px" type = "number" name = "id" value = "" required />
            </div>
            <div class = "form_group">
                <input type="submit" style="margin-left: 100px; margin-top: 10px">
            </div>
        </div>
</form>
</body>
</html>