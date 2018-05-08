--
-- Setup for the article:
-- https://dbwebb.se/kunskap/kom-igang-med-php-pdo-och-mysql
--

--
-- Create the database with a test user
--
CREATE DATABASE IF NOT EXISTS movies;
GRANT ALL ON movies.* TO user@localhost IDENTIFIED BY "pass";
USE movies;
