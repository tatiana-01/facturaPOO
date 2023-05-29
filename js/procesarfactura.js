// Variables para almacenar los encabezados y detalles de factura
var invoiceHeaders = [];
var invoiceDetails = [];
let myHeaders = new Headers({ "Content-Type": "application/json" })
// Función para agregar un encabezado de factura al arreglo
document.querySelector("#addHeader").addEventListener("click",(e)=>{
    var form = document.querySelector("#headerForm");
    let dataHeader = Object.fromEntries(new FormData(form));
    invoiceHeaders.push(dataHeader);
    console.log(invoiceHeaders);
    //document.getElementById("headerForm").reset();
});
document.querySelector("#addItem").addEventListener("click",(e)=>{
    var form = document.querySelector("#detailForm");
    let dataDetail = Object.fromEntries(new FormData(form));
    invoiceDetails.push(dataDetail);
    console.log(invoiceDetails);
    document.getElementById("detailForm").reset();
});

// Función para enviar los datos al script PHP
function submitForm() {
  var data = {
    headers: invoiceHeaders,
    details: invoiceDetails
  };

  fetch("scripts/save_invoice.php", {
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