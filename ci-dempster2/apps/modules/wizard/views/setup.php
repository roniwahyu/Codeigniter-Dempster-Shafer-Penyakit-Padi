<div class="row" style="">

<form id="question" role="form" method="post" action="<?php echo base_url('wizard/proses_wizard'); ?>">
    
    <!-- <div class="row setup-content" id="step-1"> -->
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <h1 style="margin-top:0px;">Gejala Penyakit Dan Densitas</h1>
		</div>  
        <div class="btn-group" data-toggle="buttons">
                <?php 
                    if($data!==null): 
                        foreach ($data as $key => $value) {?>    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                        
                        <div class="btn btn-block btn-default" style="text-align:left">
                            <div class="input-group">
                              <span class="input-group-addon info" style="text-align:left;width:100%">
                                <input type="checkbox" value="<?php echo $value['id_gejala'] ?>" name="id_gejala[]" id="id_gejala">
                                <span style="margin-left:0px;" ><?php echo "(".$value['kode'].") ".$value['gejala'] ?>
                                
                                </span>                              
                                </span>
                              
                              <span class="input-group-btn success">
                                <input style="width:100px;" aria-label="..." class="form-control" type="text" placeholder="<?php echo $value['densitas'] ?>" name="densitas[]" id="densitas">
                              </span>
                            </div><!-- /input-group -->
                             
                           
                        </div>
                        
                     </div>
                    

                     <?php } 
                    endif;


                ?>
                <?php echo var_dump($default); ?>
    	</div>

    <!-- </div> -->
   
    <div class="col-md-12 text-center" style="margin-top:30px">
    <!-- <button id="save" class="btn btn-danger btn-lg btn-block nextBtn" type="submit">Selesai!</button> -->

    </div>
</form>
</div>