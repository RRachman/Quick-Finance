Berikut **README yang bagus + tutorial lengkap penggunaan** untuk project **Quick-Finance** kamu (pretest masuk **TiketUX**). 💪

---

# 📊 Quick-Finance

**Quick-Finance** adalah *simple web app* untuk membantu kamu **mengelola keuangan**, termasuk:

✨ Fitur utama:
✔ Buat & kirim *invoice*
✔ Tracking **pemasukan & pengeluaran**
✔ Dashboard laporan keuangan
✔ Manajemen klien
(*berdasarkan konten repository*) ([GitHub][1])

Tech stack:
• Laravel 10, • MySQL, • Bootstrap 5, • Chart.js ([GitHub][1])

---

## 🧠 Fitur Utama

| Fitur        | Deskripsi                                |
| ------------ | ---------------------------------------- |
| 📄 Invoice   | Buat invoice pelanggan dan kirim via web |
| 💰 Keuangan  | Catat pemasukan & pengeluaran harian     |
| 📊 Dashboard | Lihat ringkasan laporan keuangan         |
| 👥 Klien     | Kelola data klien dengan mudah           |

---

## 🚀 Cara Install & Jalankan

Ikuti langkah di bawah ini untuk menjalankan project secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/RRachman/Quick-Finance.git
cd Quick-Finance
```

### 2. Install Dependencies

Install PHP dependensi via Composer:

```bash
composer install
```

Install Node dependensi (untuk CSS/JS):

```bash
npm install
npm run dev
```

### 3. Setup Environment

Salin file `.env.example` jadi `.env`:

```bash
cp .env.example .env
```

Edit koneksi database di `.env`:

```
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database
```

### 4. Migrasi & Seed Database

Buat tabel & data awal:

```bash
php artisan migrate --seed
```

### 5. Jalankan Server

```bash
php artisan serve
```

Akses di browser: 👉 **[http://localhost:8000](http://localhost:8000)** ([GitHub][1])

---

## 🔐 Login Default

Gunakan akun admin bawaan untuk pertama kali masuk:

| Email                    | Password      |               |
| ------------------------ | ------------- | ------------- |
| `admin@quickfinance.com` | `password123` | ([GitHub][1]) |

---

## 📋 Struktur Folder

```
app/                # Logika utama Laravel
bootstrap/          # Bootstrapping aplikasi
config/             # Konfigurasi sistem
database/           # Seeder & migrasi
public/             # Aset web yang di-serve
resources/          # Views & assets frontend
routes/             # Semua route aplikasi
tests/              # Unit & feature test
```

---

## 🧩 Cara Pakai Fitur

### 🧾 Invoice

1. Masuk ke menu “Invoice” di sidebar
2. Klik **Buat Invoice Baru**
3. Isi detail: klien, jumlah, tanggal
4. Klik **Simpan** — invoice siap dikirim atau di-download

---

### 📈 Dashboard Keuangan

Dashboard grafik akan menunjukkan:

📍 Total pemasukan
📍 Total pengeluaran
📍 Ringkasan *balance* per bulan

Gunakan grafik ini untuk insight keuangan kamu.

*Gunakan Chart.js untuk visualisasi*

---

### 👤 Manajemen Klien

1. Menu “Klien”
2. Tambah / edit / hapus data klien
3. Setiap invoice bisa di-link ke klien tertentu

---

## 🛠️ Tips Tambahan (Opsional)

### ✨ Gunakan Tinker (Laravel)

Cek data dengan:

```bash
php artisan tinker
```

### 📌 Reset Database

Kalau mau mulai bersih:

```bash
php artisan migrate:fresh --seed
```

---

## ❓ Troubleshooting

❗ **Error koneksi DB:**
Pastikan `DB_HOST`, `DB_PORT`, `DB_DATABASE`, dsb sudah sesuai di `.env`.

❗ **Assets tidak muncul:**
Jalankan lagi:

```bash
npm run dev
```

---

## 📨 Tentang Ini

Ini adalah repository **Quick-Finance**, aplikasi web sederhana untuk kelola keuangan yang dibangun dengan **Laravel 10 + Bootstrap 5 + MySQL**. ([GitHub][1])

Kalau kamu mau, aku juga bisa bantu buat:

✅ Dokumentasi fitur lebih detail
✅ Tutorial video penggunaannya
✅ Penjelasan arsitektur kode

---

Kalau mau versi **bahasa Inggris**, tinggal bilang aja!

[1]: https://github.com/RRachman/Quick-Finance.git "GitHub - RRachman/Quick-Finance"
