# career

 - 後台管理

# 複製設定檔
 - cp .env.sample .env

# 更改設定檔內容 .env
 - APP_POTOCOL = https //是否使用https 不使用就改為http
 - 把DB設定更改為自己的DB

#安裝套件
 - composer install

#執行migrate & seed
 - php artisan migrate
 - php artisan db:seed

