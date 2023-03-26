<h1>Tugas Simple Web Cart (PCS Group Indonesia)</h1>

<h2>How to run local</h2>

- Clone to directory

  ``` $git clone github.com/fauzilax/simple-web-cart.git ```

- Change directory
 
  ``` cd simple-web-cart```
  
- Migrate table

  ``` $php artisan migrate ```
  
- Open SQL Script and execute each sql code in DBeaver or Mysql WorkBench

  ``` open script at simple-web-cart/public/simplewebcart.sql ```
  
  or you can manualy execute from terminal
  ```
  
  create database simplewebcart;
  
  use simplewebcart;   
  
  insert into products(name,price,stock,imgurl) values('Baju Kokoh',25000,25,'/img/baju-kokoh.webp');
  
  insert into products(name,price,stock,imgurl) values('Cheetos',6500,56,'/img/cheetos.jpg');
  
  insert into products(name,price,stock,imgurl) values('Pepsodent',8500,12,'/img/pepsodent.jpg');
  
  insert into coupons(name) values('Gratis Ongkir Hingga 20rb');
  
  insert into coupons(name) values('Cashback Hingga 100rb');
  
  insert into coupons(name) values('Cashback Hingga 200rb');
  
  insert into coupons(name) values('Discount 20rb');
  
  insert into coupons(name) values('Discount 40rb');
  
  ```
 
- Run The Program

  ``` $php artisan serve ```
