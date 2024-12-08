create database if not exists ProductsManagement;
use ProductsManagement;

Drop table if exists product;

Create table product(
id int primary key,
productName varchar(50),
productPrice float,
productDescription varchar(200),
productVendor varchar(100)
);
Insert into product(id,productName,productPrice,productDescription,productVendor)
values
(1,'Chais',18,'10 boxes x 20 bags','AHT'),
(2,'Chang',20,'24 - 12 oz bottles','FPT'),
(3,'Aniseed Syrup',22,'12 - 550 ml bottles','Viettel'),
(4,'Chef Antons Cajun Seasoning',25,'48 - 6 oz jars','VinGroup');