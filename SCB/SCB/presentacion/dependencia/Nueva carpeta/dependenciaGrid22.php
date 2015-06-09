	<form name="nuevo" id ="new">
	 <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
	    <table> 
		  <tr>
	<td>Nombre de la Dependencia  <input placeholder="Nombre del encargado" type="text" name="Nombre" maxlength="30" size="40"> </td>
    <tr>
	<td>Ubicacion <input placeholder="Numero encargado" type="text" name="Num" maxlength="30" size="40"> </td>
	</tr>
	<tr><td>Responsable <input placeholder="Usuario" type="text" name="user" maxlength="30" size="40"> </td></tr>
	</tr>
	<tr>
	<td>
	<div class ="buttonsBar">
	<a id="saveA" class="button" href="javascript:void(0);">Buscar</a>
	</div></td>
	</tr>
	
	    </table>
	</form>

	<form name="frm_listdocente" id="frm_listdocente">
       
    <table>
        <thead>
            <tr>
                <th>Id Dependencia </th>
                <th>Nombre de la Dependencia</th>
                <th>Ubicacion</th>
                <th>Responsable</th>
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
                    <td><?php echo $mDocente->getid(); ?></td>
                    <td><?php echo $mDocente->getidusuario(); ?></td>
                    <td><?php echo $mDocente->getnombre(); ?></td>
                    <td><?php echo $mDocente->getresponsable(); ?></td>
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

