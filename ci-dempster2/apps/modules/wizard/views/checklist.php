<?php 
if($data!==null){
	?>
	
<div class="row">
	<div class="col-xs-6">
            <h3 class="text-center">Colorful Example</h3>
            <div class="well" style="max-height: 300px;overflow: auto;">
                <ul id="check-list-box" class="list-group checked-list-box">
	<?php
	foreach ($data as $key => $value) {?>
		

                  <li class="list-group-item" id="<?php echo $value['kode'] ?>" data-id="<?php echo $value['id_gejala'] ?>" ><?php echo $value['gejala'] ?></li>
               

<?php } ?>
 </ul>
                <br />
                <button class="btn btn-primary col-xs-12" id="get-checked-data">Get Checked Data</button>
            </div>
            <pre id="display-json"></pre>
        </div>
</div>
<?php } ?>