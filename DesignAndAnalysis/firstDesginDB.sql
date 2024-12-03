Create database if not exists myFirstDesignDB;

use myFirstDesignDB;

Drop table if exists Customers;
Drop table if exists Orders;
Drop table if exists Payments;
Drop table if exists Products;
Drop table if exists OrderDetails;
Drop table if exists Employees;
Drop table if exists Offices;

Create table Customers(
	customerNumber INT primary key,
    customerName varchar(50) NOT null,
    lastName varchar(50) not null,
    firstName varchar(50) not null,
    phone varchar(50) not null,
    addressLine1 varchar(50) not null,
    addressLine2 varchar(50) ,
    city varchar(50) not null,
    state varchar(50) not null,
    postalCode varchar(50) not null,
    country varchar(50) not null,	
    creditLimit decimal(10,2)
);
Create table Orders(
    orderNumber int primary key,
    orderDate date not null,
    requiredDate date not null,
    shippedDate date,
    status varchar(15) not null,
    comments text,
    quantityOrdered int not null,
    customerNumber int,
    foreign key (customerNumber) references Customers(customerNumber)
);
Create table Payments(
	customerNumber int,
    checkNumber varchar(50) not null,
    paymentDate date not null,
    amount decimal(10,2) not null,
    foreign key (customerNumber) references Customers(customerNumber)
);
Create table Products(
	productCode varchar(15) primary key,
    productName varchar(70) not null,
    productScale varchar(10) not null,
    productVendor varchar(50) not null,
    productDescription text not null,
    quantityInStock int not null,
    buyPrice decimal(10,2) not null,
    MSRP decimal(10,2) not null
);
Create table OrderDetails(
	orderNumber int,
    productCode varchar(15),
    quantityOrdered int not null,
    priceEach decimal(10,2) not null,
    primary key (orderNumber,productCode),
    foreign key (orderNumber) references Orders(orderNumber),
    foreign key (productCode) references Products(productCode)
);
Create table Employees(
	employeeNumber int primary key,
    lastName varchar(50) not null,
    firstName varchar(50) not null,
    email varchar(100) not null,
    jobTitle varchar(50) not null
);
Create table Offices(
	officeCode varchar(10) primary key,
    city varchar(50) not null,
    phone varchar(50) not null,
    addressLine1 varchar(50) not null,
    addressLine2 varchar(50),
    state varchar(50),
    country varchar(50) not null,
    postalCode varchar(15) not null
);