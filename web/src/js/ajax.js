// insert AJAX functions here
$("#pilih-kategori").on("change",function() {
    var kategori_utama = $("#pilih-kategori :selected").val();

    $.post("../application.php", {
        command: "ganti_subkategori",
        kategori: kategori_utama
    }, function(data) {
        $("#pilih-subkategori").html(data);
        $('select').material_select();
    });
});

$("#filter-produk-button").on("click",function() {
    var kategori = $("#pilih-subkategori :selected").val();
    var nama_toko = $("#nama-toko").val();
    var kategori_utama = $("#pilih-kategori :selected").val();

    if (kategori === '') {
        $("#kategori-kosong-alert").modal("open");
    } else {
        if (kategori_utama === 'Semua Kategori' && kategori === 'Semua Kategori') {
            kategori = kategori_utama;
        }
        $.post("../application.php", {
            command: "filter_shipped_produk",
            kategori: kategori,
            nama_toko: nama_toko
        }).done(function(data) {
            $("#tabel-beli-shipped-produk").html("");
            $(data).appendTo("#tabel-beli-shipped-produk");
        });
    }
});

$("#pilih-toko-button").click(function() {
    var nama_toko = $("#pilih-toko :selected").val();

    if (nama_toko === '') {
        $("#nama-toko-kosong-alert").modal("open");
    } else {
        $.post("../application.php", {
            command: "pilih_toko",
            nama_toko: nama_toko
        }, window.location = "beli_shipped_produk.php");
    }
});
