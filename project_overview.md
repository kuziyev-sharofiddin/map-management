# Loyiha Xulosasi: Undiruv-Web-Management

Ushbu hujjat "Undiruv-Web-Management" loyihasi bo'yicha olib borilgan to'liq o'rganish va tahlil natijalarini jamlaydi. Loyiha asosan Laravel freymvorkiga asoslangan bo'lib, Backend-For-Frontend (BFF) arxitekturasi uslubida qurilgan.

## 1. Asosiy Texnologiyalar
- **Backend:** Laravel ^12.0 (PHP ^8.2)
- **Frontend:** Blade templating, TailwindCSS ^4.0, Vite
- **Integratsiya:** Axios, Laravel HTTP Client
- **Boshqa:** Laravel Sail, Pint, va ko'plab xizmatlar. Xarita va ma'lumotlarni jadvallar ko'rinishida ko'rsatish bo'yicha integratsiyalar qilingan.

## 2. Arxitektura (Backend-For-Frontend - BFF)
Loyiha markaziy ma'lumotlar bazasi yoki o'zining API'lariga mos tushish o'rniga tashqi asosiy .NET (yoki boshqa) REST API (`http://10.100.104.128:5084/api`) bilan muloqot qiladi va frontend uchun ko'prik vazifasini o'taydi.

- **Axborot xavfsizligi va Avtorizatsiya:** 
  - `AuthController` avtorizatsiyani ikki qadamda (telefon raqam kiritish va keyin OTP kod bilan tasdiqlash) to'liq tashqi API orqali amalga oshiradi. 
  - Tizimga kirish jarayonida Web uchun "Device Token" ham yaratiladi va API'ga yuboriladi. 
  - Foydalanuvchining sessiya ma'lumotlari (`auth.user` va `auth_token`) Laravel sessiyasida saqlanadi. 
  - Himoyalanish maqsadida `CheckAuth` nomli middleare ishlangan, bu tizimga tizimga kirmagan foydalanuvchini login pageda tutib turadi.

## 3. Tarkibiy bo'linish (Controllers & Routes)
### Kontrollerlar:
1. **`AuthController`:** 
   - `showLogin()`: Login sahifasini yuklaydi.
   - `handleLogin()`: Telefon raqamini validatsiya qilib tozalaydi (+998 prefikslarini hisobga olgan holda) va tashqi API'ga (1-qadam va 2-qadam uchun OTP mos ravishda) murojaat qilib, foydalanuvchini tizimga kiritadi.
   - `logout()`: API va mahalliy sessiyani tozalab, foydalanuvchini chiqarib yuboradi.
2. **`UndiruvchiController`:** 
   - `index()`: Tashqi API orqali filiallar (`branches`) va undiruvchilar ro'yxatini (`users`) chaqiradi va filterlar (holati, sana, xodim ismi, filial) asosida saralashni boshqarib Blade sahifasiga yuboradi. Paginatsiya mantig'i saqlab qo'yilgan.
   - `map()`: Mintaqaviy xarita yuzasidan boshqaruvni taqdim etuvchi sahifani yuklaydi.

### Marshrutlar (`routes/web.php`):
- Ochiq marshrutlar: `/` (login sahifasi) va `/login` API orqali
- Yopiq qism (`CheckAuth` middleware): `/dashboard`, `/undiruvchilar`, `/undiruvchilar/xarita` va `/logout`.

## 4. Foydalanuvchi Interfeysi (Frontend)
- **Shablonlar (Blade):** O'ziga xos sahifa ko'rinishlariga ega (`layouts.app`, `layouts.sidebar`). Bunda foydalanuvchi ma'lumotlari (ismi va rasmi/initiallari) dinamik renderlanadi.
- **Rollarni boshqarish:** `layouts/app.blade.php` ichida rollarni do'stona tilga o'girib beruvchi mexanizm joriy qilingan (masalan: `shopir_delivery` -> `Haydovchi`).
- **CSS arxitektura:** Tailwind CSS orqali loyihaga kerakli global dizayn tokenlari qilingan, shunigdek, individual css yondashuvlar mavjud (masalan `dashboard.css`, `auth.css`).
- Asosiy shrift sifatida Google API orqali `Inter` ishlatilmoqda.

## 5. Ma'lumotlar bazasi 
Asosiy biznes logikasi tashqi APIga yuklangan bo'lishi qaramay, mahalliy server uchun standart Laravel migratsiyalari saqlab qolingan (masalan sessiya, kesh yoki ishlarni (`jobs`) kechiktirib turish uchun). Fayllar orasida:
- `0001_01_01_000000_create_users_table.php`
- `0001_01_01_000001_create_cache_table.php`
- `0001_01_01_000002_create_jobs_table.php`
ko'rinishidagi tayyor standart migratsiyalar bor. Lokal database sifatida `database.sqlite` mo'ljallangan.

## Xulosa
Loyiha zamonaviy Laravel 12 imkoniyatlaridan to'liq foydalangan holda tashqi mikroxizmatga (`10.100.104.128`) ulanuvchi toza, xavfsiz markaz hisoblanadi. Undiruvchilarni boshqarish, xaritada joylashuvni ko'rish hamda filial bo'yicha filter qilish logikalari sifatli ajratilib, "Separation of Concerns" (SoC) tamoyillariga javob beradi.
