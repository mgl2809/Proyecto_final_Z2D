/**
 * Autor: Jose Maria Salas
 * 
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar

   //Funciones para el manejo de Grupos
   
   //Buscar Materias por Carrera y Semestre
          $('#buscar').live('click',function(){
        //obtengo el id que guardamos en data-id
        var idesp= document.Buscargrupo.carrera.value;
	    var sem = document.Buscargrupo.semestre.value;
       
        params={};
		params.idesp=idesp;
		params.sem =sem;
		
        params.action="BuscarMateria";
         $('#content').load('listar_grupo.php', params,function(){
            
			
        })
	
    })

//Buscar por Numero de Control

      $('#buscarnc').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.BuscaAlumno.nc.value;
	
       
        params={};
		params.id=cat;
		
        params.action="Buscar_nc";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
        })
		
		
	
    })

//Seleccionar Materia a Crear Grupo

  $('.createGroup').live('click',function(){
        //obtengo el id que guardamos en data-id
        var nombre=$(this).attr('data-id');
        var carrera=$(this).attr('data-id2');
        var semestre=$(this).attr('data-id3');
        var materia=$(this).attr('data-id4');
        
        
        
        var entrar = confirm("¿Crear el Grupo para:  "+materia+"?");
		
		
		  if (entrar == true){
		      
              params={};
		      params.nombre=nombre;
              params.carrera=carrera;
              params.semestre=semestre;
              params.materia=materia;
		        params.action="Select_gpo";
        $('#popupbox').load('listar_grupo.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		      }
	
    })
	
//Elimianr a un alumno de la carga de la materia
	
	$('.elimianr_carga').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
		var id2=$(this).attr('data-id2');
        var ida= document.ListaCargaA.ida.value;
		var inc= document.ListaCargaA.nc.value;
		
		var entrar = confirm("¿Eliminnar la Materia:  "+id2+"?");
		
		
		  if (entrar == true){
			  
				params={};
		params.id=id;
		params.ida=ida;
		params.inc=inc;
		
        params.action="ElimianrCarga";
        $('#content').load('listar_alumnos.php', params,function(){
            
			
        })
		  }
    })


//Asignar una Materia a un Alumno// Seleccionar el Semestre

      $('#AsignaraCred').live('click',function(){
        //obtengo el id que guardamos en data-id
        var cat= document.ListaCargaA.ida.value;
		var nc= document.ListaCargaA.nc.value;
		
	
	    
        params={};
		params.ida=cat;
		params.nc =nc;
		
        params.action="AsignarCredito";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
	
	

//Mostrar Materias a Seleccioanar

      $('#slect_carrera').live('click',function(){
        //obtengo el id que guardamos en data-id
		var ida= document.select_Carrera.ida.value;
        var idcar= document.select_Carrera.carrera.value;
		var idsem= document.select_Carrera.semestre.value;
		var nc = document.select_Carrera.nc.value;
	
	  
	    
        params={};
		params.ida=ida;
		params.idcar=idcar;
		params.idsem = idsem;
		params.nc=nc;
	
        params.action="ListarCargaAsignar";
        $('#popupbox').load('listar_alumnos.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
		
		
	
    })
	
	//Seleccionar Caga A Agregar a un Alumno
	
	
	$('.select_carga').live('click',function(){
        //obtengo el id que guardamos en data-id
		var id=$(this).attr('data-id');
		var id2=$(this).attr('data-id2');
		var ida= document.MateraiasCarga.ida.value;
        var nc= document.MateraiasCarga.nc.value;
		
	
	   var entrar = confirm("¿Asignar la Materia:  "+id2+"?");
		
		
		  if (entrar == true){
        params={};
		params.id=id;
		params.ida=ida;
		params.inc=nc;
	
        params.action="AsignarCargaAlumno";
        $('#content').load('listar_alumnos.php', params,function(){
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
