<?php 
if($data!==null || isset($data)):
$num=count($data);
// echo $num;
?>
<table class="table table-hover table-striped" style="font-size:14px">
	<thead>
		<tr><th>Penyakit</th>
			<th>Status Inferensi</th>
			
			<th>Keyakinan</th>
		</tr>
	</thead>
	<tbody>
		<?
			foreach ($data as $key => $value) {
				# code...
				echo "<tr>";
				echo "<td>";
				// echo "<div class='panel panel-info panel-body'><h5>Penyakit</h5>";
				echo "<p>";
				echo($value['detail']['penyakit']);
				echo "</p>";
				echo "</td>";
				if($value['proses']==true){
					$proses="<span class='label label-warning'>Akan diproses..</span>";
				}else{
					$proses="<span class='label label-default'>Tidak diproses..</span>";
				}
				// echo "<td>".$value['status']." ".$proses."</td>";
				echo "<td>".$value['status']."</td>";

			
				echo "<td>";
				// echo "<div class='panel panel-success panel-body'><h5>Dempster Shafer</h5>";
				// echo "<p>";
				// echo "<label class='label label-success' style='font-size:18px'>".(round($value['hasil'],2)."%")."</label>";
				?>
		
				<div class="progress " style="height:30px;margin-bottom:0px;">
				<?php if($value['hasil']>0): ?>
				  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['hasil']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value['hasil']."%" ?>">
				    <span class="text-left" style='font-size:18px;font-weight:bold'><?php echo round($value['hasil'],2)."%"; ?></span>
				  </div>
				<?php else: ?>
				<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="">
				    <span class="" style="font-size:18px;font-weight:bold;color:#000">0%</span>
				  </div>
				<?php endif ?>
				</div>
				<?php
				// echo "</p>";
				echo "</td>";

				echo "</tr>";
			}
			

			?>
		
	</tbody>
</table>
<?php endif; 
if($result!=null || isset($result)):
	echo $result;
endif;
?>

<a href="<?php echo base_url('wizard') ?>" class="btn btn-danger btn-lg btn-block">Diagnosa Penyakit Padi</a>


