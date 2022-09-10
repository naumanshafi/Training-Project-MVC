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
<h1 style="text-align: center">List Teachers</h1>
<?php

if (gettype($result)=='array') {
?>
<table style="align-content: center;margin-left: auto; margin-right: auto; margin-top: 50px">
    <tr>
        <th> ID</th>
        <th> First Name</th>
        <th> Last Name</th>
        <th> Age</th>
        <th> Contact Number</th>
        <th> Department</th>
    </tr>
    <?php
    foreach ($result as $row){
        ?>
            <tr>
                <td>
                    <?php echo $row["id"] ?>
                </td> <td>
                    <?php echo $row["f_name"] ?>
                </td> <td>
                    <?php  echo $row["l_name"] ?>
                </td> <td>
                    <?php echo $row["age"] ?>
                </td>
                <td>
                    <?php echo $row["contact"] ?>
                </td>
                <td>
                    <?php echo $row["department"] ?>
                </td>
            </tr>

        <?php
    }
    }
    ?>
</table>