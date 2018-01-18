$(document).ready(function() {
	$('#tbl_proves').dataTable({
		"pagingType": "first_last_numbers",
		"oLanguage": {
			"sProcessing":     "Procesant...",
			"sLengthMenu":     "Mostrar _MENU_ registres",
			"sZeroRecords":    "No s'han trobat resultats",
			"sEmptyTable":     "No hi ha cap resultat disponible",
			"sInfo":           "Mostrant registres del _START_ al _END_ de un total de _TOTAL_ registres",
			"sInfoEmpty":      "Mostrant registres del 0 al 0 de un total de 0 registres",
			"sInfoFiltered":   "(Filtrat de un total de _MAX_ registres)",
			"sInfoPostFix":    "",
			"sSearch":   "Buscar:",
			"sUrl":  "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Carregant...",
			"oPaginate": {
				"sFirst":    "Primer",
				"sLast":     "Últim",
				"sNext":     "Següent",
				"sPrevious": "Anterior"},
			"oAria": {
				"sSortAscending":  ":Activar per ordenar la columna de manera ascendent",
				"sSortDescending": ": Activar per ordenar la columna de manera descendent"}
			}
	});
});