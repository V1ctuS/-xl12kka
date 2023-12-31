<?php

$nid = !empty($_GET['nid']) ? intval($_GET['nid']) : '';

require('private/classes/classNews.php');

$findNew = News::findNew($nid);
if(count($findNew) == 0){
	fim('Noticia inexistente!');
}

?>

<section class="content-header">
	<h1>
		Borrar Noticia
	</h1>
	<ol class="breadcrumb">
		<li><i class="fa fa-newspaper-o"></i> Noticias</li>
		<li class="active">Borrar</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		
		<div class="box-body">
				
			Você tem certeza que deseja excluir a notícia abaixo?<br /><br />
			
			<table class="table table-bordered">
				<tr>
					<th style='width:90px;'>Imagen</th>
					<th>Noticia</th>
					<th style='width: 130px'>Creada en</th>
				</tr>

				<?php
				echo"
				<tr>
					<td><img width='90' height='90' src='".((strlen(trim($findNew[0]['img'])) > 0) ? (file_exists('../'.$dir_newsimg.trim($findNew[0]['img'])) ? '../'.$dir_newsimg.trim($findNew[0]['img']) : '../imgs/nm/no-img-new.jpg') : '../imgs/nm/no-img-new.jpg')."' /></td>
					<td><b>".$findNew[0]['title_pt']."</b><br />".trim(substr(strip_tags($findNew[0]['content_pt']), 0, 270)).(strlen($findNew[0]['content_pt']) > 270 ? '...' : '')."</td>
					<td>".date('d/m/Y H:i', ($findNew[0]['post_date']))."</td>
				</tr>
				";
				?>
			</table>
			
			<br />

			<a class='btn btn-info' href='javascript:history.back();'>&laquo; Volver</a>
			<a class='btn btn-danger usarJquery' href='./?engine=delete&module=news&nid=<?php echo $nid; ?>'>Borrar permanentemente</a>

		</div>
		
	</div>
</section>



