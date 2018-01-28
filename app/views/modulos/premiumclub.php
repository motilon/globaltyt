<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="index.html">Global Tours & Travel</a>
      <span class="breadcrumb-item active">Premium Club</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="icon ion-ios-photos-outline"></i>
    <div>
      <h4>Global</h4>
      <p class="mg-b-0">Formulario de Registro</p>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody">
    <div class="br-section-wrapper">

<!--=========================================
=            Formulario de datos            =
==========================================-->
<form id='frmTravelCard' method="post" onsubmit='return false;'>

      <div class="row mb-4">
        <div class="input-group mg-b-10 col-12 col-sm-3">
          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
          <input type="text" id='tc-fecha' name="tc-fecha" class="form-control fc-datepicker" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="input-group mg-b-10  col-12 col-sm-3">
          <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
          <input id="tc-horaentrada" type="text" name="tc-horaentrada" class="form-control" placeholder="Hora Entrada" required>
        </div>

        <div class="input-group mg-b-10  col-12 col-sm-3">
          <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
          <input id="tc-horasalida" type="text" name="tc-horasalida" class="form-control" placeholder="Hora Salida">
        </div>

        <div class="mg-b-10 col-12 col-sm-3">
          <input type="text" class="form-control" name='tc-nroregistro' id='tc-nroregistro' placeholder="No. Registro">
        </div>

      </div>


      <div class="row">
        <div class="col-xl-6">
          <div class="form-layout form-layout-4">
            <h6 class="br-section-label mg-b-20">Invitado(a)</h6>
            
            <div class="row">
              <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-nombre' id='tc-nombre' required>
              </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Profesión: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-profesion' id='tc-profesion' required>
              </div>
            </div>
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Celular: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="tel" class="form-control" name='tc-celular' id='tc-celular'>
              </div>
            </div>
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Edad: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-edad' id='tc-edad' required>
              </div>
            </div>
          </div><!-- form-layout -->
        </div><!-- col-6 -->
        <div class="col-xl-6 mg-t-20 mg-xl-t-0">
          <div class="form-layout form-layout-4">
            <h6 class="br-section-label mg-b-20">Acompañante</h6>

            <div class="row">
              <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-nombre_acomp' id='tc-nombre_acomp'>
              </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Profesión: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-profesion_acomp' id='tc-profesion_acomp'>
              </div>
            </div>
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Celular: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="tel" class="form-control" name='tc-celular_acomp' id='tc-celular_acomp'>
              </div>
            </div>
            <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Edad: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="text" class="form-control" name='tc-edad_acomp' id='tc-edad_acomp'>
              </div>
            </div>

          </div><!-- form-layout -->
        </div><!-- col-6 -->
      </div><!-- row -->


      <div class="form-row mt-4">
        <div class="form-group col-12 col-sm-6 col-lg-3">
          <h6 class="mg-b-20">Estado Civil</h6>
          <div class="row">
            <div class="col-12 col-sm-10">
              <select name='tc-estadocivil' id='tc-estadocivil' class="form-control select2" required data-placeholder="Seleccionar">
                <option label="Seleccionar"></option>
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Conviviente">Conviviente</option>
                <option value="Separado">Separado</option>
                <option value="Novios">Enamorados</option>
                <option value="Viudo">Viudo</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group col-12 col-sm-6 col-lg-4">
          <h6 class="mg-b-20">Ingreso Mensuales</h6>
          <div class="row">
            <div class="col-12 col-sm-10">
              <input type="text" class="form-control" name='tc-ingresos' id='tc-ingresos' required>
              <!--<select name='tc-ingresos' id='tc-ingresos' class="form-control select2" required data-placeholder="Seleccionar">
                <option label="Seleccionar"></option>
                <option value="S. 3.000 A S. 5.000">S./ 3.000 A S/. 5.000</option>
                <option value="S. 10.000">S./ 10.000</option>
                <option value="más de S. 12.000">más de S./ 12.000</option>
              </select>-->
            </div>
          </div>
        </div>

        <div class="form-group col-12 col-lg-5">
          <h6 class="mg-b-20">Tarjetas de Crédito</h6>
          <div class="row section-tarjetas">
            <div class="col-12 col-sm-6">
              <label class="ckbox">
                <input id="tc-tarjeta-1" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="Mastercard">
                <span><i class="fa fa-cc-mastercard" aria-hidden="true"></i> Mastercard</span>
              </label>
              <label class="ckbox">
                <input id="tc-tarjeta-2" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="Visa">
                <span><i class="fa fa-cc-visa" aria-hidden="true"></i> Visa</span>
              </label>
              <label class="ckbox">
                <input id="tc-tarjeta-3" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="Diners">
                <span><i class="fa fa-cc-diners-club" aria-hidden="true"></i> Diners</span>
              </label>
            </div>
            <div class="col-12 col-sm-6">
              <label class="ckbox">
                <input id="tc-tarjeta-4" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="American Express">
                <span><i class="fa fa-cc-amex" aria-hidden="true"></i> American Express</span>
              </label>
              <label class="ckbox">
                <input id="tc-tarjeta-5" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="American Express">
                <span><i class="fa fa-credit-card" aria-hidden="true"></i> Otras</span>
              </label>
              <label class="ckbox">
                <input id="tc-tarjeta-5" name="tc_tarjeta[]"  type="checkbox" class="chkTarjeta" value="American Express">
                <span> Ninguna</span>
              </label>
            </div>
            <div class="form-group col-10 mg-t-10">
              <label for="tc-banco">Banco</label>
              <input type="text" class="form-control" id="tc-banco" name="tc-banco" placeholder="Banco">
            </div>
          </div>
        </div>
        <!--<div class="form-group col-12 col-sm-6 col-lg-4">
          <h6 class="mg-b-20">Tipo de Vivienda</h6>
          <label class="rdiobox">
            <input name="tc-tipovivienda" type="radio" value="Propia">
            <span>Propia</span>
          </label>
          <label class="rdiobox">
            <input name="tc-tipovivienda" type="radio" value="Alquilada">
            <span>Alquilada</span>
          </label>
        </div>-->

        <!--<div class="form-group col-12 col-sm-12 col-lg-4">
          <h6 class="mg-b-20">Vehículo</h6>
          <div class="row">
            <div class="form-group col-6">
              <label for="tc-marca">Marca</label>
              <input type="text" class="form-control" name="tc-marca" placeholder="Marca">
            </div>
            <div class="form-group col-6">
              <label for="tc-modelo">Modelo</label>
              <input type="text" class="form-control" name="tc-modelo" placeholder="Modelo">
            </div>
          </div>
        </div> -->
      </div>


      <div class="d-none form-row mt-5">




        <hr class="d-none">

        <?PHP /*<div class="form-group col-12 col-md-4 col-lg-4">
          <div class="row mg-b-10">
            <label class="col-sm-4 form-control-label">Liner: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name='tc-liner' id='tc-liner'>
            </div>
          </div><!-- row -->
          <div class="row mg-b-10">
            <label class="col-sm-4 form-control-label">Closer: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name='tc-closer' id='tc-closer'>
            </div>
          </div><!-- row -->
          <div class="row mg-b-10">
            <label class="col-sm-4 form-control-label">OPC: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name='tc-opc' id='tc-nombre_acomp'>
            </div>
          </div><!-- row -->
          <div class="row mg-b-10">
            <label class="col-sm-4 form-control-label">TMK: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name='tc-tmk' id='tc-nombre_acomp'>
            </div>
          </div><!-- row -->
        </div> */ ?>

      </div>



      <hr>

      <div class="form-layout-footer my-5 d-flex justify-content-end align-items-center">
        <button id='btnGuardar' type='submit' class="btn btn-primary">Guardar e Imprimir</button>
      </div>
</form>
<!--====  End of Formulario de datos  ====-->


    </div>
  </div>