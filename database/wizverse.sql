-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 07:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wizverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'A popular programming language that is easy for beginners to learn.', '2024-04-06 05:23:59'),
(2, 'Java', 'A programming language that is in demand and has a steep learning curve.', '2024-04-06 19:38:17'),
(3, 'C++', 'A programming language that is in demand and is inspired by CLU, the first language to introduce object-oriented programming.', '2024-04-06 05:23:59'),
(4, 'Rust', 'A programming language that focuses on safety and performance and is used by companies like Mozilla, Dropbox, Microsoft, and Red Hat.', '2024-04-06 19:38:17'),
(5, 'PHP', 'PHP is a general-purpose scripting language geared towards web development.', '2024-04-06 19:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `thread_id`, `comment_by`, `comment_time`) VALUES
(8, 'Just use `mysql_connect()`, it\'s super easy!', 27, 9, '2024-04-08 20:13:09'),
(9, 'No, `mysql_connect()` is deprecated. Use `mysqli_connect()` or PDO instead.', 27, 1, '2024-04-08 20:13:39'),
(10, 'Or even better, use ORM libraries like Eloquent or Doctrine for database interactions!', 27, 8, '2024-04-08 20:13:56'),
(11, 'Just use `$_POST` to get form data, it\'s that simple!\"\r\n', 29, 1, '2024-04-08 20:15:10'),
(12, 'No, you should always validate and sanitize user input to prevent security vulnerabilities. Use functions like `htmlspecialchars()` and prepared statements.', 29, 9, '2024-04-08 20:15:22'),
(13, 'Handling errors in SQL queries is crucial for ensuring the reliability and robustness of your PHP application. While executing SQL queries, various issues can arise, such as syntax errors, connection failures, or data integrity constraints violations. Implementing proper error handling mechanisms not only helps in diagnosing and troubleshooting issues but also enhances the overall user experience by providing meaningful feedback in case of failures.\r\n\r\nOne effective approach to error handling is to use try-catch blocks around your SQL query execution code. Within the try block, you can execute the SQL query and monitor for any exceptions that might occur. In case of an exception, the catch block can capture the error details, allowing you to log the error, display a user-friendly message, or take appropriate corrective actions based on the specific error scenario.\r\n\r\nFor example, consider the following code snippet:\r\n\r\nphp\r\nCopy code\r\ntry {\r\n    // Attempt to execute the SQL query\r\n    $result = mysqli_query($conn, $sql);\r\n\r\n    // Check if the query execution was successful\r\n    if (!$result) {\r\n        throw new Exception(mysqli_error($conn));\r\n    }\r\n\r\n    // Process the query result\r\n    // ...\r\n\r\n} catch (Exception $e) {\r\n    // Log the error\r\n    error_log(\'SQL Error: \' . $e->getMessage());\r\n\r\n    // Display a user-friendly error message\r\n    echo \'An unexpected error occurred. Please try again later.\';\r\n}\r\nIn this example, the try block contains the code responsible for executing the SQL query using the mysqli_query function. If the query execution fails, the mysqli_error function retrieves the error message, which is then encapsulated within a custom Exception object and thrown. The catch block catches this exception, logs the error message using error_log, and displays a user-friendly error message to the user.\r\n\r\nAdditionally, you can leverage PHP\'s built-in error reporting functions, such as error_reporting and mysqli_report, to customize error handling behavior and ensure that errors are appropriately logged and reported.\r\n\r\nBy implementing robust error handling mechanisms in your PHP application, you can effectively detect, diagnose, and resolve SQL-related issues, thereby improving the overall reliability and resilience of your application. Remember to test your error handling code thoroughly to ensure that it functions as expected in various error scenarios.', 29, 8, '2024-04-08 20:25:10'),
(14, 'Same question', 3, 5, '2024-04-08 20:31:55'),
(15, 'Need help too', 18, 3, '2024-04-08 22:10:58'),
(16, 'Nevermind', 18, 1, '2024-04-13 13:11:49'),
(25, '&lt;script&gt; alert(\"nahi\"); &lt;/script&gt;', 11, 1, '2024-04-13 18:24:27'),
(27, '&lt;script&gt; alert(\"hello\"); &lt;/script&gt;\r\n', 11, 1, '2024-04-13 18:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `inquirer_name` varchar(30) NOT NULL,
  `inquirer_email` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `query_issue_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_body` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_body`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'How do I iterate over a dictionary in Python?', 'I\'m relatively new to Python and I\'m struggling with iterating over dictionaries. Can someone explain how I can loop through the key-value pairs in a dictionary using a `for` loop? Additionally, are there any built-in functions or methods that make dictionary iteration easier?\r\n\r\n', 1, 5, '2024-04-07 05:39:31'),
(2, 'What\'s the difference between `__str__` and `__repr__` in Python?', 'I\'ve come across the `__str__` and `__repr__` methods in Python, but I\'m confused about their differences and when to use each one. Can someone provide a clear explanation of the distinctions between these two methods, along with examples of their typical usage scenarios?\r\n\r\n', 1, 6, '2024-04-07 05:39:31'),
(3, 'How do I handle exceptions in Python?', 'Exception handling in Python seems like a crucial concept, but I\'m not entirely sure how to implement it effectively in my code. Could someone provide me with a comprehensive overview of exception handling in Python, including best practices and common pitfalls to avoid? Additionally, are there any advanced techniques or patterns for handling exceptions in more complex scenarios?', 1, 6, '2024-04-07 05:39:31'),
(7, 'How can I convert a string to an integer in Java?', 'I have a string containing a numeric value, and I need to convert it to an integer for arithmetic operations. What\'s the best way to achieve this in Java? Are there any potential pitfalls or edge cases I should be aware of when performing this conversion?\r\n\r\n', 2, 8, '2024-04-07 06:04:48'),
(9, 'How do I read input from the console in Java?', 'I\'m writing a Java program that requires user input from the console. What\'s the best way to read input from the console in Java? Are there any standard libraries or classes that I should be using for this purpose? Additionally, how can I handle different types of input data, such as integers, strings, or characters?', 2, 9, '2024-04-07 06:04:48'),
(10, 'What are lambda expressions in Java?', 'I\'ve heard about lambda expressions in Java, but I\'m not entirely sure how they work or when to use them. Can someone provide a clear explanation of what lambda expressions are, along with examples of their syntax and typical use cases? Additionally, are there any advantages or limitations to using lambda expressions compared to traditional anonymous inner classes?\r\n\r\n', 2, 2, '2024-04-07 06:04:48'),
(11, 'How do I handle file I/O operations in Java?', 'I need to perform file I/O operations in my Java program, such as reading from and writing to files. What are the best practices for handling file I/O in Java? Can someone provide examples of how to perform common file operations, such as reading lines from a text file, writing data to a file, or working with binary files? Are there any libraries or classes in the Java standard library that I should be using for file I/O?\r\n\r\n', 2, 4, '2024-04-07 06:04:48'),
(18, 'How can I split a string into tokens in C++?', 'I have a string containing multiple words separated by spaces, and I need to split it into individual tokens. What\'s the best way to achieve this in C++? Are there any standard library functions or classes that I can use for tokenization? Additionally, how can I handle different types of delimiters or whitespace characters?\r\n\r\n', 3, 1, '2024-04-07 06:10:20'),
(27, 'How can I connect to a MySQL database using PHP?', 'I need to establish a connection to a MySQL database from my PHP application, but I\'m not sure how to do it. What\'s the best way to connect to a MySQL database using PHP? Are there any standard libraries or classes that I should be using for this purpose? Additionally, how can I handle errors and exceptions when connecting to the database?\r\n\r\n', 5, 4, '2024-04-07 06:14:40'),
(28, 'What\'s the difference between `require` and `include` in PHP?', 'I\'m working on a PHP project and I\'m not entirely sure when to use `require` and `include`. Can someone explain the differences between these two statements in PHP, including their behavior, performance implications, and typical use cases? Additionally, are there any specific scenarios where one statement is preferred over the other?\r\n\r\n\r\n\r\n', 5, 4, '2024-04-07 06:14:40'),
(29, 'How do I handle form submissions in PHP?', 'I have a form on my website that users can submit, and I need to process the form data using PHP. What\'s the best way to handle form submissions in PHP? Can someone provide a step-by-step guide or code example on how to retrieve and validate form data, and then perform actions based on the submitted data? Additionally, how can I prevent security vulnerabilities such as SQL injection or cross-site scripting (XSS) when processing form data?\r\n\r\n', 5, 4, '2024-04-07 06:14:40'),
(30, 'What are sessions and how do they work in PHP?', 'I\'m relatively new to PHP and I\'m trying to understand how sessions work. Can someone provide a clear explanation of what sessions are and how they\'re used in PHP? Additionally, how do sessions differ from cookies, and what are the advantages of using sessions for managing user state in a web application?\r\n\r\n', 5, 4, '2024-04-07 06:14:40'),
(31, 'How can I upload files in PHP?', 'I need to implement file uploads in my PHP application, allowing users to upload files such as images or documents. What\'s the best way to handle file uploads in PHP? Can someone provide a step-by-step guide or code example on how to create a file upload form, validate uploaded files, and move them to a secure location on the server? Additionally, how can I prevent security vulnerabilities such as file upload exploits or denial-of-service attacks when handling file uploads?\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 5, 4, '2024-04-07 06:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'hassansamo609@gmail.com', '$2y$10$tTt65X6jmbA/WOlyKigf0uKvzb4VL6LVlPgNKreT5Jx1rLZxag3XG', '2024-04-09 21:52:37'),
(2, 'aamir.magsi@hotmail.com', '$2y$10$RPwy/3/7ES.q4ZJRX1429OdPe.JO3gkPp5mQDt.qO4S2MQ3UmMqQa', '2024-04-09 21:53:30'),
(3, 'Abdul.kabeer245@gmail.com', '$2y$10$R.GNqY/TUU2/wkGj3CKVIegyu/X7tbdBbwsQeZiPLddI1iPDimKh.', '2024-04-09 21:53:54'),
(4, 'kashifTurk@yahoo.com', '$2y$10$LToHU0b0t2mc7IVir/4j3OdcXzrImktbCmEEJ9UHkODv2ElH2vhq2', '2024-04-09 21:58:05'),
(5, 'gujrati.h@gmail.com', '$2y$10$R2BeuZJdrphCmv/uxZZ7/.py5AubiQN1MzHfaP0ZOfECOZuj13fdi', '2024-04-13 12:03:22'),
(6, 'nabeel.mughal.007@outlook.com', '$2y$10$1z3XMY4Lv7i6XxpVbt368uPD1b2H.qrksqmNcMz3fLOYqi4ywcJSq', '2024-04-13 12:04:01'),
(7, 'rajat_da1a1@gmail.com', '$2y$10$7W9qJcxqY0ju.1LJa36JveVv.ViGSlOIq62zUgsqdYD6x2ZpohLB2', '2024-04-13 12:04:57'),
(8, 'jordan.peterson@yahoo.com', '$2y$10$/ZlynJv3BMpRp66Uovg97uIypv75J.FAQe52mvg0HqZk3udORUIoC', '2024-04-13 12:05:23'),
(9, 'prakhar.gupta1@gmail.com', '$2y$10$Rsmvn1aLY9eMC220SsZmOepmSBpFFjxS8E.9kLkDESzoFUFPQHrEa', '2024-04-13 12:06:01'),
(10, 'taha_tehseen@hotmail.com', '$2y$10$3ylKdnUsIs/g0Kg2zH92eeryFfYN1iUTfuAMT0KoUCOhfzhKUJb/2', '2024-04-13 12:06:44'),
(11, 'admin@admin.com', '$2y$10$0K9jsBL1boVwaexypM/z1etSEOIrURwq.kZuQguwjY/dL/gEUFk5m', '2024-04-14 18:31:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_body`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
