<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monitoreo de Actividades</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

  <style>
  .status-ambar {
    background-color: #f0ad4e;
    color: #f6f6f6;
    font-size: larger;
    margin: 0 auto;
    /*width: 24px;*/
    text-align: center;
    height: 24px;
    content: inherit;
  }
  .status-verde {
    background-color: #12f085;
    color: #351f1f;
    font-size: larger;
    margin: 0 auto;
    /*width: 24px;*/
    text-align: center;
    height: 24px;
    content: inherit;
  }
  .status-rojo {
    background-color: #f0523e;
    color: #f6f6f6;
    font-size: larger;
    margin: 0 auto;
    /*width: 24px;*/
    text-align: center;
    height: 24px;
    content: inherit;
  }
  </style>
	<!-- Core JS files -->

	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>

	<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>

	<!-- /theme JS files -->

</head>

<body class="navbar-top-md-xs">

	<!-- Multiple navbars wrapper -->
	<div class="navbar-fixed-top">

		<!-- Main navbar -->
		<div class="navbar navbar-inverse bg-indigo-inei">

<h5 class="tituloheader">MONITOREO CENSOS NACIONALES 2017</h5>
		</div>
		<!-- /main navbar -->


		<!-- Second navbar -->
		<!-- /second navbar -->

	</div>
	<!-- /multiple navbars wrapper -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->

				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Simple panel -->
					<!-- /simple panel -->

					<!-- Table -->
					<div class="panel panel-flat panel-inei">
						<div class="panel-heading">
							<select id="select" name="select" class="select">
                  <option value="opt1">INICIO DE TRABAJO AEU</option>
                  <option value="opt2">RESUMEN DEL EMPADRONAMIENTO</option>
              </select>
							<div class="heading-elements">
								<ul class="icons-list">
              		<li><a data-action="collapse"></a></li>
              		<li><a data-action="close"></a></li>
              	</ul>
            	</div>
          	</div>
						<div class="table-responsive" id="table1" >
							<table class="table table-striped table-bordered">
								<thead>
                  <tr class="bg-table-inei1">
										<th colspan="4" class="sorting_asc text-center">COBERTURA INICIAL</th>
									</tr>
                  <tr class="bg-table-inei1">
										<th colspan="1" rowspan="2" class="sorting_asc text-center">DISTRITO</th>
                    <th colspan="3" rowspan="1" class="sorting_asc text-center">ÁREA DE EMPADRONAMIENTO URBANO</th>
									</tr>
									<tr class="bg-table-inei1">
										<th class="sorting_asc text-center">MARCO CENSAL</th>
										<th class="sorting_asc text-center">EN TRABAJO</th>
										<th class="sorting_asc text-center">%</th>
									</tr>
								</thead>
								<tbody id="tbody_aeu">
                    <tr>
                      <td>TOTAL</td>
                      <td>{{ $aeu['total_prog'] }}</td>
                      <td>{{ $aeu['total_trab'] }}</td>
                      <td class="{{ $aeu['status'] }}">{{ $aeu['avance'] }}%</td>
                    </tr>
                  @foreach ($data_aeu as $key => $item)
                    <?php
                      $status = 'status-verde';
                      if ($item->avance <= 49.9) {
                        $status = 'status-rojo';
                      } else if ($item->avance <= 99.9) {
                        $status = 'status-ambar';
                      }
                     ?>
                    <tr>
                      <td>{{ $item->ubigeo }}</td>
                      <td>{{ $item->aeu_prog }}</td>
                      <td>{{ $item->aeu_trab }}</td>
                      <td class="{{$status}}">{{ $item->avance }}%</td>
                    </tr>
                  @endforeach
								</tbody>
							</table>
						</div>
							<div class="table-responsive" id="table2">
							<table class="table datatable-column-search-selects dataTable table-striped table-bordered" id="DataTables_Table_3" role="grid" aria-describedby="DataTables_Table_3_info">
								<thead>
                  <thead>
                    <tr class="bg-table-inei1">
  										<th colspan="7" class="sorting_asc text-center">COBERTURA FINAL</th>
  									</tr>
                    <tr class="bg-table-inei1">
  										<th colspan="1" rowspan="2" class="sorting_asc text-center">DISTRITO</th>
                      <th colspan="3" rowspan="1" class="sorting_asc text-center">ÁREA DE EMPADRONAMIENTO URBANO</th>
                      <th colspan="3" rowspan="1" class="sorting_asc text-center">VIVENDA</th>
  									</tr>
                    <tr>
                        <th class="bg-table-inei1">MARCO CENSAL</th>
                        <th class="bg-table-inei1">TERMINADO</th>
                        <th class="bg-table-inei1">%</th>
                        <th class="bg-table-inei1">MARCO CENSAL</th>
                        <th class="bg-table-inei1">EMPADRONADA</th>
                        <th class="bg-table-inei1">%</th>
                    </tr>
                  </thead>
								</thead>
								<tbody class="text-center" id="tbody_viv">
                  <tr>
                    <td>TOTAL</td>
                    <td>{{ $pobl['total_prog'] }}</td>
                    <td>{{ $pobl['total_trab'] }}</td>
                    <td class="{{ $pobl['status'] }}">{{ $pobl['avance'] }}%</td>
                    <td>{{ $viv['total_prog'] }}</td>
                    <td>{{ $viv['total_trab'] }}</td>
                    <td class="{{ $viv['status'] }}">{{ $viv['avance'] }}%</td>
                  </tr>
                  @foreach ($data_vivienda as $key => $item)
                    <?php
                      $status1 = 'status-verde';
                      if ($item->aeu_avance <= 49.9) {
                        $status1 = 'status-rojo';
                      } else if ($item->aeu_avance <= 99.9) {
                        $status1 = 'status-ambar';
                      }
                      $status2 = 'status-verde';
                      if ($item->avance <= 49.9) {
                        $status2 = 'status-rojo';
                      } else if ($item->avance <= 99.9) {
                        $status2 = 'status-ambar';
                      }
                    ?>
                    <tr>
                      <td>{{ $item->ubigeo }}</td>
                      <td>{{ $item->aeu_prog  }}</td>
                      <td>{{ $item->aeu_term  }}</td>
                      <td class="{{$status1}}">{{ $item->aeu_avance }}%</td>
                      <td>{{ $item->viv_prog }}</td>
                      <td>{{ $item->viv_trab }}</td>
                      <td class="{{$status2}}">{{ $item->avance }}%</td>
                    </tr>
                  @endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- /table -->


					<!-- Grid -->
					<div class="row">
            <div class="flotante" style="text-align:center;display:none;">
              Actualizando...
              <div class="spinner icon-spinner9" style="font-size:28px" aria-hidden="true"></div>
            </div>
					</div>
					<!-- /grid -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2017. <a href="#">INEI-CENSOS2017</a> by <a href="http://inei.gob.pe" target="_blank">OTIN {{ $hora ." - ". $minuto }}</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
  <script type="text/javascript">
    var combo = $('.select');
    combo.on('change', function(evt){
      var opt = $(this).val();
      console.log(opt);

      if(opt == 'opt1') {
        $('#table1').toggle();
        $('#table2').hide();
      } else {
        $('#table2').toggle();
        $('#table1').hide();
      }
    });

    var hora    = parseInt({{ $hora }});
    var minuto  = parseInt({{ $minuto }});

    if (hora <= 23 && hora >= 15 && minuto > 1) {
      combo.val('opt2');
      $('#table2').toggle();
    } else {
      combo.val('opt1');
      $('#table1').toggle();
    }
    console.log(combo.val());
    combo.trigger('change');


    var flotante = $('.flotante');
    window.setInterval(function () {
      flotante.show();
      var url;
      //url = 'http://192.168.34.25:8000/asistencia/distritos_especiales';
      url = 'http://appcpv.inei.gob.pe/asistencia/distritos_especiales';

      $.get(url, function(response){
        console.log('Actualizado');
        var body_aeu = '';
        var total_aeu_prog = 0,
            total_aeu_trab = 0;
        $.each(response.data_aeu, function(idx, item) {
          ava = generarTotales(item.aeu_prog, item.aeu_trab, parseFloat(item.avance));

          total_aeu_prog += parseInt(item.aeu_prog);
          total_aeu_trab += parseInt(item.aeu_trab);

          body_aeu += '<tr><td>'+item.ubigeo+'</td><td>'+item.aeu_prog+'</td><td>'+item.aeu_trab+'</td><td class="'+ava.status+'">'+ava.avance+'%</td></tr>';
        });

        var total = generarTotales(total_aeu_prog, total_aeu_trab);
        var total_aeu = '<tr><td>TOTAL</td><td>'+total_aeu_prog+'</td><td>'+total_aeu_trab+'</td><td class="'+total.status+'">'+total.avance+'%</td></tr>';
        $('#tbody_aeu').html(total_aeu);
        $('#tbody_aeu').append(body_aeu);

        var body_viv = '';
        var total_eau_prog = 0,
            total_aeu_term = 0,
            total_viv_prog = 0,
            total_viv_trab = 0;
        $.each(response.data_vivienda, function(idx, item) {
          ava_viv = generarTotales(item.viv_prog, item.viv_trab, parseFloat(item.avance));
          ava_aeu = generarTotales(item.aeu_prog, item.aeu_term, parseFloat(item.aeu_avance));

          total_eau_prog += parseInt(item.aeu_prog);
          total_aeu_term += parseInt(item.aeu_term);

          total_viv_prog += parseInt(item.viv_prog);
          total_viv_trab += parseInt(item.viv_trab);

          body_viv += '<tr><td>'+item.ubigeo+'</td><td>'+item.aeu_prog+'</td><td>'+item.aeu_term+'</td><td class="'+ava_aeu.status+'">'+ava_aeu.avance+'%</td><td>'+item.viv_prog+'</td><td>'+item.viv_trab+'</td><td class="'+ava_viv.status+'">'+ava_viv.avance+'%</td></tr>';
        })
        flotante.hide();

        var ava_total_aeu = generarTotales(total_aeu_prog, total_aeu_term);
        var ava_total_viv = generarTotales(total_viv_prog, total_viv_trab);
        var total_aeu = '<tr><td>TOTAL</td><td>'+total_aeu_prog+'</td><td>'+total_aeu_term+'</td><td class="'+ava_total_aeu.status+'">'+ava_total_aeu.avance+'%</td><td>'+total_viv_prog+'</td><td>'+total_viv_trab+'</td><td class="'+ava_total_viv.status+'">'+ava_total_viv.avance+'%</td></tr>';
        $('#tbody_viv').html(total_aeu);
        $('#tbody_viv').append(body_viv);
      })
    }, 4000);

    var generarTotales = function(total_1, total_2, _avance) {
      var avance;
      if (total_1 == 0.0) {
          avance = 0.0;
      } else {
          avance = (total_2 / total_1)*100;
      }
      avance = _avance || parseFloat(avance).toFixed(2);
      var status;
      if( avance <= 49.9) {
          status = "status-rojo";
      } else if( avance <= 99.9 ) {
          status = "status-ambar";
      } else {
          status = "status-verde";
      }

      return {"avance":avance, "status":status};
    }
  </script>

</body>
</html>