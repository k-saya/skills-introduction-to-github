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
DB_PASSWORD=root

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

```
# php artisan migrate
```



# 補足
## Linuxからは、以下にユーザ、グループの権限を設定しておく
sudo chown -R 1000:1000 node_modules

sudo apt update

dockerコンテナ起動
> docker compose up -d

リビルドと起動
> docker compose up -d --build

停止
> docker compose down

## docker 停止
> docker-compose stop



都度実行しないように設定した
$ cd /src
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

参考URL
<a href="https://qiita.com/hitotch/items/2e816bc1423d00562dc2">Laravel 11 の開発環境をdocker</a>

