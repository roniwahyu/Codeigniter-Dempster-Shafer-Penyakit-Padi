<div class="row" style="margin-top:40px;">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">R1</a>
            <p>Kriteria 1 (Terjatuh)</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" >R2</a>
            <p>Kriteria 2 (Mata Pedih)</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" >R3</a>
            <p>Kriteria 3 (Terbakar)</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" >R4</a>
            <p>Kriteria 4 (Terhirup)</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-default btn-circle" >R5</a>
            <p>Kriteria 5 (Terpercik)</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-6" type="button" class="btn btn-default btn-circle" >R6</a>
            <p>Kriteria 6 (Kebisingan)</p>
        </div>
    </div>
</div>
<form id="question" role="form" method="post" action="<?php echo base_url('question/proses'); ?>">
    <input type="hidden" name="id_alternatif" value="<?php echo !(empty($id))?$id:0; ?>">
    <div class="row setup-content" id="step-1">
        <?php $this->load->view('resiko1'); ?>
    </div>
    <div class="row setup-content" id="step-2">
        <?php $this->load->view('resiko2'); ?>
    </div> 
    <div class="row setup-content" id="step-3">
       <?php $this->load->view('resiko3'); ?>
    </div> 
    <div class="row setup-content" id="step-4">
       <?php $this->load->view('resiko4'); ?>
    </div>
    <div class="row setup-content" id="step-5">
        <?php $this->load->view('resiko5'); ?>
    </div> 
    <div class="row setup-content" id="step-6">
       <?php $this->load->view('resiko6'); ?>
       <div class="col-md-12 text-center" style="margin-top:20px;">
        <button id="save" class="btn btn-danger btn-lg nextBtn" type="submit">Selesai!</button>
        </div>
    </div>
    
</form>
</div>