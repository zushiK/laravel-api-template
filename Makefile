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
up: ##
	docker compose -f ../ozaku-infra/compose.yml up -d

.PHONY: down
down: ##
	docker compose -f ../ozaku-infra/compose.yml down
