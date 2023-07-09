/*
employeeID (INT): Primary key to uniquely identify each employee.
firstName (VARCHAR): The first name of the employee.
lastName (VARCHAR): The last name of the employee.
email (VARCHAR): The email address of the employee.
password (VARCHAR): The password for the employee's account.
role (VARCHAR): The role of the employee (e.g., manager, supervisor, staff, etc.)

*/


CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci