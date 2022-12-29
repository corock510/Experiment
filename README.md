# このリポジトリについて
PHPUnitのテストコード(src/tests/Feature/UserTest.php)の挙動の検証を行う。  
UserTest.phpでは、usersテーブルにレコードを2件INSERTし、その件数が2件であることをテストしている。  
INSERT処理の直後(29行目)にブレークポイントを張ってデバッグで一時停止した状態で、コマンドライン上からMySQLに接続し、  
usersテーブルにSELECT文を流すと、結果は2件のはずが、0件(Empty set)で返ってくる。  
その後、UserTest.phpをステップ実行すると、想定通り2件取得できている。  

ちなみに13行目のuse RefreshDatabase;をコメントアウトすると、④で想定通り2件返ってくる  

検証手順
①拡張機能のxDebugをインストール済の状態で【cmd + shift + D】【F5】でxDebugを実行  
②UserTest.phpの29行目selectの処理にブレークポイントを設定（Error Exception Uncaught Exceptionのチェックを外す）  
③下記記載(1)の方法で、UserTest実行（②のブレークポイントで一時停止する）  
④下記記載(2)の方法で、コマンドライン上でMySQLに接続して、usersテーブルにSELECT文を流す（結果は2件のはずが、0件(Empty set)で返ってくる）  
⑤UserTest.phpの処理をステップ実行する（想定通り2件取得できている）  

## 環境設定、ローカル立ち上げ
$ cd src  
$ composer install  
$ docker compose up -d --build  

## UserTest実行(1)
$ docker compose exec php bash  
\# ./vendor/bin/phpunit tests/Feature/UserTest.php  

## DB接続、usersテーブルSELECT文発行(2)
$ docker compose exec db mysql -u root -p  
password  
\> use database;  
\> select name from users;  
