# Recursion-Text Snippet Sharing Service

![service-image](https://github.com/Karukan0814/Recursion-TextSnippetSharingService/blob/main/assets/TextSnippetServiceDemo.gif)

# 概要

[Pastebin](https://pastebin.com/) のように、ユーザーがプレーンテキストやコードスニペットを共有できるオンラインコード＆テキストスニペット共有サービス。
ユーザーがテキストエリアにテキストやコードを貼り付けると、共有コンテンツの一意の URL が生成される。この URL は、他の人とコンテンツを共有するために使用できる。エディターには一般的なプログラミング言語の構文のハイライト機能がある。

# 開発環境の構築

開発環境を Docker を使用して立ち上げることが可能。以下、その手順。

1. 当該レポジトリをローカル環境にコピー

2. 環境変数ファイルの準備
   　.env ファイルをルートフォルダ直下に用意し、以下を記述して保存する。

```
DATABASE_NAME=practice_db
DATABASE_USER=任意のユーザー名
DATABASE_USER_PASSWORD=任意のパスワード
DATABASE_HOST=db

```

3. Docker ビルド
   　以下を実行してビルド。なお、以下は Docker がインストール済みであることを前提とする。

```
docker compose build
```

4. Docker 立ち上げ
   　以下を実行してコンテナを立ち上げ。

```
docker compose up -d
```

5. DB Migration 実行
   　以下を実行して初期テーブルの構築。

```
docker-compose exec web php console migrate --init
```

6. 動作確認
   　[http://localhost:8080/](http://localhost:8080/)にアクセスして動作確認
