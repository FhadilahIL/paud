<h1>Dashboard</h1>
<?php if ($this->session->flashdata('berhasil')) {
    echo $this->session->flashdata('berhasil');
} elseif ($this->session->flashdata('warning')) {
    echo $this->session->flashdata('warning');
} else {
    $this->session->flashdata('gagal');
}
$uri = $_SERVER['REQUEST_URI'];
print_r($uri);
?>