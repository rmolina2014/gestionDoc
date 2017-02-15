<?
 include_once "../tema/tema.php";
 $temas = new Tema();
 $res=$temas->prueba_consulta();
?>
  <section class="content-header">
        <h4>Listado de Temas</h4>
        <div class="pull-right">
          <div class="actions">
                <?php echo Html::linkAction("crear/",'Crear Registro')?>
          </div>
        </div>
     </section>

     <section class="content">
     
        <table class="table table-hover" id="tabla2">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
            </tr>
        </thead>
         <tbody>
            <?php foreach ($res->items as $item) : ?>
                <tr>
                    <?php foreach ($item->fields as $field) : ?>
                    <td><?php echo ($item->$field)?></td>
                    <?php endforeach?>
                    <td>
                        <?php echo Html::linkAction("editar/$item->id",'Editar')?> |
                        <?php echo Html::linkAction("borrar/$item->id",'Borrar', 'onclick="return confirm(\'¿Está seguro?\')"')?>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
        
     </section>

?>