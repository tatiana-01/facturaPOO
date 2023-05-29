<?php
  // Obtén los datos enviados desde el formulario
  $data = json_decode(file_get_contents('php://input'), true);

  // Accede a los encabezados de factura y realiza las operaciones necesarias
  $headers = $data['headers'];
  foreach ($headers as $header) {
    $invoiceNumber = $header['invoiceNumber'];
    $customerName = $header['customerName'];
    
    // Realiza las operaciones con los datos del encabezado de factura
    // (por ejemplo, guardar en la base de datos)
  }

  // Accede a los detalles de factura y realiza las operaciones necesarias
  $details = $data['details'];
  foreach ($details as $detail) {
    $productName = $detail['productName'];
    $quantity = $detail['quantity'];
    
    // Realiza las operaciones con los datos del detalle de factura
    // (por ejemplo, guardar en la base de datos)
  }

  // Envía una respuesta de éxito
  echo json_encode($data);

  //header('Location:factura.php');
?>
