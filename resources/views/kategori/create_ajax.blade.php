<form action="{{ url('/kategori/ajax') }}" method="POST" id="form-tambah-kategori">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Kategori</label>
                    <input type="text" name="kategori_kode" id="kategori_kode" class="form-control" required>
                    <small id="error-kategori_kode" class="error-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="kategori_nama" id="kategori_nama" class="form-control" required>
                    <small id="error-kategori_nama" class="error-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        let tableKategori = $('#dataKategori').DataTable(); // Pastikan ID tabel sesuai

        $("#form-tambah-kategori").validate({
            rules: {
                kategori_kode: {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
                kategori_nama: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault(); // Mencegah pengiriman form default

                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: $(form).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#modal-master').modal('hide'); // Tutup modal
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                                response.data.kategori_kode
                                response.data.kategori_nama
                            });

                            // Reset form setelah submit berhasil
                            $('#form-tambah-kategori')[0].reset();

                            // Tambah data baru ke DataTables tanpa reload
                            if (response.data) {
                                tableKategori.row.add([
                                    response.data.kategori_kode,
                                    response.data.kategori_nama,
                                    `<button onclick="editKategori(${response.data.kategori_id})" class="btn btn-warning btn-sm">Edit</button>
                                    <button onclick="hapusKategori(${response.data.kategori_id})" class="btn btn-danger btn-sm">Hapus</button>`
                                ]).draw(false);
                            }
                        } else {
                            $('.error-text').text(''); // Kosongkan error sebelumnya
                            if (response.msgField) {
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menghubungi server'
                        });
                    }
                });

                return false; // Pastikan form tidak dikirim ulang
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
