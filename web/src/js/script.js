function test() {
	alert("1234");
}

function addNewJKItem() {
	var newJKDropdown = document.createElement('select');
	var newJKOption = document.createElement('option');
	newJKOption.setAttribute("value", "plh");
	newJKDropdown.innerHTML = newJKOption;
	newJKOption.innerHTML = "placeholder";
	$('#newJKdiv').append(newJKDropdown);
}

function checkOrderForm() {
	var isValid = true;
	var nama = document.forms["jkform"]["nama"].value;
	var lamakirim = document.forms["jkform"]["lamakirim"].value;
	var tarif = document.forms["jkform"]["tarif"].value;
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
	}
}



$(document).ready(function() {
	$('select').material_select();

  	$('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  	});
        
});

