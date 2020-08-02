<div class="m-3 judul-halaman">
    <h1>Ubah Semester</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/update_semester') ?>" method="post">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" value="<?= $semester->tahun_ajaran ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" name="semester" value="<?= $semester->semester ?>" class="form-control" readonly>
                    <input type="hidden" name="id_semester" value="<?= $semester->id_semester ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Mulai Semester</label>
                    <input type="date" name="mulai" value="<?= $semester->mulai ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir Semester</label>
                    <input type="date" name="akhir" value="<?= $semester->selesai ?>" class="form-control">
                </div>
                <button type="submit" class="btn btn-block btn-success">Update Semester</button>
            </form>
        </div>
    </div>
</div>