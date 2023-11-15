<section class="content-header">
	<h1>
		Donate Logs
	</h1>
	<ol class="breadcrumb">
		<li><i class="fa fa-file-text-o"></i> Logs</li>
		<li class="active">Doações</li>
	</ol>
</section>

<section class="content">

	<?php
	$buscar = !empty($_GET['buscar']) ? vCode($_GET['buscar']) : '';
	require('private/classes/classLogs.php');
	?>

	<div class="box">
		
		<div class="box-body">
			Vea las donaciones efectuadas y sus detalles en la página de <a href='?page=list_relat&module=donate'>Informe de donaciones</a>.
		</div>
		
	</div>
	
	<section class="content-header">
		<h1>
			Módulos automáticos
		</h1>
	</section>
	<br />

	<div class="box">
		
		<div class="box-body">
			Cuando los intermediarios de donaciones, como PagSeguro, PayPal, etc, envían notificaciones para nosotros, recibimos y guardamos registros de todas las transacciones.<br />
			A continuación se enumeran los archivos de registro existentes. Se almacenan separados por mes. Si el archivo del mes que busca no existe, no recibimos transacciones en ese mes.<br /><br />
			<?php
			$pasta = $admref_ucp.'ipn/logs/';
			$arquivosLog = '';
			if(is_dir($pasta)) {
				$diretorio = dir($pasta);
				while(($arquivo = $diretorio->read()) !== false) {
					$xplEXT = explode('.', $arquivo);
					$ext = strtolower($xplEXT[(count($xplEXT)-1)]);
					if($ext == 'txt') {
						$xplClean = explode('__', $arquivo);
						$arquivosLog .= "<li><a target='_blank' href='".$pasta.$arquivo."'>".($xplClean[0])."</a></li>";
					}
				}
				$diretorio->close();
			}
			if(empty($arquivosLog)) {
				echo '<b>No hay archivos de registro por el momento.</b>';
			} else {
				echo '<ul>'.$arquivosLog.'</ul>';
			}
			?>
		</div>
		
	</div>
	
	<section class="content-header">
		<h1>
			Transferências <?php echo $coinName.'\'s'; ?> - Para otra cuenta
		</h1>
	</section>
	<br />

	<div class="box">
		
		<!-- Busca -->
		<div class="box-header" style="padding-bottom:0;">
			<div class="box-tools">
				<form class='default' method='GET'>
					<div class="input-group" style="width: 250px;">
						
						<input type='hidden' name='page' value='donate'/>
						<input type='hidden' name='module' value='logs'/>
						
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
					<th>Cantidad</th>
					<th>Remitente</th>
					<th>Destinatario</th>
					<th style='width: 140px'>Fecha</th>
				</tr>

				<?php
				$pagin['max_results'] = 50;
				$pagin['link'] = "?page=donate&module=logs";
				$pagin['link'] .= (!empty($buscar) ? "&buscar=".$buscar : "");
				$pagin['atual'] = (!empty($_GET['pg']) && is_numeric($_GET['pg']) ? intval($_GET['pg']) : 1); $pagin['begin'] = ($pagin['atual']-1) * $pagin['max_results'];

				$consulta = Logs::countTransfDonateLogs($buscar);

				$pagin['total_results'] = $consulta[0]['quant'];
				$consulta = Logs::listTransfDonateLogs($pagin['begin'], $pagin['max_results'], $buscar);

				if(count($consulta) == 0) {
					echo'<tr><td colspan="4">No hay registros encontrados!</td></tr>';
				} else {
					for($i=0, $c=count($consulta); $i < $c; $i++) {
						
						echo"
						<tr>
							<td>".$consulta[$i]['quantidade']."</td>
							<td>".$consulta[$i]['remetente']."</td>
							<td>".$consulta[$i]['char_name']." (Account: ".$consulta[$i]['destinatario'].")</td>
							<td>".date('d/m/Y \à\s H:i', strtotime($consulta[$i]['tdata']))."</td>
						</tr>
						";
					}
				}
				?>
			</table>

		</div>
		<?php require('private/paginate.php'); ?>

	</div>
	
	<section class="content-header">
		<h1>
			Transferências <?php echo $coinName.'\'s'; ?> - Para personaje in-game
		</h1>
	</section>
	<br />

	<div class="box">
		
		<!-- Busca -->
		<div class="box-header" style="padding-bottom:0;">
			<div class="box-tools">
				<form class='default' method='GET'>
					<div class="input-group" style="width: 250px;">
						
						<input type='hidden' name='page' value='donate'/>
						<input type='hidden' name='module' value='logs'/>
						
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
					<th>Cantidad</th>
					<th>Account</th>
					<th>Personaje</th>
					<th style='width: 140px'>Fecha</th>
				</tr>

				<?php
				$pagin['max_results'] = 50;
				$pagin['link'] = "?page=donate&module=logs";
				$pagin['link'] .= (!empty($buscar) ? "&buscar=".$buscar : "");
				$pagin['atual'] = (!empty($_GET['pg']) && is_numeric($_GET['pg']) ? intval($_GET['pg']) : 1); $pagin['begin'] = ($pagin['atual']-1) * $pagin['max_results'];

				$consulta = Logs::countConvDonateLogs($buscar);

				$pagin['total_results'] = $consulta[0]['quant'];
				$consulta = Logs::listConvDonateLogs($pagin['begin'], $pagin['max_results'], $buscar);

				if(count($consulta) == 0) {
					echo'<tr><td colspan="4">No hay registros encontrados!</td></tr>';
				} else {
					for($i=0, $c=count($consulta); $i < $c; $i++) {
						
						echo"
						<tr>
							<td>".$consulta[$i]['quantidade']."</td>
							<td>".$consulta[$i]['account']."</td>
							<td>".$consulta[$i]['char_name']."</td>
							<td>".date('d/m/Y \à\s H:i', strtotime($consulta[$i]['cdata']))."</td>
						</tr>
						";
					}
				}
				?>
			</table>

		</div>
		<?php require('private/paginate.php'); ?>

	</div>
	
	<section class="content-header">
		<h1>
			Transferências <?php echo $coinName.'\'s'; ?> - In-game para panel de usuario (online)
		</h1>
	</section>
	<br />

	<div class="box">
		
		<!-- Busca -->
		<div class="box-header" style="padding-bottom:0;">
			<div class="box-tools">
				<form class='default' method='GET'>
					<div class="input-group" style="width: 250px;">
						
						<input type='hidden' name='page' value='donate'/>
						<input type='hidden' name='module' value='logs'/>
						
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
					<th>Cantidad</th>
					<th>Account</th>
					<th>Personaje</th>
					<th style='width: 140px'>Fecha</th>
				</tr>

				<?php
				$pagin['max_results'] = 50;
				$pagin['link'] = "?page=donate&module=logs";
				$pagin['link'] .= (!empty($buscar) ? "&buscar=".$buscar : "");
				$pagin['atual'] = (!empty($_GET['pg']) && is_numeric($_GET['pg']) ? intval($_GET['pg']) : 1); $pagin['begin'] = ($pagin['atual']-1) * $pagin['max_results'];

				$consulta = Logs::countConvOnlineDonateLogs($buscar);

				$pagin['total_results'] = $consulta[0]['quant'];
				$consulta = Logs::listConvOnlineDonateLogs($pagin['begin'], $pagin['max_results'], $buscar);

				if(count($consulta) == 0) {
					echo'<tr><td colspan="4">No hay registros encontrados!</td></tr>';
				} else {
					for($i=0, $c=count($consulta); $i < $c; $i++) {
						
						echo"
						<tr>
							<td>".$consulta[$i]['quantidade']."</td>
							<td>".$consulta[$i]['account']."</td>
							<td>".$consulta[$i]['char_name']."</td>
							<td>".date('d/m/Y \à\s H:i', strtotime($consulta[$i]['cdata']))."</td>
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

