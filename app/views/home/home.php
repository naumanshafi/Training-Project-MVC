<!DOCTYPE html>
<html lang="el">
<head>
    <h1 style="color:blue;text-align:center;position; margin-top: 200px"
    ">CRUD Functions Platform</h1>
    <title>PHP Training</title>
</head>
<body style="background-color:white;">
<form name = "form1" method="post">
    <table style="color:white; margin-left: auto; margin-right: auto;position: relative;top: 10px">
        <tr style="position: relative;top: 10px">
            <td>
                <select id="getcontroller" name="getcontroller">
                    <option value="studentController">Student</option>
                    <option value="teacherController">Teacher</option>
                    <option value="courseController">Course</option>
                </select>
            </td>

            <td>
                <select id="action" name="action">
                    <option value="add">Add</option>
                    <option value="update">Update</option>
                    <option value="delete">Delete</option>
                    <option value="select">Show ALL</option>
                </select>
            </td>
            <td>
                <input style="hover: red:padding: 8px 15px 8px 15px;" type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
</body>
</html>