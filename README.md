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

techup-appにrootで入る

> docker compose exec -it --user root techup-app bash

or 

docker compose exec techup-app bash

```
# cd /var/www
# composer create-project "laravel/laravel=11.*" . --prefer-dist
```
```
# composer install
# npm install
```

```
# chmod -R guo+w storage
# php artisan storage:link
```
```
techup-appコンテナ内で行う

# chown -R 1000:1000 .
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
DB_PASSWORD=testtest

```
```
php artisan migrate
```

> docker compose down
> 
> docker compose up -d --build
> 
> docker compose exec -it --user root techup-app bash
> 
$ composer install

$ npm install


場合により、docker app再起動
## docker 停止

docker-compose stop

docker compose up -d



# 補足
### Linuxからは、以下にユーザ、グループの権限を設定しておく
sudo chown -R 1000:1000 node_modules

sudo apt update

### dockerコンテナ起動
> docker compose up -d

### リビルドと起動
> docker compose up -d --build

### 停止
> docker compose down

### docker 停止
> docker-compose stop

### mysql コンテナに入る
>  docker compose exec -it --user root techup-mysql bash

mysql -h 127.0.0.1 -P 3306 -u root -p

docker compose exec techup-app bash

$ composer install
$ npm install

# Viteを起動する
$ npm run dev

## vite.config.js 追加してポーリングモードで動作確認
```aiignore

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
});

```
app.css 記述
```aiignore
.text-xl{
    color: blue;
}
```

以下のエラーがでた場合
```aiignore
Error response from daemon: Ports are not available: exposing port TCP 0.0.0.0:3306 -> 0.0.0.0:0: listen tcp 0.0.0.0:3306: bind: Only one usage of each socket address (protocol/network address/port) is normally permitted.
```

```
 docker compose down
```

```
Windows の場合（PowerShell またはコマンドプロンプト）

netstat -ano | findstr :3306

TCP    0.0.0.0:3306     0.0.0.0:0       LISTENING       12345

12345 の部分が プロセスID (PID) です。
そのプロセスを停止する

taskkill /PID 12345 /F
```

```
ポート 3306 を使っているプロセスを確認

lsof -i :3306

mysqld  1234 user   10u  IPv4 0x12345678      0t0  TCP *:3306 (LISTEN)

12345 の部分が プロセスID (PID) です。
そのプロセスを停止する
kill -9 1234

```


参考URL
<a href="https://qiita.com/hitotch/items/2e816bc1423d00562dc2">Laravel 11 の開発環境をdocker</a>

# phpmyadminの設定
ymlに以下を追加

```
phpmyadmin:
image: phpmyadmin
depends_on:
- techup-mysql
environment:
- PMA_ARBITRARY=1
- PMA_HOSTS=techup-mysql
- PMA_USER=root
- PMA_PASSWORD=mysql
ports:
- "3001:80"
```
phpmyadmin接続先

http://localhost:3001/


