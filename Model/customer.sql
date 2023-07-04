
--Sql code for customer table

CREATE TABLE `library_management`.`customer` 
(`cus_id` INT NOT NULL AUTO_INCREMENT , 
`username` VARCHAR(100) NOT NULL , 
`first name` VARCHAR(25) NOT NULL , 
`last name` VARCHAR(25) NOT NULL , 
`dob` DATE NOT NULL ,
 `password` VARCHAR(100) NOT NULL , 
 `picture` VARCHAR(255) NOT NULL , 
 PRIMARY KEY (`cus_id`)) 
 ENGINE = InnoDB; 

--Adding email in the customer database table
 ALTER TABLE `customer` ADD `email` VARCHAR(100) NOT NULL AFTER `picture`; 

--Updating First Name in the customer database table
 ALTER TABLE `customer` CHANGE `first name` `firstname` VARCHAR(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL; 

--Updating Last Name in the customer database table
 ALTER TABLE `customer` CHANGE `last name` `lastname` VARCHAR(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL; 
--Updating Password in the customer database table
 ALTER TABLE `customer` CHANGE `password` `cpassword` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL; 
