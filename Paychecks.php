<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal O's payroll system</title>
</head>
<body>
    <?php
    require_once("dbconn.php");
    $conn = getDbConnection();
    $emp_id = $_POST['empId'];
    $result = mysqli_query($conn,"SELECT paycheck.gross_salary AS 'gross_salary',
                                                paycheck.months AS 'month',
                                                deduction.emp_inc AS 'insurance', 
                                                deduction.pension AS 'pension', 
                                                deduction.benefit AS 'benefit',  
                                                deduction.tax AS 'tax'                                            
                                FROM deduction
                                INNER JOIN paycheck ON paycheck.deduction_id = deduction.deduction_id
                                WHERE deduction.deduction_id = 
                                (SELECT deduction_id FROM paycheck where employee_id = $emp_id) AND (employee_id = $emp_id)"
                            );
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($result)):
            $gross_salary = $row['gross_salary'];
            $month = $row['month'];
            $insurance = $gross_salary * $row['insurance'];
            $pension = $gross_salary * $row['pension'];
            $benefit = $gross_salary * $row['benefit'];
            $tax = $gross_salary * $row['tax'];
            $net_salary = $gross_salary - ($inslurance + $pension + $benefit + $tax);
            setlocale(LC_MONETARY, 'en_US');
    endwhile;
    ?>

    <h1>Monthly Paycheck</h1>
    <hr>
    <hr>
    <p>First Name: <input type="text" value="<?php echo $_POST['empFirstName'] ?>" disabled/>
        Last Name: <input type="text" value="<?php echo $_POST['empLastName'] ?>" disabled/></p>
    <h3>Pay Roll</h3>
    <hr/>
    <p>Month: <input type="text" name="month" value="<?php echo $month ?>" /></p>
    <p>INSURANCE: <input type="text" name="insurance" value="<?php echo money_format('%(#10n', $insurance) ?>" /></p>
    <p>PENSION: <input type="text" name="pension" value="<?php echo money_format('%(#10n', $pension) ?>" /></p>
    <p>TAX: <input type="text" name="tax" value="<?php echo money_format('%(#10n', $tax) ?>" /></p>
    <p>BENEFITS: <input type="text" name="benefits" value="<?php echo money_format('%(#10n', $benefit) ?>" /></p>
    <p>GROSS SALARY: <input type="text" name="gross_salary" value="<?php echo money_format('%(#10n', $gross_salary) ?>" /></p>
    <hr/>
    <p>NET SALARY: <input type="text" name="net_salary" value="<?php echo money_format('%(#10n', $net_salary) ?>" /></p>
    <br>
    <br>
    <form name="employeeForm" action="employeeList.php" method="POST">
        <button><i class="fa">Go Back</i></button>
    </form></td>
</body>
</html>