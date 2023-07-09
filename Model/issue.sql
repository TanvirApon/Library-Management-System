/*

 Book issue SQL

*/



CREATE TABLE `issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `customer_Name` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci