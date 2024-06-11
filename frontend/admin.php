
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Page</title>
</head>
<body>
    <!-- <input type="text" id="search">
    <output id="search-output"></output> -->
    <div class="container">
        <h1>Admin Page</h1>

        <!-- View Merch Section -->
        <section>
            <h2>Daftar Merch</h2>
            <table id="merchTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <!-- <th>Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </section>
        
        <!-- Insert Merch Section -->
        <section>
            <h2>Insert Merch</h2>
            <form id="insertForm" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama" required>
                <input type="number" name="price" placeholder="Harga" required min="0">
                <input type="text" name="description" placeholder="Deskripsi" required>
                <input type="number" name="stock" placeholder="Stok" required min="0">
                <!-- <input type="text" name="gambar" placeholder="URL Gambar" required> -->
                <br><br>
                <input id="imageInput" type="file" name="image" required>
                <br><br>
                <img id="imagePreview" src="#" alt="Preview" width="100">
                <br><br>
                <input type="text" name="kategori" placeholder="Kategori" required>
                <!-- <select name="category">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="TWICE">TWICE</option>
                    <option value="SEVENTEEN">SEVENTEEN</option>
                    <option value="LE SSERAFIM">LE SSERAFIM</option>
                </select> -->
                <br><br>
                <button type="submit">Add Merch</button>
            </form>
        </section>
        
        <!-- Update Merch Section -->
        <section>
            <h2>Update Merch</h2>
            <form id="updateForm">
                <!-- <select name="id">
                    <option value="" selected disabled>Pilih ID</option>
                </select> -->
                <input type="number" name="id" placeholder="ID" required>
                <input type="text" name="name" placeholder="Nama" required>
                <input type="number" name="price" placeholder="Harga" required>
                <input type="text" name="description" placeholder="Deskripsi" required>
                <input type="number" name="stock" placeholder="Stok" required>
                <!-- <input type="text" name="gambar" placeholder="URL Gambar" required> -->
                <br><br>
                <input id="imageEditInput" type="file" name="image" required>
                <br><br>
                <img id="imageEditPreview" src="#" alt="Preview" width="100">
                <br><br>
                <input type="text" name="kategori" placeholder="Kategori" required>
                <!-- <select name="category">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="TWICE">TWICE</option>
                    <option value="SEVENTEEN">SEVENTEEN</option>
                    <option value="LE SSERAFIM">LE SSERAFIM</option>
                    <option value="NEWJEANS">NEWJEANS</option>
                    <option value="BTS">BTS</option>
                </select> -->
                <br><br>
                <button type="submit">Update Merch</button>
            </form>
        </section>
        
        <!-- Delete Merch Section -->
        <section>
            <h2>Delete Merch</h2>
            <form id="deleteForm">
                <input type="number" name="id" placeholder="ID" required>
                <button type="submit">Delete Merch</button>
            </form>
        </section>
        
        <!-- Sales Ranking Section -->
        <section>
            <h2>Ranking Penjualan</h2>
            <table id="rankingTable">
                <thead>
                    <tr>
                        <th>Nama Merch</th>
                        <th>Jumlah Terjual</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </section>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
