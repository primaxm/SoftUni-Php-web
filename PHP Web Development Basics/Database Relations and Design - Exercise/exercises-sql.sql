--Problem 1. 1. Records’ Count
SELECT COUNT(*) AS count FROM wizzard_deposits;

--Problem 1. 2. Longest Magic Wand
SELECT magic_wand_size AS longest_magic_wand FROM wizzard_deposits ORDER BY magic_wand_size DESC LIMIT 1;

--Problem 1. 3. Longest Magic Wand per Deposit Groups
SELECT deposit_group, MAX(magic_wand_size) AS longest_magic_wand FROM wizzard_deposits GROUP BY deposit_group ORDER BY longest_magic_wand ASC, deposit_group ASC;

--Problem 1. 4.* Smallest Deposit Group per Magic Wand Size
SELECT DISTINCT deposit_group
FROM wizzard_deposits GROUP BY deposit_group ORDER BY AVG(magic_wand_size) LIMIT 1;

--Problem 1. 5. Deposits Sum
SELECT DISTINCT deposit_group, SUM(deposit_amount)
FROM wizzard_deposits GROUP BY deposit_group ORDER BY SUM(deposit_amount) ASC;

--Problem 1. 6. Appetizers Count
SELECT COUNT(category_id) FROM products where category_id = '2' AND price > '8';

--Problem 1. 7. Menu Prices
SELECT category_id, ROUND( AVG(price), 2), ROUND(MIN(price), 2), ROUND(MAX(price), 2) FROM products GROUP BY category_id;

--Problem 1. 8. Employee Address
SELECT e.employee_id, e.job_title, e.address_id, a.address_text FROM employees AS e
INNER JOIN addresses AS a ON e.address_id = a.address_id ORDER BY e.address_id ASC LIMIT 5;

--Problem 1. 9. Employee Departments
SELECT e.employee_id, e.first_name, e.salary, d.name FROM employees AS e
LEFT JOIN departments AS d ON e.department_id = d.department_id WHERE e.salary > "15000"
ORDER BY d.department_id DESC LIMIT 5;

--Problem 1. 10. Employees Without Project
SELECT e.employee_id, e.first_name FROM employees AS e
LEFT JOIN employees_projects AS p ON e.employee_id = p.employee_id WHERE p.project_id IS NULL
ORDER BY e.employee_id DESC LIMIT 3;

--Problem 1. 11. *Employee 24
SELECT e.employee_id, e.first_name, if (start_date > '2004-12-31 00:00:00.000000', NULL, p.name) AS project_name FROM employees AS e
LEFT JOIN employees_projects AS ep ON e.employee_id = ep.employee_id
RIGHT JOIN projects AS p ON ep.project_id = p.project_id
WHERE e.employee_id = '24' ORDER BY p.name ASC;

--Problem 1. 12. *Employee Manager

--Problem 1. 13. *Employee Summary
