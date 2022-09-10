<?php
/**
 * This File Implements select for MVC
 *
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th {
            height: 20px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">List Courses</h1>
<?php

//ob_clean();
if (gettype($result)=='array') {
?>
<table style="align-content: center;margin-left: auto; margin-right: auto; margin-top: 50px">
    <tr>
        <th> ID</th>
        <th> Name</th>
        <th>  Credit Hours</th>
        <th> Type of Course</th>
    </tr>
    <?php
    foreach ($result as $row){
        ?>
        <tr>
            <td>
                <?php echo $row["id"] ?>
            </td>
            <td>
                <?php  echo $row["name"] ?>
            </td> <td>
                <?php echo $row["hours"] ?>
            </td>
            <td>
                <?php echo $row["type"] ?>
            </td>
        </tr>
        <?php
    }
    }
    ?>
</table>