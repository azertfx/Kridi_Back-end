$(document).ready(function(){
  $( '#myform' ).on( 'submit', function(e) {
	e.preventDefault(); 
	var personname = $('#personname').val();
	alert( personname );
  });
});