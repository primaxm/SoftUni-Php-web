CREATE DATABASE IF NOT EXISTS shop;

USE shop;

CREATE TABLE IF NOT EXISTS categories (
  CAT_ID INT(11) NOT NULL AUTO_INCREMENT,
  CAT_NAME varchar(255) NOT NULL,
  CREATE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(CAT_ID)
);

CREATE TABLE IF NOT EXISTS products (
  PRODUCT_ID INT(11) NOT NULL AUTO_INCREMENT,
  PRODUCT_NAME VARCHAR(255) NOT NULL,
  PRICE DECIMAL(6, 2) DEFAULT 0,
  CAT_ID INT(11),
  DESCRIPTION TEXT,
  CREATE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
  LAST_UPDATE DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(PRODUCT_ID),
  CONSTRAINT PC FOREIGN KEY (CAT_ID) REFERENCES categories(CAT_ID)
);

INSERT INTO categories (CAT_ID, CAT_NAME) VALUES (1, "Drinks"), (2, "Foods"), (3, "Souvenirs"), (4, "Others");


INSERT INTO products (PRODUCT_NAME, PRICE, CAT_ID, DESCRIPTION) VALUES
                  ("Cofee", 4.22, 1, "robusta sort"),
                  ("Coca Cola", 2.50, 1, "regular"),
                  ("Croissant", 3.23, 2, "with chokolate"),
                  ("Magnet", 1.23, 3, NULL),
                  ("Something", 56, 4, NULL);