<section class="content-header">
	<h1>
		Donaciones Realizadas
	</h1>
	<ol class="breadcrumb">
		<li><i class="fa fa-money"></i> Donaciones</li>
		<li class="active">Donaciones Realizadas</li>
	</ol>
</section>

<section class="content">

	<?php
	$status = !empty($_GET['status']) ? intval($_GET['status']) : 0;
	$buscar = !empty($_GET['buscar']) ? vCode($_GET['buscar']) : '';
	require('private/classes/classDonate.php');
	?>

	<div class="box">

		<!-- Busca -->
		<div class="box-header" style="padding-bottom:0;">
			
			<form class='atualstudio' method='GET' name='formStatus'>

				<input type='hidden' name='page' value='list_all'/>
				<input type='hidden' name='module' value='donate'/>
				<?php if(!empty($buscar)) { echo "<input type='hidden' name='buscar' value='".$buscar."'/>"; } ?>

				<div class='form-group' style='margin:0;'>
					<label>
						<div class='dtable'>
							<div>Filtrar por status:</div>
							<div>
								<select class='form-control select2' name='status' onchange="document.formStatus.submit();">
									<option value='0'>Todos</option>
									<option value='1'<?php echo ($status == 1 ? " selected" : "") ?>>Pendiente</option>
									<option value='3'<?php echo ($status == 3 ? " selected" : "") ?>>Pagado</option>
									<option value='4'<?php echo ($status == 4 ? " selected" : "") ?>>Entregada</option>
									<option value='5'<?php echo ($status == 5 ? " selected" : "") ?>>Cancelada</option>
								</select>
							</div>
						</div>
					</label>
				</div>

			</form>

			<div class="box-tools">
				<form class='default' method='GET'>
					<div class="input-group" style="width: 250px;">
						
						<input type='hidden' name='page' value='list_all'/>
						<input type='hidden' name='module' value='donate'/>
						
						<input type="text" name='buscar' value='<?php echo $buscar; ?>' class="form-control input-sm pull-right" placeholder="Buscar...">
						
						<div class="input-group-btn">
							<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
						</div>

					</div>
				</form>
			</div>
			
		</div>

		<!-- Resultados -->
		<div class="box-body">

			<table class="table table-bordered">
				<tr>
					<th>#</th>
					<th>Prot.</th>
					<th>Account</th>
					<th>Coin's</th>
					<th>Valor</th>
					<th>Método</th>
					<th>Data</th>
					<th>Status</th>
					<th>Última modificación</th>
					<th style='width: 50px'>Opciones</th>
				</tr>

				<?php
				$pagin['max_results'] = 15;
				$pagin['link'] = "?page=list_all&module=donate";
				$pagin['link'] .= (!empty($buscar) ? "&buscar=".$buscar : "");
				$pagin['link'] .= (!empty($status) ? "&status=".$status : "");
				$pagin['atual'] = (!empty($_GET['pg']) && is_numeric($_GET['pg']) ? intval($_GET['pg']) : 1); $pagin['begin'] = ($pagin['atual']-1) * $pagin['max_results'];

				$consulta = Donate::countDonations($buscar, $status);

				$pagin['total_results'] = $consulta[0]['quant'];
				$consulta = Donate::listDonations($pagin['begin'], $pagin['max_results'], $buscar, $status);

				if(count($consulta) == 0) {
					echo'<tr><td colspan="10">¡Ninguna donación encontrada!</td></tr>';
				} else {
					for($i=0, $c=count($consulta); $i < $c; $i++) {
						
						$mpxpl = explode('_', $consulta[$i]['metodo_pgto']);
						$metodo = $mpxpl[0];
						
						echo"
						<tr>
							<td>".((($pagin['atual']-1)*$pagin['max_results'])+($i+1))."</td>
							<td>".$consulta[$i]['protocolo']."</td>
							<td>".$consulta[$i]['account']."</td>
							<td>".(intval($consulta[$i]['quant_coins'])+intval($consulta[$i]['coins_bonus']))." ".(!empty($consulta[$i]['coins_bonus']) ? "<span style='font-size:12px;'>(".$consulta[$i]['coins_bonus']."&nbsp;bônus)</span>" : "")."</td>
							<td>".obtainCurrencySymbol($consulta[$i]['currency'])."&nbsp;".number_format(trim($consulta[$i]['valor']), 2, ',', '.')."</td>
							<td style='font-size:13px;'>".$metodo."</td>
							<td style='font-size:13px;'>".date('d/m/Y H:i', ($consulta[$i]['data']))."</td>
							<td>".obtainOrderStatusName($consulta[$i]['status'])."</td>
							<td style='font-size:13px;'>".(empty($consulta[$i]['ultima_alteracao']) ? 'Todavía no' : date('d/m/Y H:i', ($consulta[$i]['ultima_alteracao'])))."</td>
							<td class='opcs'>
								<a href='?page=delete&module=donate&protocolo=".$consulta[$i]['protocolo']."' title='Borrar' class='btn btn-danger'><i class='fa fa-remove'></i></a>
							</td>
						</tr>
						";
					}
				}
				?>
			</table>

		</div>
		<?php require('private/paginate.php'); ?>

	</div>

</section>

