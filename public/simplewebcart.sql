create database simplewebcart;
use simplewebcart;

select * from users;
select * from products;
select * from carts;
select * from summaries;
select * from coupons;

insert into products(name,price,stock,imgurl) values('Baju Kokoh',25000,25,'/img/baju-kokoh.webp');
insert into products(name,price,stock,imgurl) values('Cheetos',6500,56,'/img/cheetos.jpg');
insert into products(name,price,stock,imgurl) values('Pepsodent',8500,12,'/img/pepsodent.jpg');

insert into coupons(name) values('Gratis Ongkir Hingga 20rb');
insert into coupons(name) values('Cashback Hingga 100rb');
insert into coupons(name) values('Cashback Hingga 200rb');
insert into coupons(name) values('Discount 20rb');
insert into coupons(name) values('Discount 40rb');