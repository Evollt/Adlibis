# Как запустить проект

1. Продублировать `.env.example` и назвать дубликат `.env`
2. Поднять образ через docker-compose. Команда: `docker-compose up -d --build`
3. Сгенерировать ключ приложения: `docker compose run --rm --remove-orphans artisan key:generate`
4. Запустить миграции: `docker compose run --rm --remove-orphans migrate`
5. Сгенерировать тестовые данные `docker compose run --rm --remove-orphans db:seed`

Открыть документацию в Postman можно по [ссылке](https://www.postman.com/lunar-escape-403761/workspace/team-workspace)
