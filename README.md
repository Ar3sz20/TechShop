# Elektronikai Webshop (TechShop)

Laravel alapú, magyar nyelvű webáruház elektronikai termékekhez.

## Készítők

- Harkó Dávid
- Zakar Levente Gusztáv
- Iancu-Tóth Daniel

## Rövid projektleírás

A projekt célja egy modern, áttekinthető webshop felépítése, ahol a felhasználók termékeket böngészhetnek, kosárba tehetik őket, rendelést adhatnak le, és kezelhetik profiljukat. Admin jogosultsággal termékek hozzáadhatók, szerkeszthetők és törölhetők.

## Fő funkciók

- **Nyitóoldal** – hero szekció, véletlenszerű ajánlott termékek (raktáron lévő)
- **Terméklista** – szűrés kategória, típus, min/max ár alapján
- **Termék részletek** – egyedi termékoldal leírással, árral, készletállapottal
- **Kosár** – session-alapú kosárkezelés (hozzáadás, eltávolítás, mennyiség növelése/csökkentése, készletellenőrzés)
- **Rendelés** – cím megadásával rendelés leadása, készlet automatikus csökkentése
- **Rendelési előzmények** – korábbi rendelések listázása
- **Regisztráció és bejelentkezés** – jelszóérvényesítéssel (min. 8 karakter, betűk, számok, szimbólumok)
- **Felhasználói profil** – név, email, telefon, cím szerkesztése, hírlevél preferencia
- **Hírlevél** – email feliratkozás (AJAX), felhasználói profilban ki/bekapcsolható
- **Termék CRUD (admin)** – létrehozás, szerkesztés, soft delete, visszaállítás (role=1 jogosultság)
- **Sötét mód** – kliens oldali dark mode váltás

## Technológiai háttér

- **Backend:** PHP 8.2+, Laravel 12
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Build:** Vite
- **Adatbázis:** Laravel kompatibilis relációs DB (MySQL)
- **Tesztelés:** PHPUnit

## Projektstruktúra (röviden)

- `app/Http/Controllers` – vezérlők (`AuthController`, `ProductController`, `CartController`, `OrderController`, `ProfileController`, `NewsLetterController`)
- `app/Http/Controllers/Api` – Api vezérlők (`ProductController`, `OrderController`)
- `app/Models` – modellek (`User`, `Product`, `Order`, `NewsLetter`)
- `app/Policies` – jogosultságkezelés (`ProductPolicy` – admin role alapján)
- `database/migrations` – sémák (`users`, `products`, `orders`, `newsletters`, `sessions`, `cache`)
- `database/seeders` – demo adatok (`ProductSeeder` – 70 egyedi termék)
- `resources/views` – Blade nézetek (layout, auth, products, cart, orders, profile)
- `routes/web.php` – webes útvonalak
- `routes/api.php` – api útvonalak
- `public/css`, `public/js` – statikus stílusok és kliens oldali scriptek
- `public/images/products` – termékképek (70 db)

## Adatbázis séma

### `users`

- `id`, `name`, `email` (unique), `password`, `role` (nullable int, 0=vásárló, 1=admin), `phone` (nullable), `address` (nullable), `newsletter` (boolean, default false), (időbélyegek)

### `products`

- `id`, `name`, `price` (decimal 10,2), `description` (text), `image` (default: placeholder.png), `quantity` (int), `category`, `brandname`, `type`, (időbélyegek), `deleted_at` (soft delete)

### `orders`

- `id`, `user_id` (FK → users, cascade), `total_price` (decimal 10,2), `address`, `item_id`, `item_quantity`, `status`, (időbélyegek), `payment_method`, `company_data`

### `newsletters`

- `id`, `email` (unique), (időbélyegek)

## Telepítés és futtatás

### Előfeltételek

- PHP 8.2+
- Composer
- Node.js + npm
- Adatbázis (pl. MySQL) **vagy** SQLite

### 1) Függőségek telepítése

```bash
composer install
npm install
```

### 2) Környezet beállítása

```bash
cp .env.example .env
php artisan key:generate
```

Windows (PowerShell) esetén:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Állítsd be az adatbázis kapcsolatot a `.env` fájlban.

### 3) Migrációk + seed

```bash
php artisan migrate
php artisan db:seed
```

### 4) Fejlesztői futtatás

Külön terminálokban:

```bash
php artisan serve
npm run dev
```

vagy Composer scriptből:

```bash
composer run dev
```

