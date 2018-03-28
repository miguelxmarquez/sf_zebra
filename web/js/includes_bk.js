$(document).on('ready', FuncionTabla);

function FuncionTabla(){
	$("#btn-agregar").on('click', FuncionNuevoRenglon);
}

function FuncionNuevoRenglon()
{
	$("#tabla-plantillas")
	.append
	(
		$('<tr>')
		.append
		(
			$('<td>')
			.append
			(
				$('<input>').attr('type', 'text').addClass('form-control')
			)
		)
		.append
		(
			$('<td>')
			.append
			(
				$('<input>').attr('type', 'text' ).addClass('form-control')
			)
		)
		.append
		(
			$('<td>').addClass('text-center')
			.append
			(
				$('<div>').addClass('btn btn-primary').text('Guardar')
			)
			.append
			(
				$('<div>').addClass('btn btn-danger').text('Eliminar')
			)
		)
	);
	
}