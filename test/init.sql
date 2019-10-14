CREATE DATABASE cms_test;

USE cms_test;

CREATE TABLE IF NOT EXISTS posts (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  coverImage VARCHAR(255) NOT NULL,     
  publicationDate DATE NOT NULL,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  summary TEXT NOT NULL,
  content MEDIUMTEXT NOT NULL,
  PRIMARY KEY (id)
);







