SELECT e.employee_id, e.first_name, e.manager_id, e.first_name FROM employees AS e 
LEFT JOIN departments AS d ON e.manager_id = d.manager_id
WHERE e.manager_id = '7' OR e.manager_id = '3' GROUP BY e.manager_id ORDER BY e.first_name ASC;

