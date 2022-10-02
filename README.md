
# Startup instructions
## Running with docker
<br>

### For linux
<b><i>mkdir ./tmp/mysql -p && sudo chmod -R 777 ./storage && cp -ri ./.env.example ./.env && docker compose up --build -d && docker exec -it laravel-realtor-php-1 bash -c "composer i && php artisan key:generate && php artisan storage:link && php artisan migrate && php artisan db:seed"</i></b>