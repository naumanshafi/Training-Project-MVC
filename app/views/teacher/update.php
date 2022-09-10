<?php
/**
 * This File Implements select for MVC
 *
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h1 style="text-align: center">Update Teacher</h1>
<form  method="post">

    <input type = "hidden" name = "getcontroller" value = "teacherController" required/>

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
                    <input type="hidden" name="getcontroller" value="teacherController" required/>
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
                            <label> First Name:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="text" name="f_name"
                                   value="<?php echo $row['f_name'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Last Name:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="text" name="l_name"
                                   value="<?php echo $row['l_name'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Age:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="number" name="age"
                                   value="<?php echo $row['age'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Contact Number:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="number" name="contact"
                                   value="<?php echo $row['contact'] ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Department:</label>
                        </td>
                        <td>
                            <input style="margin-left: 48px" type="text" name="department"
                                   value="<?php echo $row['department'] ?>" required/>
                        </td>
                    </tr>
                </table>
                <input type="submit" style="margin-left: 100px; margin-top: 10px">
        </form>
        <?php
    }
}
    ?>
</table>
</body>
</html>

