//untuk menguji ketersambungan element dengan js
function test() {
	alert("1234");
}

function confirmOrderForm() {
	alert("Data jasa kirim baru valid");
}

function checkOrderForm() {
	var isValid = true;
	var nama = $('#nama_jk').val();
	var lamakirim = $('#lama_jk').val();
	var tarif = $('#tarif_jk').val();
	var regexNum = /[0-9]+/;

	if (nama == null || nama == "" || nama.length > 20) {
		isValid = false;
	}

	if (lamakirim == null || lamakirim == "") {
		isValid = false;
	}

	if (regexNum.test(tarif) == false) {
		isValid = false;
	}

	if (isValid == false) {
		alert("Satu atau lebih elemen formulir tidak valid!");
	} else {
		confirmOrderForm();
	}
}



$(document).ready(function() {
	//inisialisasi dropdown MCSS
	$('select').material_select();

	$(".modal").modal();

  	$('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  	});

});
