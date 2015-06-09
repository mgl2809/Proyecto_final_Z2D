<h2><?php echo $view->label; ?></h2>
<form name="frm_mod_docente" id="frm_mod_docente" method="POST" action=" ">
    <div class="bar">
        <table>
            <?php
            foreach ($view->ListaDocentes as $mDocente):
                ?>
               <tr>
                <td>
                    Nombre de la Dependencia:
                      <input type="text" id="nombre" name="nombre" size="30" />
				</td>
            </tr>  	
			<tr>
				<td>
					Ubicacion:
					<input type="text" id="ub" name="ub" size="30"/>
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
                <?php
                endforeach;
            ?>
        </table>
    </div>
    <div class="buttonsBar">
        <a id="updateD" class="button" href="javascript:void(0);">Guardar cambios</a>
        <a id="cancel" class="button" href="javascript:void(0);">Regresar</a>
    </div>
</form>