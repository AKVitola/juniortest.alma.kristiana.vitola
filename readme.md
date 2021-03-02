# Project description

I made this exercise as a test for a junior web developer position.

### I had previous experience working with:

- HTML5
- CSS3
- JS
- PHP
- OOP
- MVC
- MySQL
- ajax
- jQuery

### Before this project, I haven't worked with:

- Polymorphism
- PSR standards

**What would I have done differently:** used namespaces to meet PSR standards.

## Setting up project

To work with this project locally you have to have PHP and a local server.

In order to work with db you have to create a file called config.php in the config folder. I have created a sample file. **Copy the example file, rename it, and replace the database credentials.**

### Run the following queries in db

>CREATE DATABASE `scandiweb_junior_test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */

>CREATE TABLE `products` (
> `id` int(10) NOT NULL AUTO_INCREMENT,
> `sku` varchar(15) COLLATE utf8_bin NOT NULL,
> `name` varchar(100) COLLATE utf8_bin NOT NULL,
> `price` decimal(7,2) NOT NULL,
> `type` varchar(20) COLLATE utf8_bin NOT NULL,
> `atributes` json DEFAULT NULL,
> PRIMARY KEY (`id`),
> UNIQUE KEY `sku_unique` (`sku`)
> ) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_bin

### Routes for all project pages

- /products/list
- /products/add
