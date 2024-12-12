1. Run docker-compose up -d --build
2. Run command docker-compose exec app bash
3. Run php artisan migrate
4. Run php artisan db:seed
5. Go to 127.0.0.1:8080/search/product?filter[name]={name} or 127.0.0.1:8080/search/order?filter[number]={number} 