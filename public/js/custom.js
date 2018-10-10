$(document).ready(function(){
	$('#example1').DataTable();
})
$('.delete').click(function(){
	var currentForm = $(this).closest("form");
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this file!",
		icon: "warning",
  		buttons: true,
  		dangerMode: true,

	}).then((willDelete) => {
  		if (willDelete) {
    		currentForm.submit();
  		} 
	});
});

function goBack() {
    window.history.back();
}