- Để chạy website thực hiện các bước sau:
    B1: Import file zwbook.sql lên database
    B2: Thực hiện tải composer và các thư viện sau:
        + composer require vlucas/phpdotenv
        + composer require illuminate/database
    B3: Vào file .env thực hiện chỉnh sửa DB_NAME, DB_PASS phù hợp
    B4: Chép đoạn code "php -S localhost:8080 -t public/ server.php" và chạy trong terminal
    B5: Vào trình duyệt gõ "localhost:8080"

