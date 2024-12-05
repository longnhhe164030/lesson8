/*explain SELECT * FROM demo.Products WHERE productName = 'Chais' AND productPrice = 18;*/
DROP VIEW IF EXISTS product_info_view;
create view product_info_view AS
select productCode,productName,productPrice,productStatus
from demo.Products;

create or replace view product_info_view AS
SELECT productCode, productName, productPrice, productStatus, productDescription
FROM demo.Products;


Delimiter $$
Drop procedure if exists GetAllProduct;
create procedure GetAllProduct()
Begin 
	select * From Products;
end $$
Delimiter ;

Delimiter $$
Drop procedure if exists AddProduct;
create procedure AddProduct(in p_id int,in p_productCode varchar(50),in p_productName varchar(100),in p_productPrice float,in p_productAmount float,in p_productDescription varchar(200),in p_productStatus varchar(50))
begin
	insert into Products(id,productCode,productName,productPrice,productAmount,productDescription,productStatus)
    values(p_id,p_productCode,p_productName,p_productPrice,p_productAmount,p_productDescription,p_productStatus);
    end $$
 Delimiter ;   
 
 Delimiter $$
 Drop procedure if exists UpdateProduct;
 create procedure UpdateProduct(in p_id int,in p_productCode varchar(50),in p_productName varchar(100),in p_productPrice float,in p_productAmount float,in p_productDescription varchar(200),in p_productStatus varchar(50))
 begin
	update Products
    set productCode = p_productCode , productName = p_productName , productPrice = p_productPrice, productAmount = p_productAmount , productDescription = p_productDescription , productStatus = p_productStatus
    where id =p_id;
    end $$
Delimiter ;    

Delimiter $$
Drop procedure if exists DeleteProduct;
create procedure DeleteProduct(in p_id int)
begin
	delete from Products 
    where id = p_id;
    end $$
Delimiter ;