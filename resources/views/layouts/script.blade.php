<script>
    $('#formEditSepeda').on('show.bs.modal', function (event) {
    console.log('OK!')
    var form2 = document.getElementById('formEditSepeda')
    form2.style.display = "block"
    var button = $(event.relatedTarget)
    document.getElementById('unitCode').value = button.data('unitcode')

    // var button = $(event.relatedTarget)
    // var title = button.data('mytitle')
    // console.log(title)
    // var idsepeda = button.data('idsepeda')
    // var unitcode = button.data('unitcode')
    // var kategori = button.data('kategori')
    // var deskripsi = button.data('deskripsi')
    // var foto = button.data('foto')
    // var status = button.data('status')
    // var form2 = document.getElementById('formEditSepeda')
    // form2.style.display = "block"
    // var form = $(this)

    // // Assign Value
    // console.log(idsepeda)
    // form.find('.form-group #idSepeda').val(idsepeda);
    // form.find('.form-group #unitCode').val(unitcode);
    // form.find('.form-group #kategoriId').val(kategori);
    // form.find('.form-group #deskripsi').val(deskripsi);
    // form.find('.form-group #fotoUnit').val(foto);
    // form.find('.form-group #status').val(status);
    })
</script>

{{-- Edit Categori --}}
<script>
    $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var namakategori = button.data('namakategori')
    var idkategori = button.data('idkategori')
    var modal = $(this)
    modal.find('.modal-body #namaKategori').val(namakategori);
    modal.find('.modal-body #idKategori').val(idkategori);
    })
</script>

{{-- Delete Kategori --}}
<script>
    $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var idkategori = button.data('idkategori')
    var modal = $(this)
    modal.find('.modal-body #idKategori').val(idkategori);
    })
</script>

{{-- Edit Paket --}}
<script>
    $('#editPaket').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var namapaket = button.data('namapaket')
    var jam = button.data('jam')
    var harga = button.data('harga')
    var idpaket= button.data('idpaket')
    var modal = $(this)
    console.log(idpaket)
    modal.find('.modal-body #namaPaket').val(namapaket);
    modal.find('.modal-body #jam').val(jam);
    modal.find('.modal-body #harga').val(harga);
    modal.find('.modal-body #idPaket').val(idpaket);
    })
</script>
<script>
    $('#deletePaket').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var idpaket= button.data('idpaket')
    var modal = $(this)
    modal.find('.modal-body #idPaket').val(idpaket);
    })
</script>
