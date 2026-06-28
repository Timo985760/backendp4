Stored procedures
=================

This project stores database stored procedure SQL files in `database/createscripts`.

To import them into your local database, run the Laravel migration that loads all `.sql` files:

```bash
php artisan migrate
```

The migration `ImportStoredProcedures` will execute all SQL files in `database/createscripts` using `DB::unprepared`.

To rollback (drop procedures), run:

```bash
php artisan migrate:rollback
```

If you prefer to import manually, you can run:

```bash
mysql -u DB_USER -p breezedemo < database/createscripts/SP_UpdateAllergeen.sql
```
