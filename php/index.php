<!DOCTYPE html>
<html>
<head>
	<title>Program Setor Tunai</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body background="https://mdbootstrap.com/img/new/fluid/city/008.jpg">
 
</table>
    <?php
    // Menangani pengiriman form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Menangkap data dari form
        $nama = $_POST["nama"];
        $cabang = $_POST["cabang"];
        $rekening = $_POST["rekening"];
        $nominal = $_POST["nominal"];
        $jenisKelamin = $_POST["jenis_kelamin"];

        // Menampilkan data yang diinputkan
        if ($nominal < 100000) {
            echo "<p>Nominal transaksi minimal adalah 100 ribu.</p>";
        } else {
            $biayaAdmin = ($nominal > 100000) ? 5000 : 0;
            $total = $nominal + $biayaAdmin;
            
        echo "<p>Nama Lengkap   : $nama</p>";
        echo "<p>Jenis Kelamin  : $jenisKelamin</p>";
        echo "<p>Kantor Cabang  : $cabang</p>";
        echo "<p>Nomor Rekening : $rekening</p>";
        echo "<p>Nominal        : $nominal</p>";
        echo "<p>Total          : $total</p>";

        // Simpan data ke dalam file
            $file = fopen("./lib/data.txt", "a"); // Membuka file dalam mode append (menambahkan data di akhir file)
            fwrite($file, "Nama Lengkap     : $nama" . PHP_EOL);
            fwrite($file, "Jenis Kelamin    : $jenisKelamin" . PHP_EOL);
            fwrite($file, "Kantor Cabang    : $cabang" . PHP_EOL);
            fwrite($file, "Nomor Rekening   : $rekening" . PHP_EOL);
            fwrite($file, "Nominal          : $nominal" . PHP_EOL);
            fwrite($file, "Biaya Admin      : $biayaAdmin" . PHP_EOL);
            fwrite($file, "Total            : $total" . PHP_EOL);
            fwrite($file, "-----------------------------" . PHP_EOL);
            fclose($file);

        }
    }
    ?>
    <br><br>
   <footer>
        <p>Copyright.&copy; <?php echo date("Y"); ?> </p>
    </footer>
</body>
</html>
