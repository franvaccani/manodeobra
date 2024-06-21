function filtrabusqueda(){
    var link_search='index.php?pagina=buscador&p=1';
    var filtro_cate=false;
    var i_cate=0;
    var limpio_id='';

    $("#filter_1 input").each(
      function(){
        if($(this).is(':checked')){
          filtro_cate = true;
          var tomo_id = $(this).attr('id');
          if(i_cate!=''){var separa=',';}else{var separa='';}
          limpio_id += separa + tomo_id.replace('check_','');
          console.log(limpio_id);
          i_cate++;
        }


    });
if(filtro_cate){
  link_search +='&cat='+limpio_id;
}


location.href=link_search;
}
