<?php
header('Content-Type: application/json'); // Pastikan respons dalam format JSON
require_once 'koneksi.php'; // Sertakan file koneksi database

$response = ['status' => 'error', 'message' => 'Permintaan tidak valid'];

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        // --- Operasi untuk Tabel Destinasi ---
        case 'add_destinasi':
            $id_destinasi = $_POST['id_destinasi'];
            $nama_destinasi = $_POST['nama_destinasi'];
            $deskripsi = $_POST['deskripsi'];
            $lokasi = $_POST['lokasi'];
            $gambar_url = $_POST['gambar_url'];

            // Gunakan prepared statement untuk keamanan
            $stmt = $conn->prepare("INSERT INTO destinasi (id_destinasi, nama_destinasi, deskripsi, lokasi, gambar_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $id_destinasi, $nama_destinasi, $deskripsi, $lokasi, $gambar_url);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data destinasi berhasil ditambahkan.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menambahkan data destinasi: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'get_destinasi':
            $result = $conn->query("SELECT * FROM destinasi");
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $response = ['status' => 'success', 'data' => $data];
            } else {
                $response = ['status' => 'success', 'data' => [], 'message' => 'Tidak ada data destinasi.'];
            }
            break;

        case 'get_destinasi_by_id':
            $id_destinasi = $_POST['id_destinasi'];
            $stmt = $conn->prepare("SELECT * FROM destinasi WHERE id_destinasi = ?");
            $stmt->bind_param("s", $id_destinasi);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $response = ['status' => 'success', 'data' => $result->fetch_assoc()];
            } else {
                $response = ['status' => 'error', 'message' => 'Data destinasi tidak ditemukan.'];
            }
            $stmt->close();
            break;

        case 'update_destinasi':
            $id_destinasi = $_POST['id_destinasi'];
            $nama_destinasi = $_POST['nama_destinasi'];
            $deskripsi = $_POST['deskripsi'];
            $lokasi = $_POST['lokasi'];
            $gambar_url = $_POST['gambar_url'];

            $stmt = $conn->prepare("UPDATE destinasi SET nama_destinasi = ?, deskripsi = ?, lokasi = ?, gambar_url = ? WHERE id_destinasi = ?");
            $stmt->bind_param("sssss", $nama_destinasi, $deskripsi, $lokasi, $gambar_url, $id_destinasi);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data destinasi berhasil diperbarui.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal memperbarui data destinasi: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'delete_destinasi':
            $id_destinasi = $_POST['id_destinasi'];
            $stmt = $conn->prepare("DELETE FROM destinasi WHERE id_destinasi = ?");
            $stmt->bind_param("s", $id_destinasi);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data destinasi berhasil dihapus.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menghapus data destinasi: ' . $stmt->error];
            }
            $stmt->close();
            break;

        // --- Operasi untuk Tabel Pengguna ---
        case 'add_pengguna':
            $id_pengguna = $_POST['id_pengguna'];
            $nama_pengguna = $_POST['nama_pengguna'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];

            $stmt = $conn->prepare("INSERT INTO pengguna (id_pengguna, nama_pengguna, email, telepon, alamat) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $id_pengguna, $nama_pengguna, $email, $telepon, $alamat);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data pengguna berhasil ditambahkan.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menambahkan data pengguna: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'get_pengguna':
            $result = $conn->query("SELECT * FROM pengguna");
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $response = ['status' => 'success', 'data' => $data];
            } else {
                $response = ['status' => 'success', 'data' => [], 'message' => 'Tidak ada data pengguna.'];
            }
            break;

        case 'get_pengguna_by_id':
            $id_pengguna = $_POST['id_pengguna'];
            $stmt = $conn->prepare("SELECT * FROM pengguna WHERE id_pengguna = ?");
            $stmt->bind_param("s", $id_pengguna);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $response = ['status' => 'success', 'data' => $result->fetch_assoc()];
            } else {
                $response = ['status' => 'error', 'message' => 'Data pengguna tidak ditemukan.'];
            }
            $stmt->close();
            break;

        case 'update_pengguna':
            $id_pengguna = $_POST['id_pengguna'];
            $nama_pengguna = $_POST['nama_pengguna'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];

            $stmt = $conn->prepare("UPDATE pengguna SET nama_pengguna = ?, email = ?, telepon = ?, alamat = ? WHERE id_pengguna = ?");
            $stmt->bind_param("sssss", $nama_pengguna, $email, $telepon, $alamat, $id_pengguna);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data pengguna berhasil diperbarui.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal memperbarui data pengguna: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'delete_pengguna':
            $id_pengguna = $_POST['id_pengguna'];
            $stmt = $conn->prepare("DELETE FROM pengguna WHERE id_pengguna = ?");
            $stmt->bind_param("s", $id_pengguna);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data pengguna berhasil dihapus.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menghapus data pengguna: ' . $stmt->error];
            }
            $stmt->close();
            break;

        // --- Operasi untuk Tabel Paket Wisata ---
        case 'add_paket_wisata':
            $id_paket = $_POST['id_paket'];
            $id_destinasi = $_POST['id_destinasi'];
            $nama_paket = $_POST['nama_paket'];
            $harga = $_POST['harga'];
            $durasi = $_POST['durasi'];
            $deskripsi_paket = $_POST['deskripsi_paket'];
            $rating = $_POST['rating'];

            $stmt = $conn->prepare("INSERT INTO paket_wisata (id_paket, id_destinasi, nama_paket, harga, durasi, deskripsi_paket, rating) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssdssi", $id_paket, $id_destinasi, $nama_paket, $harga, $durasi, $deskripsi_paket, $rating);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data paket wisata berhasil ditambahkan.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menambahkan data paket wisata: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'get_paket_wisata':
            $result = $conn->query("SELECT pw.*, d.nama_destinasi FROM paket_wisata pw JOIN destinasi d ON pw.id_destinasi = d.id_destinasi");
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $response = ['status' => 'success', 'data' => $data];
            } else {
                $response = ['status' => 'success', 'data' => [], 'message' => 'Tidak ada data paket wisata.'];
            }
            break;

        case 'get_paket_wisata_by_id':
            $id_paket = $_POST['id_paket'];
            $stmt = $conn->prepare("SELECT * FROM paket_wisata WHERE id_paket = ?");
            $stmt->bind_param("s", $id_paket);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $response = ['status' => 'success', 'data' => $result->fetch_assoc()];
            } else {
                $response = ['status' => 'error', 'message' => 'Data paket wisata tidak ditemukan.'];
            }
            $stmt->close();
            break;

        case 'update_paket_wisata':
            $id_paket = $_POST['id_paket'];
            $id_destinasi = $_POST['id_destinasi'];
            $nama_paket = $_POST['nama_paket'];
            $harga = $_POST['harga'];
            $durasi = $_POST['durasi'];
            $deskripsi_paket = $_POST['deskripsi_paket'];
            $rating = $_POST['rating'];

            $stmt = $conn->prepare("UPDATE paket_wisata SET id_destinasi = ?, nama_paket = ?, harga = ?, durasi = ?, deskripsi_paket = ?, rating = ? WHERE id_paket = ?");
            $stmt->bind_param("ssdssis", $id_destinasi, $nama_paket, $harga, $durasi, $deskripsi_paket, $rating, $id_paket);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data paket wisata berhasil diperbarui.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal memperbarui data paket wisata: ' . $stmt->error];
            }
            $stmt->close();
            break;

        case 'delete_paket_wisata':
            $id_paket = $_POST['id_paket'];
            $stmt = $conn->prepare("DELETE FROM paket_wisata WHERE id_paket = ?");
            $stmt->bind_param("s", $id_paket);

            if ($stmt->execute()) {
                $response = ['status' => 'success', 'message' => 'Data paket wisata berhasil dihapus.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal menghapus data paket wisata: ' . $stmt->error];
            }
            $stmt->close();
            break;

        // --- Operasi untuk VIEW Paket Populer ---
        case 'get_view_paket_populer':
            $result = $conn->query("SELECT * FROM view_paket_populer");
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $response = ['status' => 'success', 'data' => $data];
            } else {
                $response = ['status' => 'success', 'data' => [], 'message' => 'Tidak ada data di view paket populer.'];
            }
            break;

        default:
            $response = ['status' => 'error', 'message' => 'Aksi tidak dikenal.'];
            break;
    }
}

$conn->close(); // Tutup koneksi database
echo json_encode($response); // Kirim respons dalam format JSON
?>
