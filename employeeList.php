<!DOCTYPE html>
<html>
<head>
    <title>Hal O's payroll system</title>
    <style>
        table, th, tr, td { border: solid 2px red;}
    </style>
</head>
<body>
<h1>Employee List</h1>
<hr/>
<hr/>
<br/>
<br/>
<form name="salaryForm" action="SalaryScaleList.php" method="POST">
    <input type="hidden" name="empTitle" value="<?php echo $row['title']; ?>" />
    <input type="hidden" name="empFirstName" value="<?php echo $row['first_name']; ?>" />
    <input type="hidden" name="empLastName" value="<?php echo $row['last_name']; ?>" />
    <button><i class="fa">Scale</i></button>
</form>
<br/>
<br/>
<table>
    <thead>
    <th>Title</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Pay Check</th>
    </thead>
    <tbody>
    <?php
    require_once("dbconn.php");
    $conn = getDbConnection();

    $result = mysqli_query($conn,"SELECT title.title_name AS 'title', employee.first_name AS 'first_name', employee.last_name AS 'last_name'  
                            FROM employee
                            INNER JOIN title ON employee.title_id = title.title_id");
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td>
                <form name="paycheckForm" action="SalaryScaleList.php" method="POST">
                    <input type="hidden" name="empTitle" value="<?php echo $row['title']; ?>" />
                    <input type="hidden" name="empFirstName" value="<?php echo $row['first_name']; ?>" />
                    <input type="hidden" name="empLastName" value="<?php echo $row['last_name']; ?>" />
                    <button><i class="fa">PAYCHECK</i></button>
                </form>
            </td>
        </tr>

    <?php
    endwhile;

    mysqli_close($conn);
    ?>
    </tbody>
</table>
</body>
</html>