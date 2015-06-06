/**
 * Autor: Jose Maria Salas Torres
 * 
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar

    //Funciones para el manejo de Alumnos
   
    //Buscar Alumnos por nombre
    $('#buscarC').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaActividad.Carrera.value;
	
       
        params={};
        params.id=cat;
		
        params.action="Listar_a";
        $('#content').load('listar_actividad.php', params,function(){
            
			
            })
		
		
	
    })

    //Ver detalles de la Actividad

    $('.ver').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        
        params={};
        params.id=id;
		
        params.action="detalles";
        $('#popupbox').load('listar_actividad.php', params,function(){
            $('#block').show();
            $('#popupbox').show();  
			
        })
	
    })
	

    //Imprimir el Formato

    $('.print').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');	
        var ruta="../../presentacion/reportes/autorizacion_actividad.php?id="+id+"";
      
        var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=600, width=800, top=200, left=200";
        win=window.open(ruta ,"",caracteristicas);
     
		  
    })
    //Autorizar Actividad
    
    $('#autC').live('click',function(){
        var id= document.frm_AutCredito.ids.value;
        var carrera= document.frm_AutCredito.carrera.value;
         
        
        
        params={};
        params.id=id;
        params.carrera=carrera;
		
        var entrar = confirm("¿Se Autoriza la Activiad Complementaria?");
		
		
        if (entrar == true){
		      
            var ruta="../../presentacion/reportes/autorizacion_actividad.php?id="+id+"";
      
            var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=600, width=800, top=200, left=200";
            win=window.open(ruta ,"",caracteristicas);
            params.action="AutorizarSolicitud";
            $('#content').load('listar_actividad.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
			
			
            })
        }
    })
    

    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
