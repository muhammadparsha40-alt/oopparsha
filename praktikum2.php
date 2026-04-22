<?php

// =============================================
// PRAKTIKUM 2: Static Method
// Class Matematika dengan berbagai operasi
// Plus: Luas Persegi & HTML Form buat input!
// =============================================

class Matematika {

    // static method - bisa dipanggil langsung tanpa bikin objek dulu
    public static function kali($a, $b) {
        return $a * $b;
    }

    public static function bagi($a, $b) {
        // jaga-jaga biar ga error kalau dibagi 0
        if ($b == 0) {
            return "Eh, ga bisa bagi sama nol! 🚫";
        }
        return $a / $b;
    }

    // --- method tambahan sesuai tugas ---

    public static function tambah($a, $b) {
        return $a + $b;
    }

    public static function kurang($a, $b) {
        return $a - $b;
    }

    // fungsi khusus buat hitung luas persegi
    // rumusnya simpel: sisi * sisi
    public static function luasPersegi($sisi) {
        return $sisi * $sisi;
    }
}

// ambil input dari form (kalau ada)
$angka1  = isset($_POST['angka1'])  ? (float) $_POST['angka1']  : null;
$angka2  = isset($_POST['angka2'])  ? (float) $_POST['angka2']  : null;
$sisiInput = isset($_POST['sisi']) ? (float) $_POST['sisi']   : null;
$submitted = isset($_POST['hitung']);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 2 - Static Method Matematika</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #1a1a2e;
            color: #eee;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 8px;
            background: linear-gradient(90deg, #e040fb, #7c4dff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            text-align: center;
            color: #aaa;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        /* --- DEMO STATIC METHOD --- */
        .demo-box {
            background: #16213e;
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 25px;
            border-left: 4px solid #7c4dff;
        }

        .demo-box h2 {
            font-size: 1.1rem;
            color: #e040fb;
            margin-bottom: 15px;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #2a2a4a;
        }

        .result-row:last-child { border-bottom: none; }

        .op-label { color: #aaa; font-size: 0.9rem; }

        .op-value {
            font-size: 1.1rem;
            font-weight: bold;
            color: #a78bfa;
        }

        /* --- FORM --- */
        .form-box {
            background: #16213e;
            border-radius: 12px;
            padding: 25px;
            border-left: 4px solid #e040fb;
        }

        .form-box h2 {
            color: #e040fb;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            color: #ccc;
            font-size: 0.85rem;
            margin-bottom: 6px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px 14px;
            background: #0f3460;
            border: 1px solid #3a3a6a;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #7c4dff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #7c4dff, #e040fb);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            transition: opacity 0.3s;
        }

        button:hover { opacity: 0.85; }

        /* --- HASIL FORM --- */
        .hasil-box {
            margin-top: 22px;
            background: #0f3460;
            border-radius: 10px;
            padding: 18px 22px;
        }

        .hasil-box h3 {
            color: #a78bfa;
            margin-bottom: 12px;
        }

        .hasil-item {
            padding: 7px 0;
            border-bottom: 1px solid #1a3a6a;
            font-size: 0.95rem;
        }

        .hasil-item:last-child { border-bottom: none; }

        .tag {
            display: inline-block;
            background: #7c4dff33;
            color: #a78bfa;
            border-radius: 4px;
            padding: 1px 7px;
            font-size: 0.8rem;
            margin-right: 6px;
        }

        footer {
            text-align: center;
            color: #555;
            font-size: 0.8rem;
            margin-top: 30px;
        }

        hr { border-color: #2a2a4a; margin: 25px 0; }
    </style>
</head>
<body>
<div class="container">

    <h1>🔢 Kalkulator Matematika</h1>
    <p class="subtitle">Praktikum 2 — Static Method OOP PHP</p>

    <!-- Demo langsung pake nilai default -->
    <div class="demo-box">
        <h2>⚡ Demo Static Method (nilai default: 4 & 5)</h2>
        <div class="result-row">
            <span class="op-label">Matematika::kali(4, 5)</span>
            <span class="op-value"><?= Matematika::kali(4, 5) ?></span>
        </div>
        <div class="result-row">
            <span class="op-label">Matematika::bagi(10, 2)</span>
            <span class="op-value"><?= Matematika::bagi(10, 2) ?></span>
        </div>
        <div class="result-row">
            <span class="op-label">Matematika::tambah(4, 5)</span>
            <span class="op-value"><?= Matematika::tambah(4, 5) ?></span>
        </div>
        <div class="result-row">
            <span class="op-label">Matematika::kurang(10, 4)</span>
            <span class="op-value"><?= Matematika::kurang(10, 4) ?></span>
        </div>
        <div class="result-row">
            <span class="op-label">Luas Persegi (sisi = 7)</span>
            <span class="op-value"><?= Matematika::luasPersegi(7) ?> satuan²</span>
        </div>
    </div>

    <hr>

    <!-- Form input dari user -->
    <div class="form-box">
        <h2>🧮 Coba Sendiri - Input Angka</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Angka Pertama</label>
                <input type="number" name="angka1" step="any"
                    value="<?= htmlspecialchars($angka1 ?? '') ?>"
                    placeholder="contoh: 12" required>
            </div>
            <div class="form-group">
                <label>Angka Kedua</label>
                <input type="number" name="angka2" step="any"
                    value="<?= htmlspecialchars($angka2 ?? '') ?>"
                    placeholder="contoh: 4" required>
            </div>
            <div class="form-group">
                <label>Sisi Persegi (buat hitung luas)</label>
                <input type="number" name="sisi" step="any"
                    value="<?= htmlspecialchars($sisiInput ?? '') ?>"
                    placeholder="contoh: 8" required>
            </div>
            <button type="submit" name="hitung">⚡ Hitung Sekarang!</button>
        </form>

        <?php if ($submitted && $angka1 !== null && $angka2 !== null): ?>
        <div class="hasil-box">
            <h3>🎯 Hasil Perhitungan</h3>
            <div class="hasil-item">
                <span class="tag">Tambah</span>
                <?= $angka1 ?> + <?= $angka2 ?> =
                <strong><?= Matematika::tambah($angka1, $angka2) ?></strong>
            </div>
            <div class="hasil-item">
                <span class="tag">Kurang</span>
                <?= $angka1 ?> - <?= $angka2 ?> =
                <strong><?= Matematika::kurang($angka1, $angka2) ?></strong>
            </div>
            <div class="hasil-item">
                <span class="tag">Kali</span>
                <?= $angka1 ?> × <?= $angka2 ?> =
                <strong><?= Matematika::kali($angka1, $angka2) ?></strong>
            </div>
            <div class="hasil-item">
                <span class="tag">Bagi</span>
                <?= $angka1 ?> ÷ <?= $angka2 ?> =
                <strong><?= Matematika::bagi($angka1, $angka2) ?></strong>
            </div>
            <?php if ($sisiInput !== null): ?>
            <div class="hasil-item">
                <span class="tag">Luas Persegi</span>
                Sisi <?= $sisiInput ?> → Luas =
                <strong><?= Matematika::luasPersegi($sisiInput) ?> satuan²</strong>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <footer>Praktikum 2 — Static Method OOP | dibuat dengan ❤️ dan PHP</footer>

</div>
</body>
</html>
