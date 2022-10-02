
# Startup instructions
## Running with docker
<br>
1) Run <b><i>docker compose up --build -d</i></b>
<br>
2) Run <b><i>cp -ri ./.env.example ./.env</i></b>
<br>
2.5) Run in Linux <b><i>sudo chmod -R 777 .</i></b>
<br>
3) Run <b><i>docker exec -it laravel-realtor-1121-php-1 bash -c "composer install && php artisan key:generate && php artisan storage:link && php artisan migrate && php artisan db:seed"</i></b>
<br>
<br>

## One line command
<h3><i>mkdir ./tmp/mysql -p && sudo chmod -R 777 . && cp -ri ./.env.example ./.env && docker compose up --build -d && docker exec -it laravel-realtor-1121-php-1 bash -c "composer install && php artisan key:generate && php artisan storage:link && php artisan migrate && php artisan db:seed"<i></h3>

