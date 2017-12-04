/*
Gross Salary = base salary + (base salary * scale index * years exp)
deduction ID 1 if 35,000 or less 
deduction ID 2 if 35,000 to 55,000
deduction ID 3 if 55,000 or more
Gross monthly Salary = (base salary + (base salary * scale index * years exp)) / 12
*/

INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 6718.75, 3, 1);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 5330, 3, 2);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 3933.33, 2, 3);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 7187.5, 3, 4);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 4033.33, 2, 5);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 5220, 3, 6);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 7093.75, 3, 7);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 5000, 3, 8);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 3733.33, 2, 9);
INSERT INTO paycheck (months, gross_salary, deduction_id, employee_id)
VALUES (MONTH(SYSDATE()), 4333.33, 2, 10);
