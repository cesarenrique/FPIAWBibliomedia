<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Libros</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
  background-color:white;

}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}


.contenedor-01{
    width:100%;
    padding-top: 40px;
    background-color: gray;

}

.contenedor-form{
    width:60%;
    margin: auto;
    background-color:white;
    padding: 30px;
}
</style>
</head>
<body>


  <ul>
    <li><a href="<?php echo url('/autor/listar') ?>">Autores</a></li>
    <li><a href="<?php echo url('/autor/registrar') ?>">Registrar Autores</a></li>
  </ul>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
     <tbody>

        <?php

    foreach ($todosAutores as $fila) {
      // code...

			echo "<tr>
					<th scope='row'>{$fila['id']}</th>";

			echo "
          <td>{$fila['nombre']}</td>
          <td>{$fila['apellidos']}</td>

					<td>
						<form id='formulario{$fila['id']}' action='". url('/autor/modificarForm')."' method='post'>
              <input type='hidden' name='_token' value='". csrf_token()."'>
							<input type='hidden' name='id' value='{$fila['id']}' />
                            <button ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
						</form>
          </td>
          <td>
                        <span onclick='eliminar({$fila['id']})' ><i class='fa fa-trash-o' aria-hidden='true'></i></span>
					</td>

    			</tr>";



		}
    ?>
    </body>
</table>
<script>
	function eliminar(id){

    	var msg = confirm("Seguro que desea eliminar el autor");

		if (msg) {
			window.location = "<?php echo url('/autor/borrar')?>/"+id;
		}
  }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
