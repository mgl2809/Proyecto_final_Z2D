<form name="frm_listdocente" id="frm_listdocente">
	<form name="frm_listdocente2" id="frm_listdocente2">
    Nombre del programa <input placeholder="Nombre del programa" type="text" name="Nombre_programa" maxlength="30" size="40" >
	<br>
    Descripcion <input placeholder="Descripcion" type="text" name="Descripcion" maxlength="30" size="40" >
	<br>
	Caracteristicas <input placeholder="Caracteristicas" type="text" name="carac" maxlength="30" size="40" >
	<br>
	Monto <input placeholder="Monto" type="text" name="mont" maxlength="30" size="40">
	<br>
    Estatus <input placeholder="Estatus" type="text" name="est" maxlength="30" size="40" >
	<br>
	<a class="saveP" href="javascript:void(0);"id= "saveP">Registrar</a>
	<br>
	<br>
	</form>
	
    <table>
        <thead>
            <tr>
                <th>Id programa </th>
                <th>Nombre del programa</th>
                <th>Descripcion</th>
                <th>Caracteristicas</th>
                <th>Categoria</th>
                <th>Monto</th>
				<th>Estatus</th>
				<th>Modificar</th>
				<th>Eliminar</th>
				
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($view->ListaDocentes as $mDocente):
                ?>               
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $mDocente->getid(); ?></td>
                    <td><?php echo $mDocente->getidusuario(); ?></td>
                    <td><?php echo $mDocente->getnombre(); ?></td>
					
                    <td><a class="select_md" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Modificar</a></td>
                    <td><a class="select_ed" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>


