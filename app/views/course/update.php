<?php
/**
 * This File Implements update for MVC
 *
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h1 style="text-align: center">List Courses</h1>
<form  name = "form1" method="post">

    <input type = "hidden" name = "getcontroller" value = "courseController" required/>

    <input type = "hidden" name = "action" value = "update" required />

    <label> Enter ID To Update:</label>
    <input  style="margin-left: 20px" type = "number" name = "id" value = "" required />

    <input type="submit" style="margin-left: 20px;">
</form>
<?php

if (gettype($result) == 'boolean' && $result == false)
    echo "<script type='text/javascript'>alert('No Record Found');</script>";
else if ($result=='true')
    echo "<script type='text/javascript'>alert('Updated');</script>";
else if (gettype($result)=='array') {
    foreach ($result as $row) {
        ?>

        <form name="form1" method="post">
            <div class="container">
                <table style="margin-top: 20px">
                    <input type="hidden" name="getcontroller" value="courseController" required/>
                    <input type="hidden" name="action" value="update" required/>
                    <tr>
                        <td>
                            <label> ID:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="number" name="id" value="<?php echo $row['id'] ?>"
                                   readonly/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="text" name="name"
                                   value="<?php echo $row['name'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Credit Hours:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="number" name="hours"
                                   value="<?php echo $row['hours'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Type of Course:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="text" name="type"
                                   value="<?php echo $row['type'] ?>" required/>
                        </td>
                    </tr>
                </table>
                <input type="submit" style="margin-left: 100px; margin-top: 10px">
        </form>
        <?php
    }
}
?>
</body>
</html>

