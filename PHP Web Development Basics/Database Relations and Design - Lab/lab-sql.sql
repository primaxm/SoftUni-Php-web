--1. Departments Info
SELECT department_id, COUNT(*) AS 'Number of employees' FROM employees GROUP BY department_id ORDER BY department_id ASC, 'Number of employees' ASC;


--2. Average Salary
SELECT department_id, ROUND(AVG(salary), 2) AS 'Average Salary' FROM employees GROUP BY department_id;

--3. Addresses with Towns
SELECT e.first_name, e.last_name, name, a.address_text fROM employees AS e
JOIN addresses AS a ON e.address_id = a.address_id
JOIN towns AS t ON a.town_id = t.town_id
ORDER BY e.first_name ASC, e.last_name ASC LIMIT 5;

--4. Sales Employee
SELECT e.employee_id, e.first_name, e.last_name, d.name AS department_name FROM employees AS e
INNER JOIN departments AS d ON e.department_id = d.department_id
WHERE d.name = 'sales' ORDER BY e.employee_id DESC;

--5.Employees Hired After
SELECT e.first_name, e.last_name, e.hire_date, d.name AS dept_name FROM employees AS e
JOIN departments AS d ON e.department_id = d.department_id
WHERE (e.hire_date >= '1999-01-01 00:00:00') AND (d.name = 'Sales' OR d.name = 'Finance') ORDER BY e.hire_date ASC;


--6.Countries without any Mountains
SELECT COUNT(*) AS country_count FROM countries AS c LEFT JOIN mountains_countries AS mc
ON c.country_code = mc.country_code WHERE mc.mountain_id IS NULL;

--7.Min Average Salary
SELECT AVG(salary) AS min_average_salary FROM employees GROUP BY department_id ORDER BY min_average_salary ASC LIMIT 1;