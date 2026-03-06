# Loyiha Xulosasi: Undiruv-Web-Management

Ushbu hujjat "Undiruv-Web-Management" loyihasi bo'yicha olib borilgan to'liq o'rganish va tahlil natijalarini jamlaydi. Loyiha asosan Laravel freymvorkiga asoslangan bo'lib, Backend-For-Frontend (BFF) arxitekturasi uslubida qurilgan.

## 1. Asosiy Texnologiyalar
- **Backend:** Laravel ^12.0 (PHP ^8.2)
- **Frontend:** Blade templating, TailwindCSS ^4.0, Vite, maxsus CSS fayllar (`dashboard.css`, `auth.css`, `map.css`).
- **Xarita Integratsiyasi:** Yandex Maps API (`api-maps.yandex.ru/2.1`).
- **Tarmoq:** Axios hamda Laravel HTTP Client orqali tashqi API bilan aloqa.

## 2. Arxitektura (Backend-For-Frontend - BFF)
Loyiha markaziy ma'lumotlar bazasi yoki o'zining API'lariga mos tushish o'rniga tashqi asosiy .NET (yoki boshqa) REST API (`http://10.100.104.128:5084/api`) bilan muloqot qiladi va frontend uchun ko'prik vazifasini o'taydi. Barcha og'ir avtorizatsiya va ma'lumotlarni yig'ish jarayonlari shu tashqi API ga yuklangan.

### Axborot xavfsizligi va Avtorizatsiya:
- `AuthController` avtorizatsiyani ikki qadamda (telefon raqam va OTP kod) to'liq API kordinatsiyasi ostida (`/auth/verify_number`, `/auth/send_otp`, `/auth/verify_otp`) tashkillashtiradi.
- Tizimga kirish jarayonida Web uchun "Device Token" ham ajratiladi (`/auth/save_device_token`).
- Olingan foydalanuvchi ma'lumotlari (`auth.user`) va kalit (`auth_token`) qulaylik va himoya uchun Laravel sessiyasida (default holatda `database` yoki `file` driver orqali) saqlanadi.
- Himoyalanish maqsadida `auth.check` nomli middleware ishlatiladi, u tizimga kirmagan shaxslarni ochiq `/` (login) sahifasiga burib yuboradi.

## 3. Tarkibiy bo'linish (Controllers & Routes)
### Kontrollerlar qatlami:
1. **`AuthController`:** Login sahifasi, OTP tasdiqlash jarayoni (2 qadamlik), API orqali autentifikatsiya, device token saqlash va `/logout` operatsiyalarini mas'uliyati ostiga oladi.
2. **`UndiruvchiController`:** 
   - `index()`: Tashqi API'ning `/branches/branch-list` va `/users` so'rovlariga ulanib, filiallar va ishchilarni (undiruvchilarni) tortadi. Ma'lumotlarni qidiruv (search), sanalar (date), aktivlik holati (is_active) va filial (branch_guid) bo'yicha saralashni boshqaradi. Katta datalar bilan ishlash uchun paginatsiya mantiqlarini Blade ga bevosita uzatadi.
   - `map()`: Xarita sahifasi uchun vizual komponentlarni va API-dan barcha ro'yxatni tortadi. Tanlangan userlarning harakatlanish yo'nalishlarini (lokatsiyalarini) `/locations/multiple_users` API orqali olib, xaritada ulash imkonini beradi.
   - `getMultipleLocations()`: Xarita sahifasida AJAX funksionalligi uchun ishlatiladi, va xodimlarning belgilangan vaqt oralig'idagi lokatsiyalar massivini qaytaradi.

### Marshrutlar (`routes/web.php`):
- **Ochiq:** `/` va `POST /login`
- **Yopiq (`auth.check` orqali himoyalangan):** `/dashboard`, `/undiruvchilar`, `/undiruvchilar/xarita`, `POST /undiruvchilar/locations` (xarita marshruti) va `POST /logout`.

## 4. Foydalanuvchi Interfeysi (Frontend)
- **Shablonlar (Blade):** O'ziga xos asosiy ko'rinishlarga ega: `layouts.app` (top header bilan), `layouts.sidebar` (qator menyular). Unda rollarni (masalan `shopir_delivery` -> `Haydovchi` ga) o'zgartirish va initsiallar (yoki avatar) ko'rsatish mantig'i mavjud.
- **Interfaol Komponentlar:** Maxsus yaratilgan sana va vaqt filtrlari (Custom Calendar, Time Dropdown), dropdown menyular, holat va filial saralamalari hamda KPI statistika kartochkalari (`index.blade.php`), va rasm ko'rish uchun `Image Modal`.
- **Xarita (Yandex Maps API):** `map.blade.php` sahnasida shaxsiy xarita markerlari (glow effektlari bilan), xodim tarixi (polyline route) kabi chizmalar hamda yo'nalish chegaralarini aniq uzatuvchi logika taqdim etiladi.
- **Dizayn tokenlari:** Tailwind CSS (`app.css`) va alohida ajratilgan raw CSS papkalardagi uslublar (`public/assets/css/`). Shrift sifatida `Inter` ishlatilmoqda.

## 5. Ma'lumotlar bazasi
Asosiy biznes logikasi va ma'lumotlar jadvali tashqi mikroxizmatlar doirasida turganligi sababli, mahalliy server uchun maxsus obyektlar sxemasi yaratilmagan.
Biroq, standart Laravel talablariga mos muvaqqat fayllar mavjud:
- Sessiya (Sessions), Kesh (Cache), va Kechiktirilgan ishlar (Jobs) uchun standart Laravel migratsiyalari va SQLite bazasi (`database.sqlite`) faol qilingan.
- Asosiy `User` modeli qoldirilgan bo'lsa-da, real biznes logikada foydalanilmaydi (chunki user sessiyasi to'g'ridan-to'g'ri `auth.user` orqali tashqi API ga bog'langan).

## Xulosa
Loyiha zamonaviy Laravel 12 funksiyalaridan mukammal foydalangan holda, tashqi API'ga tobe qilingan yetuk, toza va ko'p funksiyali BFF (Backend-For-Frontend) hisoblanadi. Undiruvchilarni interfaol jadvallarda boshqarish, holatini saralash hamda ularning manzillarini kuchli avtomizatsiyalangan Yandex Xaritada ko'rish mexanizmlari ajralib turadi. Kod bazasi (SoC tamoyillari asosida) sifatli strukturalangan va kelgusida kengaytirish uchun juda moslashuvchan.
