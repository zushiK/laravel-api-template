web = ozaku-web # docker-composeで定義したアプリケーションサービス名を入れたください

# own.mkを同階層におくと、独自Makefileを置いてくれます
-include own.mk

.PHONY: help
help: ## ヘルプコマンド
	@awk 'BEGIN {FS = ":.*?## "} /^[0-9a-zA-Z_-]+:.*?## / {sub("\\\\n",sprintf("\n%22c"," "), $$2);printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)


.PHONY: bash 
bash: ## bash ログイン
	docker exec -it $(web) bash

.PHONY: up 
up: ## コンテナ起動
	docker compose up -d

.PHONY: down 
down: ## コンテナ削除
	docker compose down --remove-orphans

.PHONY: build 
build: ## コンテナ再生成
	docker compose build --no-cache --force-rm

.PHONY: remake  
remake: ## コンテナ削除と初期設定
	@make destroy
	@make init

.PHONY: stop 
stop:  ## コンテナ停止
	docker compose stop

.PHONY: restart 
restart: ## 再起動
	@make down
	@make up

.PHONY: destroy 
destroy: ## コンテナ 関連ファイル全削除
	docker compose down --rmi all --volumes --remove-orphans

.PHONY: destroy-volumes 
destroy-volumes:  ## ボリューム削除
	docker compose down --volumes --remove-orphans

.PHONY: ps 
ps: ## ps
	docker compose ps

.PHONY: logs
logs: ## ログ
	docker compose logs

.PHONY: logs-watch
logs-watch: ## 
	docker compose logs --follow

.PHONY: log-web
log-web: ## 
	docker compose logs $(web)

.PHONY: log-web-watch
log-web-watch: ## 
	docker compose logs --follow $(web)

.PHONY: log-db
log-db: ## 
	docker compose logs db

.PHONY: log-db-watch
log-db-watch: ## 
	docker compose logs --follow db

.PHONY: db
mysql: ## exec db
	docker compose exec mysql bash

.PHONY: sql
sql: ## sql 実行
	docker compose exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'

.PHONY: redis
redis: ## redis
	docker compose exec redis redis-cli