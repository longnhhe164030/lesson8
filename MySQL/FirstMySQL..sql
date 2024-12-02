# SELECT customerName, phone, city, country FROM classicmodels.customers;
# Select * from classicmodels.customers where customerName = 'Atelier Graphique';
#SELECT * FROM classicmodels.customers WHERE customerName LIKE '%A%';
Select * from classicmodels.customers where city in ('Nantes','Las Vegas','Warszawa','NYC');    
