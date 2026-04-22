<?php

// =============================================
// PRAKTIKUM 1: Static Variable
// Bikin counter pengunjung pake static variable
// =============================================

class Pengunjung {
    // variabel static - dishare ke semua objek, bukan milik satu objek aja
    public static $jumlah = 0;

    // setiap kali ada pengunjung baru (objek dibuat), langsung tambah hitungannya
    public function __construct() {
        self::$jumlah++;
        echo "Pengunjung ke-" . self::$jumlah . " masuk! 🚶<br>";
    }

    // method buat reset balik ke 0
    public static function reset() {
        self::$jumlah = 0;
        echo "🔄 Counter direset, balik ke nol lagi!<br>";
    }
}

// =============================================
// DEMO WAKTU JALAN
// =============================================

echo "<h2>🏪 Sistem Counter Pengunjung</h2>";
echo "<hr>";

// --- Sebelum Reset ---
echo "<h3>📌 Sebelum Reset:</h3>";

// bikin 5 pengunjung sesuai tugas
$p1 = new Pengunjung();
$p2 = new Pengunjung();
$p3 = new Pengunjung();
$p4 = new Pengunjung();
$p5 = new Pengunjung();

echo "<br>✅ Total pengunjung sekarang: <strong>" . Pengunjung::$jumlah . "</strong><br><br>";

// --- Reset ---
echo "<h3>🔁 Proses Reset:</h3>";
Pengunjung::reset();

// --- Sesudah Reset ---
echo "<br><h3>📌 Sesudah Reset:</h3>";
echo "✅ Total pengunjung setelah reset: <strong>" . Pengunjung::$jumlah . "</strong><br>";

echo "<hr>";
echo "<p style='color: gray; font-size: 12px;'>Praktikum 1 - Static Variable OOP | selesai! 🎉</p>";
