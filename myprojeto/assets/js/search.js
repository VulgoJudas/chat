$(function(){
    $('#busca').on('blur',function(){
        var v=$('#busca').val();

        if(v ==''){
            $('.searchResults').hide();
        }
    });

    $('#busca').on('keyup',function(){
        var valor=$('#busca').val();
        var action=$('#busca').attr('data-type');

        $.ajax({
            url:BASE+'ajax/'+action,
            type:'POST',
            dataType:'json',
            data:{valor:valor},
            success:function(json){
                if($('.searchResults').length==0){
                    $('#busca').after('<div class="searchResults"></div>');
                }
                $('.searchResults').css('left',$('#busca').offset().left+'px');
                $('.searchResults').css('top',$('#busca').offset().top+$('#busca').height()+5+'px');
                var html='';

                for(var i in json){
                    html +='<div class="exibir"><a id="click" href="'+BASE+'home/usersearch/'+json[i].id+'">'+json[i].name+'</a></div>';
                }

                $('.searchResults').html(html);

                $('.searchResults').show();
            }
        });
       
    });

    
});