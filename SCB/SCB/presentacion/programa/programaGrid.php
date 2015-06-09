<form name="frm_programa" id="frm_programa" method="POST" action=" ">
    <?php
    echo "<input type='hidden' name='idd' value='" . $view->idd . "'/>";
    ?>
    <div class="bar">
        <table>	
            <tr>
                <td>
                  Nombre del programa:
                      <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					 Caracteristicas:
                    <input type="text" id="caracte" name="caracte" size="50" />
				</td>
			</tr>
			<tr>
				<td>
						Descripcion:
					<input type="text" id="desc" name="desc" size="30"/>
				</td>
			</tr>
			<tr>
				<td>
					  Monto:
                    <input type="text" id="monto" name="monto" size="50" /></td>
				</td>
			</tr>
			<tr>
				<td>
					  Estatus:
                    <input type="text" id="estatus" name="estatus" size="50" /></td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
			</tr>
            <tr>
                <td>
                    Responsable:
                    <input type="text" id="responsable" name="responsable" size="50" /></td>
            </tr>
            <tr>
                <td>
                    <div class="buttonsBar">
                        <a id="saveE" class="button" href="javascript:void(0);">Guardar</a>
                    </div>                                
                </td>
            </tr>
        </table>
    </div>    
</form>
<form name="frm_listaencargado" id="frm_listaencargado">
    <div class="bar">
        <table>
            <tr>  
                <td>
                   Buscar programa por nombre:
                    <input type="text" name="nombre_pro" class="nombre_pro" id="nombre_pro"size="40"/> 
                    <a id="buscarE" class="button" href="javascript:void(0);">Buscar</a>
                </td>
            </tr>  
        </table>
    </div>
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
                    <td><?php echo $mDocente->getid(); ?></td>
                    <td><?php echo $mDocente->getdescripcion(); ?></td>
                    <td><?php echo $mDocente->getcaracteristicas(); ?></td>
                    <td><?php echo $mDocente->getnombre(); ?></td>
                    <td><a class="select_md" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>" data-nombre="<?php echo $mDocente->getnombre();?>">Modificar</a></td>
                    <td><a class="select_ed" href="javascript:void(0);" data-idd="<?php echo $mDocente->getid(); ?>">Eliminar</a></td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>    
        </tbody>
    </table>
</form>

