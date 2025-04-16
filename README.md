<p align="center">Test Fullstack Developer - ACI BMS 2025</p>

## Soal Web Dashboard

<ol>
    <li>Membuat sebuah dashboard yang terdiri dari :
        <ul>
            <li>Login (menggunakan sistem RBAC akan lebih baik)</li>
            <li>CRUD table transaksi (skema bebas)</li>
        </ul>
    </li>
    <li>Batasan Role User :
        <ul>
            <li>User Guest : Mengakses total transaksi hari ini dan login</li>
            <li>User non-Guest : Super Admin (RUD transaksi)</li>
        </ul>
    </li>
    <li>Buat Menu RUD tabel transaksi.
        <ul>
            <li>Search Data transaksi dengan filter : tanggal, nama transaksi</li>
        </ul>
    </li>
</ol>

## How to running program

<ol>
    <li>Download file atau dari github https://github.com/zentryas/bms_zentryas.git</li>
    <li>Running in terminal php artisan:key generate</li>
    <li>Running composer install</li>
    <li>npm install && npm run dev</li>
    <li>php artisan migrate</li>
    <li>Running in terminal php artisan:key generate</li>
    <li>hp artisan migrate:fresh --seed</li>
    <li>email : superadmin@gmail.com, pass : password</li>
</ol>

