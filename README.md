# Blogging


Laravel 10
simple blogging website

created by Lujain Alsmadi

To login into the Admin dashboard :
1) Super Admin: this user has the full privilege.
Email: super_admin@blogging.com
Password: 12345678

2) Editor: This user can:
 a) add, view, and delete categories, b) add, view, and delete his own blogs only.
c) He can't access users' information or add and delete in the user section
Email: super_admin@blogging.com
Password: 12345678

Remember to make these commands:
php artisan optimize
php artisan cache:clear
php artisan config:cache
php artisan view:clear
php artisan route:cache
php artisan route:clear

Remember to create a Database and make this command:
php artisan migrate:fresh --seed


