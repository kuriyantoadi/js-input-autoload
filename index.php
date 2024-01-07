<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Data Mahasiswa</h2>

<table border="1" id="data-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Usia</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data akan ditampilkan di sini -->
    </tbody>
</table>

<form id="add-form">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <label for="usia">Usia:</label>
    <input type="number" name="usia" id="usia" required>
    <button type="button" onclick="tambahData()">Tambah Data</button>
</form>

<script>
    function tambahData() {
        var nama = $("#nama").val();
        var usia = $("#usia").val();

        if (nama.trim() === "" || usia.trim() === "") {
            alert("Nama dan usia harus diisi.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "tambah_data.php",
            data: { nama: nama, usia: usia },
            success: function (response) {
                // Tambahkan data baru ke tabel tanpa perlu memuat ulang
                $("#data-table tbody").append(response);
                
                // Reset formulir
                $("#nama").val("");
                $("#usia").val("");
            }
        });
    }
</script>

</body>
</html>

