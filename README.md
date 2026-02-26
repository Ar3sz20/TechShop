# Elektronikai Webshop (TechShop)

Laravel alapú, magyar nyelvű webáruház prototípus elektronikai termékekhez.

## Készítők

- Harkó Dávid
- Zakar Levente Gusztáv
- Iancu-Tóth Daniel

## Rövid projektleírás

A projekt célja egy modern, áttekinthető webshop felépítése, ahol a felhasználók termékeket böngészhetnek, regisztrálhatnak/bejelentkezhetnek, és szűrhetik a termékkínálatot. Az alkalmazás jelenleg MVP/prototípus állapotban van: az alap felhasználói és terméklista funkciók működnek, több haladó modul (pl. teljes kosár- és rendeléskezelés) még fejlesztés alatt áll.

## Fő funkciók (jelenlegi állapot)

### Működő funkciók

- Nyitóoldal hero + ajánlat jellegű blokkokkal
- Terméklista oldal
- Termékszűrés:
    - kategória alapján (`category`)
    - minimum ár (`min_price`)
    - maximum ár (`max_price`)
- Regisztráció és bejelentkezés (Laravel Auth alapokkal)
- Kijelentkezés
- Auth middleware-rel védett kosár útvonal (`/cart`)
- Seedelt termékadatok adatbázisba

### Fejlesztés alatt / részben kész

- Kosár logika (`CartController` metódusok még üresek)
- Termék CRUD admin oldali kezelése (resource metódusok még üresek)
- Rendeléskezelés (orders/order_items) még nincs implementálva migrációval sem

## Technológiai háttér

- **Backend:** PHP 8.2, Laravel 12
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Build:** Vite
- **Adatbázis:** Laravel kompatibilis relációs DB (tipikusan MySQL vagy SQLite)
- **Tesztelés:** PHPUnit (alap Laravel tesztstruktúra)

## Projektstruktúra (röviden)

- `app/Http/Controllers` – vezérlők (`AuthController`, `ProductController`, `CartController`)
- `app/Models` – modellek (`User`, `Product`, `Cart`)
- `database/migrations` – sémák (`users`, `products`, `carts`, stb.)
- `database/seeders` – demo adatok (`ProductSeeder`)
- `resources/views` – Blade nézetek (layout, auth, products, welcome)
- `routes/web.php` – webes útvonalak
- `public/css`, `public/js` – statikus stílusok és kliens oldali script

## Adatbázis (jelenlegi séma)

### `users`

- `id`, `name`, `email`, `password`, időbélyegek

### `products`

- `id`, `name`, `type`, `price`, `category`, `description`, `image`, `quantity`, időbélyegek, `deleted_at` (soft delete)

### `carts`

- jelenleg minimális tábla (`id`, időbélyegek), üzleti mezők még tervezettek

## Fontos útvonalak

- `GET /` – kezdőlap
- `GET /products` – terméklista + szűrés
- `GET /login`, `POST /login`
- `GET /register`, `POST /register`
- `POST /logout`
- `GET /cart` – csak bejelentkezett felhasználónak

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

## Fejlesztői megjegyzések

- A README a jelenlegi implementációt tükrözi, nem egy teljes kész webshopot.
- A dokumentált, de még nem kész funkciókat külön jelölve hagytuk.
- Javasolt következő lépések:
    1.  `carts` tábla bővítése (user/product kapcsolat, mennyiség)
    2.  Kosár metódusok implementálása (`index/store/update/destroy`)
    3.  Rendelési modul (`orders`, `order_items`) bevezetése
    4.  Jogosultsági szintek (user/admin) explicit mezővel és policy/middleware finomítással

