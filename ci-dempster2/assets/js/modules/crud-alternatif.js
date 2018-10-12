/*
	AJAX CRUD JS BETA
	===================
	Digunakan untuk crud standar berbasis codeigniter
	Dibuat: 2013
	Dikompilasikan: 01/09/2014 - Updated: 29/12/2014
	Pengembang: Syahroni Wahyu Iriananada - roniwahyu@gmail.com 
    Diupdate: 29 Desember 2014 - Memperbaiki Form Reset 
*/

$(document).ready(function () {
	
        $("body").on("click","#save",function(e){
            e.preventDefault();
            save(0);
        });
     
        $("body").on("click","#save_edit",function(e){
            e.preventDefault();
                var id=$(this).attr("id");
                // alert ($(this).attr("id"));
                save(id);

        });     

         $("body").on("click",'.baru',function(e){
            e.preventDefault();
            // save(0);
            // $('.form').trigger("reset");
            $('button#save_edit').hide(200);
            $('button#save').fadeIn(200);
            $('form').clearForm();
            var id=0;
            
            //tampilkan div class kelola dan form didalamnya                       
            $('.kelola').show(200);
            // alert(id);
        });

        
        $("body").on("click",'.reset',function(e){
            e.preventDefault();
             // $(".reset").click(function() {
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").val("");
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").reset();
             $('button#save_edit').hide(200);
            $('button#save').fadeIn(200);
            $('form').clearForm();
           
            var id=null;
        });


        $("body").on("click",'.batal',function(e){
            e.preventDefault();
            // save(0);
            // $('.form').trigger("reset");
            $('form').clearForm();
            //sembunyikan div class kelola dan form didalamnya      
            $('.kelola').fadeOut(100);
            $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        // $('.kelola').fadeOut(200);

                        oTable.fnClearTable( 0 );
                        oTable.fnDraw();
                        
                        $('#inside').addClass('active in');
                        $('li.daftar').addClass('active');
                        $('li.baru').removeClass('active');
                        $('#outside').removeClass('active');

        });   

        $("body").on("click",".edit",function(e){ 
            e.preventDefault();
            $('#outside').addClass('active in');
            $('li.baru').addClass('active');
            $('li.daftar').removeClass('active');
            $('#inside').removeClass('active');
            $('.kelola').show(200);
           
            var id=$(this).attr("id");
            $(this).ready(function(){
                    $.ajax({
                        url:baseurl+"get/"+id,
                        type:"get",
                        dataType:"json",
                        success:function(data){

                            for (var i in data) {
                                $('input[name="'+i+'"]').val(data[i]);
                                //gunakan ini untuk repopulate select option ke form dengan ajax
                                $("select#"+i+"").find('option').selectit(i);
                                $("form#addform").find('checkbox').each(function(){
                                    $("checkbox#"+i+"").attr('checked','checked');
                                });

                            }
                            $('#body').val(data.body);
                            $('button#save').hide(200);
                            $('button#save_edit').fadeIn(200);
                           
                        }
                    });
            });
            
        });

        $("body").on("click",".alat",function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            var id2 = id.substr(id.length -1);
            var alat = "alat"+id2;
            if($(this).is(":checked"))
            {
                $("#"+alat).css("display","block");
            } else {
                $("#"+alat).css("display","none");
            }
        });


        $("body").on("click",".detail",function(e){
            e.preventDefault();
        });

        $("body").on("click",".delete",function(e){
            e.preventDefault();
                var del_data={
                    id:$(this).attr("id"),
                    ajax:1
                }
                if(confirm('Anda Yakin Ingin Menghapus?')){
                    $(this).ready(function(){
                            
                        $.ajax({
                            url: baseurl+"delete/",
                            type: 'POST',
                            data: del_data,
                            success:function(msg){
                                oTable.fnClearTable(0);
                                oTable.fnDraw();
                            }
                        });
                    });
                }
        });
        
        function save(id){
            var data = $('form').serializeArray();
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

                       
                        
                        $('#inside').addClass('active in');
                        $('li.daftar').addClass('active');
                        $('li.baru').removeClass('active');
                        $('#outside').removeClass('active');
                        oTable.fnClearTable( 0 );
                        oTable.fnDraw();
                        // va/r id=0;
                        //$('.id').trigger("reset");
                        // alert(data);
                    }
                });
            });
        }

});

// function resetall(){
            $.fn.clearForm = function() {
              return this.each(function() {
                var type = this.type, tag = this.tagName.toLowerCase();
                if (tag == 'form')
                  return $(':input',this).clearForm();
                if (type == 'text' || type=='hidden' || type == 'password' || tag == 'textarea')
                  this.value = '';
                else if (type == 'checkbox' || type == 'radio')
                  this.checked = false;
                else if (tag == 'select')
                  this.selectedIndex = -1;
              });
            };
        // }

        //kendalikan select box/repopulate selection option with ajax
        $.fn.selectit=function(id){
             return this.each(function(){
                if($(this).val()==($('#'+id+'').val())){
                     $(this).attr('selected','selected');
                }
            });
        }
        //kendalikan select box/repopulate selection option with ajax
        $.fn.checkit=function(id){
             return this.each(function(){
                // if($(this).val()==($('#'+id+'').val())){
                     $(this).attr('checked','checked');
                // }
            });
        }