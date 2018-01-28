var Login = function() {

	var validarIngreso = function() {

		$('#frmLogin').submit(function(event) {
			/* Act on the event */

			event.preventDefault();

			var usuario = document.querySelector('#frmLogin_usuario').value;
			var clave = document.querySelector('#frmLogin_clave').value;

			var caracteres = usuario.length;
			var expresion = /^[a-zA-Z0-9]*$/;

			if(caracteres<1) {
				swal({
					title: "Error validando datos",
					type: 'error',
					text: "Ingresa un nombre de usuario válido"
				});
				return false;
			}

			if(!expresion.test(usuario)){
				swal({
					title: "Error validando datos",
					type: 'error',
					text: "Ingresa un nombre de usuario válido"
				});
				return false;
			}

			var caracteres = clave.length;

			if(caracteres<1) {
				swal({
					title: "Error validando datos",
					type: 'error',
					text: "Ingrese una clave válida."
				});
				return false;
			}

			$.ajax({
				url: "views/ajax/login.ajax.php",
				type: 'POST',
				data: $('#frmLogin').serialize(),
				cache: false,
				dataType: 'json',
				success: function(respuesta) {
					swal({
						title: respuesta.estado==1?'Acceso Autorizado':'Acceso Denegado',
						type: respuesta.type,
						text: respuesta.mensaje
					},function() {
						if(respuesta.estado==1)
							window.location.reload(true);
					});
				}

			})

		});



	}


	return {
		init: function() {
			validarIngreso();
		}
	}

}();

$('document').ready(function() {
	Login.init();
});

