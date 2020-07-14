<div class="m-3 judul_halaman">
    <h1>Dashboard</h1>
    <?php if ($this->session->flashdata('berhasil')) {
        echo $this->session->flashdata('berhasil');
    } elseif ($this->session->flashdata('warning')) {
        echo $this->session->flashdata('warning');
    } else {
        $this->session->flashdata('gagal');
    }
    $uri = explode('/', $_SERVER['PHP_SELF']);
    print_r($uri);
    ?>
</div>