// insert AJAX functions here
$("#pilih-kategori").on("change",function() {
    var kategori_utama = $("#pilih-kategori :selected").val();

    $.post("application.php", {
        command: "ganti_subkategori",
        kategori: kategori_utama
    }, function(data) {
        $("#pilih-subkategori").html(data);
        $('select').material_select();
    });
});
