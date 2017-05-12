//untuk menguji ketersambungan element dengan js
function test() {
	alert("1234");
}
$(document).ready(function() {
	//inisialisasi dropdown MCSS
	$('select').material_select();

  	$('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  	});

  	$('#prselector1').change(function() {
  		var selectedKtg = $("#prselector1 option:selected").attr("value");
  		$.post("api.php", {action: "getSktg", ktgPick: selectedKtg,}).done(function(data){
  			alert(data);
  		})
  	});
});

