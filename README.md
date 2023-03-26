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
  
  use simplewebcart; ```
 
- Run The Program

  ``` $php artisan serve ```
