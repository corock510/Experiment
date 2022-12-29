# Experiment

## 環境設定、ローカル立ち上げ
$ cd src  
$ composer install  
$ docker compose up -d --build  

## UserTest実行
$ docker compose exec php bash  
\# ./vendor/bin/phpunit tests/Feature/UserTest.php  

## DB接続、usersテーブルSELECT文発行
$ docker compose exec db mysql -u root -p  
password  
\> use database;  
\> select name from users;  
