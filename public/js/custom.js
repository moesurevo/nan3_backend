function confirm(btn){
	    $(document).find('#confirm-url').attr("href",btn.data('href'));
	    $(document).find('.delete_content').text(btn.data('delete-content'));
	    $("#modal-confirm").modal('show');
}
// $('.delete_confirm').click(function(){
// 	var confirm_url = $(this).attr('data-href');
// 	var delete_content = $(this).attr('data-delete-content');
// 	$('#confirm_url').attr('href',confirm_url);
// 	$('.delete_content').text(delete_content);
// 	$("#modal-confirm").modal('show');
// })

function goBack() {
    window.history.back();
}