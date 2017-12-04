CREATE DATABASE payroll;

CREATE TABLE title
(
	title_id INT NOT NULL AUTO_INCREMENT,
	base_salary DOUBLE,
	scale_index DOUBLE,
	title_name VARCHAR(50),
	PRIMARY KEY (title_id)
);

CREATE TABLE deduction
(
	deduction_id INT NOT NULL AUTO_INCREMENT,
	emp_inc DOUBLE NOT NULL,
	pension DOUBLE NOT NULL,
	benefit DOUBLE NOT NULL,
	tax DOUBLE NOT NULL,
	PRIMARY KEY (deduction_id)
);

CREATE TABLE employee
(
	employee_id INT NOT NULL AUTO_INCREMENT,
	first_name  VARCHAR(50),
	last_name  VARCHAR(50),
	years_exp INT,
	title_id INT,
	PRIMARY KEY (employee_id),
	FOREIGN KEY (title_id) REFERENCES title(title_id)
);

CREATE TABLE paycheck
(
	paycheck_id INT NOT NULL AUTO_INCREMENT, 
	months INT,
	gross_salary INT,
	deduction_id INT,
	employee_id INT, 
	PRIMARY KEY (paycheck_id),
	FOREIGN KEY (deduction_id) REFERENCES deduction(deduction_id),
	FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
);
