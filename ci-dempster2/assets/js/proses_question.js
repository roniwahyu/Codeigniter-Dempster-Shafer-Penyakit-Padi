$('document').ready(function(){
	$("body").on("click","#save",function(e){
            e.preventDefault();
            save(0);
        });
	function save(id){
            var data = $('form#question').serializeArray();
           
            data.push({name: 'ajax', value: 1});
            // $.post(baseurl+"submit", data);
            
            $(this).ready(function(){
                $.ajax({
                    url:baseurl+"submit",
                    data:data,
                    type:"POST",
                    success:function(){
                        $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        // $('.kelola').fadeOut(200);

                        window.location.href=redirect;
                        
                    
                    }
                });
            });
        }
});