<div class="container">
    <div class="row">
		<h2>Use butons to simulate radio butons</h2>
        
        <div class="form-group">
    		<label for="happy" class="col-sm-4 col-md-4 control-label text-right">Are you happy ?</label>
    		<div class="col-sm-7 col-md-7">
    			<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="Y">YES</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="N">NO</a>
    				</div>
    				<input type="hidden" name="happy" id="happy">
    			</div>
    		</div>
    	</div>
        <br /><br />
        <div class="form-group">
        	<label for="fun" class="col-sm-4 col-md-4 control-label text-right">Is it fun ?</label>
    		<div class="col-sm-7 col-md-7">
    			<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm active" data-toggle="fun" data-title="Y">YES</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="X">I don't know</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="N">NO</a>
    				</div>
    				<input type="hidden" name="fun" id="fun">
    			</div>
    		</div>
    	</div>
	</div>
    <br /><br />
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading"><h2 class="panel-title">How to use</h2></div>
            <div class="panel-body">
                You can use this snippet with a normal form and get the returns value using the hidden input.
            </div>
        </div>
        
    </div>
</div>
