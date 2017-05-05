$(document).ready(function(){
	$('#addsubkategori').click(function(event){
		var clone = $(".subkategori").first();
		var utama = $(".utama");
		utama.append(clone.clone());
		utama.children().eq($(".subkategori").length-1).find(".increment").html($(".subkategori").length);
		event.preventDefault();
		console.log($(".subkategori").length);
	});
});