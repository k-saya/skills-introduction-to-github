 sudo apt update

Linuxからは、にしてすべて権限にしておく
sudo chown -R 1000:1000 node_modules

sudo mkdir vendor/doctrine
rm -rf vendor



chmod -R guo+w storage


rootで入ること。
$ docker compose exec techup-app bash
 rootで入る
$ docker compose exec -it --user root techup-app bash


docker 停止
docker-compose down
docker 開始
docker compose up -d

都度実行しないように設定した
$ cd /src
$ composer install
$ npm install

Viteを起動する
$ npm run dev

参考URL
https://qiita.com/hitotch/items/2e816bc1423d00562dc2
