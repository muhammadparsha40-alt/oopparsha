<?php

// =============================================
// PRAKTIKUM 3: Static + Final Variable / Method
// Sistem Produk Sederhana - kayak mini toko! 🛒
// =============================================

// --- CLASS PRODUK ---
// punya static variable buat nyimpen total produk
class Produk {
    // static $jumlahProduk - dishare ke semua objek produk
    public static $jumlahProduk = 0;

    // properti tiap produk
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama  = $nama;
        $this->harga = $harga;
    }

    // tambahkan produk ke "rak" dan update counter
    public function tambahProduk() {
        self::$jumlahProduk++;
    }

    // tampilin info produk ini
    public function info() {
        return "📦 " . $this->nama . " — Rp " . number_format($this->harga, 0, ',', '.');
    }
}


// --- CLASS TRANSAKSI ---
// final method = ga bisa di-override sama class anak
class Transaksi {

    // final method — terkunci, ga bisa diubah di subclass
    final public function prosesTransaksi($produk, $qty) {
        $total = $produk->harga * $qty;
        echo "🧾 Transaksi diproses!<br>";
        echo "&nbsp;&nbsp;→ Beli <strong>" . $qty . "x " . $produk->nama . "</strong><br>";
        echo "&nbsp;&nbsp;→ Total: <strong>Rp " . number_format($total, 0, ',', '.') . "</strong><br>";
    }
}


// =============================================
// DEMO PROGRAM
// =============================================

// --- buat minimal 3 produk ---
$produk1 = new Produk("Laptop Gaming Asus ROG", 18500000);
$produk2 = new Produk("Mouse Wireless Logitech", 450000);
$produk3 = new Produk("Keyboard Mechanical HyperX", 850000);
$produk4 = new Produk("Headset Sony WH-1000XM5", 4200000);

// tambahkan ke list (increment counter)
$produk1->tambahProduk();
$produk2->tambahProduk();
$produk3->tambahProduk();
$produk4->tambahProduk();

// buat objek transaksi
$transaksi = new Transaksi();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Sistem Produk</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0d1117;
            color: #e6edf3;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 750px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 6px;
            background: linear-gradient(135deg, #58a6ff, #bc8cff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            text-align: center;
            color: #8b949e;
            font-size: 0.85rem;
            margin-bottom: 30px;
        }

        /* --- CARD SECTION --- */
        .section {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .badge {
            font-size: 0.72rem;
            padding: 2px 8px;
            border-radius: 20px;
            font-weight: normal;
        }

        .badge-static  { background: #1f6feb33; color: #58a6ff; border: 1px solid #1f6feb; }
        .badge-final   { background: #3d1f6f33; color: #bc8cff; border: 1px solid #6e40c9; }

        /* --- PRODUK LIST --- */
        .produk-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        @media(max-width: 500px) {
            .produk-grid { grid-template-columns: 1fr; }
        }

        .produk-card {
            background: #0d1117;
            border: 1px solid #21262d;
            border-radius: 10px;
            padding: 14px;
            transition: border-color 0.25s, transform 0.2s;
        }

        .produk-card:hover {
            border-color: #58a6ff;
            transform: translateY(-2px);
        }

        .produk-nama {
            font-weight: bold;
            font-size: 0.95rem;
            color: #e6edf3;
            margin-bottom: 5px;
        }

        .produk-harga {
            color: #3fb950;
            font-size: 0.9rem;
        }

        /* --- TOTAL COUNTER --- */
        .counter-box {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #1f6feb1a;
            border: 1px solid #1f6feb55;
            border-radius: 10px;
            padding: 12px 20px;
            margin-top: 15px;
        }

        .counter-num {
            font-size: 2.5rem;
            font-weight: bold;
            color: #58a6ff;
            line-height: 1;
        }

        .counter-label {
            color: #8b949e;
            font-size: 0.85rem;
        }

        /* --- TRANSAKSI --- */
        .transaksi-item {
            background: #0d1117;
            border: 1px solid #21262d;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 12px;
            font-size: 0.9rem;
            line-height: 1.8;
        }

        .transaksi-item:last-child { margin-bottom: 0; }

        /* --- FOOTER --- */
        footer {
            text-align: center;
            color: #484f58;
            font-size: 0.78rem;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #21262d;
        }

        strong { color: #e6edf3; }
    </style>
</head>
<body>
<div class="container">

    <h1>🛒 Sistem Produk Sederhana</h1>
    <p class="subtitle">Praktikum 3 — Static Variable + Final Method OOP PHP</p>

    <!-- DAFTAR PRODUK -->
    <div class="section">
        <div class="section-title">
            📦 Daftar Produk
            <span class="badge badge-static">static $jumlahProduk</span>
        </div>

        <div class="produk-grid">
            <?php
            $semuaProduk = [$produk1, $produk2, $produk3, $produk4];
            foreach ($semuaProduk as $p):
            ?>
            <div class="produk-card">
                <div class="produk-nama"><?= htmlspecialchars($p->nama) ?></div>
                <div class="produk-harga">Rp <?= number_format($p->harga, 0, ',', '.') ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="counter-box">
            <div class="counter-num"><?= Produk::$jumlahProduk ?></div>
            <div class="counter-label">Total produk<br>terdaftar</div>
        </div>
    </div>

    <!-- SIMULASI TRANSAKSI -->
    <div class="section">
        <div class="section-title">
            🧾 Simulasi Transaksi
            <span class="badge badge-final">final method</span>
        </div>

        <?php
        // simulasikan beberapa transaksi
        $simulasi = [
            [$produk1, 1],
            [$produk2, 3],
            [$produk3, 2],
        ];

        foreach ($simulasi as [$produk, $qty]):
        ?>
        <div class="transaksi-item">
            <?php ob_start(); $transaksi->prosesTransaksi($produk, $qty); echo ob_get_clean(); ?>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        Praktikum 3 — OOP PHP: Static + Final | Class Produk & Transaksi 🚀
    </footer>

</div>
</body>
</html>
