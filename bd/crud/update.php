<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
        $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';


        $stmt = $pdo->prepare('UPDATE kontak SET id = ?, nama = ?, email = ?, notelp = ?, pekerjaan = ? WHERE id = ?');
        $stmt-> execute([$id, $nama, $email. $notelp, $pekerjaan, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }

    $stmt = $pdo->prepare('SELECT * FROM kontak WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
}   else {
    exit('No ID specified!');


    
}
?>