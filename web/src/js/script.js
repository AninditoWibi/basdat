//untuk menguji ketersambungan element dengan js
function test() {
	alert("1234");
}

$(document).ready(function() {
	//inisialisasi dropdown MCSS
	$('select').material_select();

	$(".modal").modal();

  	$('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15, // Creates a dropdown of 15 years to control year
    	format: 'yyyy-mm-dd'
  	});

  	$('#prselector1').change(function() {
  		var selectedKtg = $("#prselector1 option:selected").attr("value");
  		$.post("api.php", {action: "getSktg", ktgPick: selectedKtg,}).done(function(data){
  			var listOfSktg = data.split('|');
  			$('#prselector2').html("");
  			for (var i = 0; i < listOfSktg.length-1; i++) {
  				var detailOfSktg = listOfSktg[i].split('%');
  				$('#prselector2').append($('<option>', {
    				value: detailOfSktg[1],
    				text: detailOfSktg[0]
				}));
  			}
  			//gdi materializecss -_-
  			$('select').material_select();
  		});
  	});
});
