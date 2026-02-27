subindo o docker
-    docker compose up -d --build
-    docker compose exec app composer install
-    docker compose exec node npm install
-    docker compose exec app php artisan key:generate
-    docker compose exec app php artisan migrate
-    docker compose exec node npm run dev -- --host
