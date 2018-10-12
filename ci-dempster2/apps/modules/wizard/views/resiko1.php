   <!--<div class="col-xs-12"> -->
            <!-- <div class="col-md-12 text-center" style="margin-top:30px;"> -->
               
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>Gejala Penyakit</h1>
                </div>  
                <!-- <div class="btn-group" data-toggle="buttons"> -->
                <?php 
                    if($data!==null): 
                        foreach ($data as $key => $value) {?>    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        
                   
                        <label class="btn btn-lg btn-block btn-info" style="text-align:left"><span class="text-left">
                            <input type="checkbox" value="<?php echo $value['id_gejala'] ?>" name="id_gejala" id="id_gejala">
                            <span style="margin-left:0px;" ><?php echo "(".$value['kode'].") ".$value['gejala'] ?></span>
                            </span>
                        </label>
                     </div>
                     <?php } 
                    endif;
                ?>
                <!-- </div> -->
                
                    <!-- <label class=""><input type="checkbox" value="<?php echo $value['id_gejala'] ?>" name="id_gejala" id="id_gejala"> <?php echo $value['gejala'] ?></label> -->

                   
            <!-- </div> -->
            
        
        <!-- </div>