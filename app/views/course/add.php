<?php
/**
 * This File Implements addd for MVC
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
<h1 style="text-align: center; margin-top: 100px">Add Course </h1>
<form style="text-align: center" name = "form1" method="post">
        <table style="align-content: center;margin-left: auto; margin-right: auto; margin-top: 50px">
            <input type = "hidden" name = "getcontroller" value = "courseController" required/>
            <input type = "hidden" name = "action" value = "add" required />

            <tr>
                <td>
                    <label> ID:</label>
                </td>
                <td>
                    <input style="margin-left: 48px" type = "number" name = "id" value = "" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Name:</label>
                </td>
                <td>
                    <input style="margin-left: 48px" type = "text" name = "name" value = "" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label> Credit Hourse:</label>
                </td>
                <td>
                    <input style="margin-left: 48px" type = "number" name = "hours" value = "" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label> Type of Course:</label>
                </td>
                <td>
                    <input style="margin-left: 48px" type = "text" name = "type" value = "" required/>
                </td>
            </tr>
        </table>
        <input type="submit" style="margin-left: 100px; margin-top: 10px">
</form>

</body>
</html>