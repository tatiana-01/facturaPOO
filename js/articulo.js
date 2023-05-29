let invoiceHeaders = [];
let invoiceDetails = [];

function fecha(){
    let fecha=document.querySelector('#fecha');
    fecha.valueAsDate=new Date();
}

function añadirFila(){
    let boton= document.querySelector('#añadir');
    let div=document.querySelector('.productos');
    let contador=0;
    boton.addEventListener("click",(e)=>{
        contador++;
        let html=`
        <div class="row" id="div${contador}">
            <div class="col-3">
                <label for="nombreProducto" class="form-label">Numero de producto:</label>
                <input type="text" class="form-control" id="nombreProducto${contador}" name="Producto${contador}[]">
            </div>
            <div class="col-2">
                <label for="valor" class="form-label">Valor de producto:</label>
                <input type="number" class="form-control" id="valor${contador}" name="Producto${contador}[]">
            </div>
            <div class="col-2">
                <label for="cantidad" class="form-label">Cantidad de producto:</label>
                <input type="number" class="form-control" id="cantidad${contador}" name="Producto${contador}[]" data-producto="${contador}" readonly>
            </div>
            <div class="col-2">
                <label for="total" class="form-label">Total de producto:</label>
                <input type="number" class="form-control" id="total${contador}" name="Producto${contador}[]" data-producto="${contador}" readonly>
            </div>
            <div class="col-1  botones">
                <button class="btn btn-success boton-mas" id="mas${contador}" data-producto="${contador}">+</button>
            </div>
            <div class="col-1 botones">
                <button class="btn btn-warning boton-menos" id="menos${contador}" data-producto="${contador}">-</button>
            </div>
            <div class="col-1 botones">
                <img src="./img/1017530.png" class="eliminar" id="eliminar${contador}" data-producto="${contador}" alt="" srcset="">
            </div>
        </div>
        `;
        let divElement=document.createElement("div");
        divElement.innerHTML=html;
        divElement.className='productoFrm';
        div.appendChild(divElement);
        divElement.setAttribute('id',`productos${contador}`);
        aumento();
        decremento();
        eliminar();
    })
}
function aumento(){
    let botonMas=document.querySelectorAll('.boton-mas');
    botonMas.forEach(element => {
        element.addEventListener("click",(e)=>{
            let cantidad=document.querySelector(`#cantidad${element.dataset.producto}`);
            let valor=document.querySelector(`#valor${element.dataset.producto}`);
            let total=document.querySelector(`#total${element.dataset.producto}`);
            cantidad.value++;
            total.value=valor.value*cantidad.value;
            e.preventDefault();
            e.stopImmediatePropagation();

        })
    });
}
function decremento(){
    let botonMenos=document.querySelectorAll('.boton-menos');
    botonMenos.forEach(element => {
        element.addEventListener("click",(e)=>{
            let cantidad=document.querySelector(`#cantidad${element.dataset.producto}`);
            let valor=document.querySelector(`#valor${element.dataset.producto}`);
            let total=document.querySelector(`#total${element.dataset.producto}`);
            cantidad.value--;
            total.value=valor.value*cantidad.value;
            if(cantidad.value<=0){
                let div=document.querySelector(`#productos${element.dataset.producto}`);
                let divPadre=document.querySelector('.productos');
                try{
                    divPadre.removeChild(div);
                }catch{} 
            }else{
                e.preventDefault();
                e.stopImmediatePropagation();        
            }
            e.preventDefault();
            e.stopImmediatePropagation();

        })
    });
}

function eliminar(){
    let div=document.querySelectorAll('.eliminar');
    div.forEach((element)=>{
        element.addEventListener('click',(e)=>{
            let div=document.querySelector(`#productos${element.dataset.producto}`);
            let divPadre=document.querySelector('.productos');
            try{
                divPadre.removeChild(div);
            }catch{} 
        })
    })
}

function almacenarDataCliente(){
    
    let form = document.querySelector("#headerForm");
    let dataHeader = Object.fromEntries(new FormData(form));
    invoiceHeaders.push(dataHeader);
   
}

function almacenarProductos(){
    
    let formProduct = document.querySelectorAll(".productoFrm");
  
    formProduct.forEach((producto)=>{
        let dataDetails = Object.fromEntries(new FormData(producto));
        invoiceDetails.push(dataDetails);
       
    });

}

function guardar(){
    let botonGuardar=document.querySelector('#guardar');
    botonGuardar.addEventListener('click', (e)=>{
        almacenarDataCliente();
        almacenarProductos();
        ocultar();
        mostrarData();
        //submitForm();
    })
}


let myHeaders = new Headers({ "Content-Type": "application/json" });
const submitForm= async()=> {
    var data = {
      headers: invoiceHeaders,
      details: invoiceDetails
    };
  
    await fetch("scripts/save_invoice.php", {
      method: "POST",
      headers: myHeaders,
      body: JSON.stringify(data)
    })
    .then(function(response) {
      return response.text();
    })
    .then(function(response) {
      document.getElementById("result").innerHTML = response;
      // Restablece los arreglos después de enviar los datos
      invoiceHeaders = [];
      invoiceDetails = [];
    });
  }

function ocultar(){
    let div= document.querySelector('#facturaForm');
    div.style.display='none';
    let ver= document.querySelector('#mostrarFactura');
    ver.style.display='block';
    mostrarData();
    mostrarProductos();
}

function mostrarData(){

    let div= document.querySelector('#infoCliente');
    let span=document.querySelector('#nroFactura');
    html=/*html*/`
   <div class="row">
                <div class="col">
                    <p>Nombre: ${invoiceHeaders[0].customerName}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Numero de cedula: ${invoiceHeaders[0].nroCedula}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Fecha: ${invoiceHeaders[0].fecha}</p>
                </div>
    </div>`;
    div.innerHTML=html;
    span.innerHTML=`#${invoiceHeaders[0].invoiceNumber}`;
}

function mostrarProductos(){
    let totalHtml='';
    let div=document.querySelector('#productosTablaFinal');
    invoiceDetails.forEach((e,pos)=>{
        html=/*html*/`
        <tr>
            <td>${invoiceDetails[pos].nombreProducto}</td>
            <td>${invoiceDetails[pos].valor}</td>
            <td>${invoiceDetails[pos].cantidad}</td>
            <td>${invoiceDetails[pos].total}</td>
        </tr>
        `;
        totalHtml+=html;
    })
    
    div.innerHTML=totalHtml;  
    guardarFactura();
    editar();
}

function editar(){
    let btnEdit=document.querySelector('#editar')
    btnEdit.addEventListener('click',(e)=>{
        invoiceDetails=[];
        console.log(invoiceDetails);
        let div= document.querySelector('#facturaForm');
        div.style.display='block';
        let ver= document.querySelector('#mostrarFactura');
        ver.style.display='none';
    })
}

function guardarFactura(){
    let btnSave=document.querySelector('#guardarFactura')
    btnSave.addEventListener('click',(e)=>{
        submitForm();
    })
}

function dateToJulian () {
    let date=new Date();
    let utcMillis = Date.UTC(date.getFullYear(),date.getMonth(),date.getDate(),date.getHours(),date.getMinutes(),date.getSeconds(),date.getMilliseconds());
    let nroFactura=document.querySelector('#invoiceNumber');
    nroFactura.value=utcMillis;
}



añadirFila();
aumento();
decremento();
eliminar();
guardar();
fecha();
dateToJulian();

