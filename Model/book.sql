
/*
   DB Name: library
   TABLE Name:book

Book ID: A unique identifier for each book.
Title: The title of the book.
Author(s): The author(s) of the book.
Publisher: The publisher of the book.
Publication Year: The year the book was published.
Genre: The genre or category of the book (e.g., fiction, non-fiction, science fiction, romance, etc.).
Quantity: show quantity of the book 
Shelf Number: The location or shelf number where the book is placed in the library.
Language: The language in which the book is written.
Total Pages: The total number of pages in the book.
Price: Price for the book


*/



CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `shelf_number` varchar(20) NOT NULL,
  `language` varchar(50) NOT NULL,
  `total_pages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci