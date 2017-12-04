<!DOCTYPE html>
<html>
<head>
    <title>Hal O's payroll system</title>
    <style>
        table, th, tr, td { border: solid 2px red;}
    </style>
</head>
<body>
<h1>Salary Scale</h1>
<hr/>
<hr/>

<br/>
<br/>
<table>
    <thead>
    <th>Title</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Salary</th>
    </thead>
    <tbody>
    <?php
    require_once("dbconn.php");
    $conn = getDbConnection();

    $result = mysqli_query($conn,"SELECT title.title_name AS 'title',
                                            title.base_salary AS 'base_salary',
                                            title.scale_index AS 'scale_index', 
                                            employee.first_name AS 'first_name', 
                                            employee.last_name AS 'last_name',  
                                            employee.years_exp AS 'years_exp'
                            FROM employee
                            INNER JOIN title ON employee.title_id = title.title_id");
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    while($row = mysqli_fetch_assoc($result)):
        $salary = ($row['base_salary'] + ($row['base_salary'] * $row['scale_index']
                * $row['years_exp'])/12);
        ?>

        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $salary ?></td>
        </tr>

    <?php
    endwhile;

    mysqli_close($conn);
    ?>
    </tbody>
</table>
<br>
<br>
<form name="employeeForm" action="employeeList.php" method="POST">
    <button><i class="fa">Go Back</i></button>
</form></td>
</body>
</html>