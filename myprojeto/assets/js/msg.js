
$(function(){

    $('#msg').on('keyup',function(e){
        if(e.keyCode == 13){
            var msg=$(this).val();
            $(this).val('');

            if(msg.length >0){
                $.ajax({
                    url:BASE+'ajax/add_menssage',
                    data:{msg:msg,amigo:AMIGO},
                    type:'POST',
                    dataType:'json',
                    success:function(json){
                        if(json.erro==''){
                            
                        }else{
                           window.location.href=BASE;
                        }
                    }
                });
            }
        }
    }),


    $('#enter').on('click',function(){
        var msg=$('#msg').val();
        $('#msg').val('');
        if(msg.length >0){
            $.ajax({
                url:BASE+'ajax/add_menssage',
                data:{msg:msg,amigo:AMIGO},
                type:'POST',
                dataType:'json',
                success:function(json){
                    if(json.erro==''){
                        
                    }else{
                       window.location.href=BASE;
                    }
                }
            });
        }
    }),

    

    chat=()=>{
        if(AMIGO !=''){
            $.ajax({
                url:BASE+'ajax/get_messages',
                data:{amigo:AMIGO},
                type:'POST',
                dataType:'json',
                success:function(json){
                    if(json.erro==''){
                        
                    }else{
                    window.location.href=BASE;
                    }
                },
                complete:function(){
                    chat();
                }
            });
        }else{
            setTimeout(function(){
                chat();
            },3000);
            
        }
    },
    $('.start').on('click',function(){
        chat();
        $('.start').hide();
    })

    
});

