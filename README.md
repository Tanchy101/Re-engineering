# Prerequites
These must be installed in your machine to be able to run this locally.
1. XAMPP
2. Composer

# Running Locally
1. Start your Apache and MySQL servers in XAMPP.

2. In phpmyadmin, create your database (like "siaproject")

3. In phpmyadmin, restore the SQL dump file to your database (which we assume is "siaproject")

4. Run this command to install composer dependencies.
```
composer install
```
- If you run into an error saying "The authenticity of host 'gitlab.com (172.65.251.78)' can't be established" and asks "Are you sure you want to continue connecting (yes/no/[fingerprint])?", just press `Enter` and it will try to download again properly.

5. Go to your browser and access [localhost/Re-engineering/index.php](localhost/Re-engineering/index.php).

6. Done!