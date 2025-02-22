# docker for techUP 
## Windows Mac 共通
docker ダウンロード
```
$ git clone https://github.com/fujimoto-mio/docker_laravel.git [フォルダ名]
$ cd docker_laravel
$ mkdir ./docker/mysql
$ docker compose up -d
```
### Chromeを開く
http://localhost
にアクセスして確認
「File not found.」でていればOK

## Laravelをインストールする
### appサーバーのコンソールに入る
### rootで入ること。

appにrootで入る

> docker compose exec -it --user root techup-app bash

or 

docker compose exec techup-app bash

```
# cd /src
# mkdir _tmp
# cd _tmp
# composer create-project "laravel/laravel=11.*" . --prefer-dist
```
```
# cd /src
# mv _tmp/* ./

mv: cannot move '_tmp/vendor' to './vendor': Device or resource busy
は無視してOK

# mv _tmp/.* ./
# rm _tmp -rf
```
```
# cd /src
# composer install
# npm install
```

```
# chmod -R guo+w storage
# php artisan storage:link
```

##.env 編集
```
# DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

  ↓ に変更
  
DB_CONNECTION=mysql
DB_HOST=techup-mysql
DB_PORT=3306
DB_DATABASE=techup_db
DB_USERNAME=root
DB_PASSWORD=root
```
```
# php artisan migrate
```


# 補足
## Linuxからは、にしてすべて権限にしておく
sudo chown -R 1000:1000 node_modules

sudo apt update

sudo mkdir vendor/doctrine

## docker 停止
docker-compose stop

docker-compose down
docker 開始
docker compose up -d



都度実行しないように設定した
$ cd /src
$ composer install
$ npm install

# Viteを起動する
$ npm run dev

参考URL
<a href="https://qiita.com/hitotch/items/2e816bc1423d00562dc2">Laravel 11 の開発環境をdocker</a>
