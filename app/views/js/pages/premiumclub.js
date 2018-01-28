$(function() {

    // Datepicker
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      dateFormat: 'yy-mm-dd'
    });

	$('#tc-horaentrada').timepicker({'scrollDefault': 'now'});
	$('#tc-horasalida').timepicker({'scrollDefault': 'now'});


	$('#frmTravelCard').submit(function(event) {

		var estadocivil = $('#tc-estadocivil').val();

		if(estadocivil == '') {
			swal({
				title: "Error validando datos",
				type: 'error',
				text: "Seleccione el estado civil"
			});
			return false;
		}

		var nTarjetas = 0;

		$('.chkTarjeta').each(function(i,v) {
			nTarjetas = nTarjetas + ($(this).is(':checked') ? 1 : 0);
		})

		if(nTarjetas<1 && $('#tc-banco').val() == '') {
			swal({
				title: "Error validando datos",
				type: 'error',
				text: "Seleccione una opción de tarjeta de credito"
			});
			return false;
		}

		$.ajax({
			url: "views/ajax/premiumclub.ajax.php",
			type: 'POST',
			data: $('#frmTravelCard').serialize(),
			cache: false,
			dataType: 'html',
			success: function(tcid) {
				if(tcid>0) {
					swal({
						title: "Premium Club",
						type: 'success',
						text: "Registro exitoso!"
					});
					document.getElementById("frmTravelCard").reset();
					window.location = 'http://globaltyt.com/formatos/' + tcid;
					//window.open('http://www.smkproduction.eu5.org','_blank');
					return false;
				}else {
					swal({
						title: "Error validando datos",
						type: 'error',
						text: "Ocurrio un problema al intentar guardar los datos. Intentalo nuevamente."
					});
					return false;
				}
			}

		})
	});
})