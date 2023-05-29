<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap/bootstrap.js" defer></script>
    <script src="js/jquery-3.6.4.slim.js" defer></script>
    <script src="js/articulo.js" defer></script>
    <title>Document</title>
</head>

<body>
<form id="headerForm" action="prueba.php" method="post">

<div class="container mt-5">
        <div class="card">

            <div class="card-header">
                <h1>Registro de factura:</h1>
            </div>

            <div class="card-body">
                <div id="headerForm" >
                    <div class="row g-3">
                        <div class="col-12 col-md-6 ">
                            <label for="invoiceNumber" class="form-label">Numero de factura:</label>
                            <input type="text" class="form-control" id="invoiceNumber" name="datos[]" readonly>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <label for="customerName" class="form-label">Nombre del cliente:</label>
                            <input type="text" class="form-control" id="customerName" name="datos[]">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-6 ">
                            <label for="nroCedula" class="form-label">Numero de Cedula:</label>
                            <input type="nroCedula" class="form-control" id="nroCedula" name="datos[]">
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" id="fecha" name="datos[]" value="2023-10-23" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card card-p">

            <div class="card-header">
                <h1>Productos:</h1>
            </div>

            <div class="card-body card-productos">
                <div class="productos">
                    
                    <div  id="productos0" class="productoFrm" >
                        <div class="row" id="div0">
                            <div class="col-3">
                                <label for="nombreProducto" class="form-label">Nombre del producto:</label>
                                <input type="text" class="form-control" id="nombreProducto0[]" name="Producto0[]">
                            </div>
                            <div class="col-2">
                                <label for="valor" class="form-label">Valor de producto:</label>
                                <input type="number" class="form-control" id="valor0" name="Producto0[]">
                            </div>
                            <div class="col-2">
                                <label for="cantidad" class="form-label">Cantidad de producto:</label>
                                <input type="number" class="form-control" id="cantidad0" name="Producto0[]" readonly>
                            </div>
                            <div class="col-2">
                                <label for="total" class="form-label">Total de producto:</label>
                                <input type="number" class="form-control" id="total0" name="Producto0[]" readonly>
                            </div>
                            <div class="col-1  botones">
                                <button class="btn btn-success boton-mas" id="mas0" data-producto="0">+</button>
                            </div>
                            <div class="col-1 botones">
                                <button class="btn btn-warning boton-menos" id="menos0" data-producto="0">-</button>
                            </div>
                            <div class="col-1 botones">
                                <img src="./img/1017530.png" class="eliminar" id="eliminar0"  data-producto="0" alt="" srcset="">
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="botones">
        <button class="btn btn-success " id="guardar" type="submit">Guardar</button>
    </div>
    
</form>


    <div class="botones mb-5">
 
        <button class="btn btn-info" id="añadir">Agregar Articulo</button>

        <button class="btn btn-warning" type="reset">Nueva Factura</button>
    </div>


</div>
   
<div id="mostrarFactura" class="container mt-4 " style="display:none;" >
    <div class="card">
        <div class="card-header">
            Factura <span id='nroFactura'></span>
        </div>
        <div class="card-body">
            <div class="container" id="infoCliente">
                <div class="row">
                    <div class="col">
                        <p>Nombre</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Numero de cedula</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Fecha</p>
                    </div>
                </div>
            </div>
            <div class="card-header banner">
            Productos 
            </div>
            <div class="products-table">
                <table class="table  table-striped">
                    <thead id="data">
                        <tr>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="productosTablaFinal">
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>Smith</td>
                            <td>Thomas</td>
                            <td>smith@example.com</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>Merry</td>
                            <td>Jim</td>
                            <td>merry@example.com</td>
                            <td>john@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="botones">
                <button class="btn btn-warning" id="editar">Editar</button>
                <button class="btn btn-success" id="guardarFactura">Guardar Factura</button>
            </div>
        </div>
    </div>
</div>


<div id="result"></div>

</body>

</html>