<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            width: 1000px; /* Lebar Kotak Diperbesar */
        }

        .container form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .container form label {
            flex-basis: 30%; /* Lebar Label Diperbesar */
            margin-bottom: 5px;
        }

        .container form input[type="text"],
        .container form select {
            flex-basis: 65%; /* Lebar Input Diperbesar */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container .submit-section {
            display: flex;
            justify-content: flex-end; /* Tombol Submit ditempatkan di ujung kanan */
            margin-top: 10px; /* Jarak antara formulir dan tombol submit */
        }

        .container form .submit-btn {
            background-color: blue;
            color: white;
            padding: 8px 15px; /* Padding Tombol Dikurangi */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; /* Ukuran Font Tetap */
            margin-left: 350px; /* Jarak antara tombol submit dengan elemen sebelumnya */
        }

        .container form .submit-btn:hover {
            background-color: blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            background-color: black;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: white;
        }

        th {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 align="center">Form Nilai Ujian</h1>
        <hr>
        <form action="objMahasiswa.php" method="post">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim">

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">

            <label for="kuliah">Kuliah</label>
            <!-- <input type="text" id="kuliah" name="kuliah"> -->
            <select id="kuliah" name="kuliah">
                <option value="Pilih_Kampus">-- PILIH UNIVERSITAS --</option>
                <option value="UBSI">Universitas Bina Sarana Informatika</option>
                <option value="UEU">Universitas Esa Unggul</option>
                <option value="UNJ">Universitas Negeri Jakarta</option>
                <option value="UI">Universitas Indonesia</option>
                <option value="UNMUH">Universitas Muhammadiyah</option>
                <option value="UIN">Universitas Islam Negeri</option>
                <option value="BINUS">Universitas Bina Nusantara</option>
                <option value="TS">Universitas Tri Sakti</option>
                <option value="UN">Universitas Banten</option>
                <option value="UBM">Universitas Bunda Mulia</option>
                <option value="ITB">Universitas Institut Teknologi Bandung</option>
                <option value="UNS">Universitas Negeri 10 November</option>
                <option value="UT">Universitas Telkom</option>
            </select>

            <label for="mata_kuliah">Mata Kuliah</label>
            <select id="mata_kuliah" name="mata_kuliah">
                <option value="Pilih_Matkul">-- PILIH MATA KULIAH --</option>
                <option value="HTML">HTML</option>
                <option value="PHP">PHP</option>
                <option value="JavaScript">JavaScript</option>
                <option value="UI/UX">UI/UX</option>
                <option value="ML">Machine Learning</option>
                <option value="DS">Data Sains</option>
                <option value="ES">English Speak</option>
                <option value="TWS">Teknologi Web Service</option>
                <option value="WP">Web Programming</option>
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="AP">Administrasi Perkantoran</option>
                <option value="MD">Matematika Diskrit</option>
                <option value="PBO">Pemrograman Berbasis Objek</option>
            </select>

            <label for="nilai">Nilai</label>
            <input type="text" id="nilai" name="nilai">

            <div class="submit-section">
                <input type="submit" class="submit-btn" value="Simpan"> <!-- Tombol Submit Diberi Kelas Khusus -->
            </div>
            
        </form>

        <?php
            require_once 'Mahasiswa.php'; // Pastikan path-nya sesuai dengan lokasi file Mahasiswa.php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Tangkap data dari form
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kuliah = $_POST['kuliah'];
                $mata_kuliah = $_POST['mata_kuliah'];
                $nilai = $_POST['nilai'];

                // Buat objek
                $mahasiswa = new Mahasiswa($nim, $nama, $kuliah, $mata_kuliah, $nilai);

                // Cetak hasil dengan tabel
                echo "<h2 align=center>Daftar Nilai Ujian Mahasiswa</h2>";
                echo '<hr>';
                echo '<br>';
                echo "<submit onclick=window.history.back() style='background-color: blue; color: white; border-radius: 5px; padding: 7px 10px;'><-Kembali</submit>";
                echo "<table>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>Nilai</th>
                            <th>Grade</th>
                            <th>Predikat</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>$mahasiswa->nim</td>
                            <td>$mahasiswa->nama</td>
                            <td>$mahasiswa->kuliah</td>
                            <td>$mahasiswa->mata_kuliah</td>
                            <td>$mahasiswa->nilai</td>
                            <td>$mahasiswa->grade</td>
                            <td>$mahasiswa->predikat</td>
                            <td>$mahasiswa->status</td>
                        </tr>
                    </table>";
            }
            
        ?>
        
    </div>
</body>
</html>
