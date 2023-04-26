// Obtener los campos del formulario
var nombreEmpleado = document.getElementById("nombreEmpleado");
var apellidoEmpleado = document.getElementById("apellidoEmpleado");
var documentoEmpleado = document.getElementById("documentoEmpleado");
var nomina = document.getElementById("nomina");
var telefonoEmpleado = document.getElementById("telefonoEmpleado");
var tipodeContrato = document.getElementById("tipodeContrato");
var tipoDocumento = document.getElementById("tipoDocumento");
var cargo = document.getElementById("cargo");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombreEmpleado.value = "";
apellidoEmpleado.value = "";
documentoEmpleado.value = "";
nomina.value = "";
telefonoEmpleado.value = "";
tipodeContrato.value = "";
tipoDocumento.value = "";
cargo.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
  nombreEmpleado.value = storedData.nombreEmpleado || "";
  apellidoEmpleado.value = storedData.apellidoEmpleado || "";
  documentoEmpleado.value = storedData.documentoEmpleado || "";
  nomina.value = storedData.nomina || "";
  telefonoEmpleado.value = storedData.telefonoEmpleado || "";
  tipodeContrato.value = storedData.tipodeContrato || "";
  tipoDocumento.value = storedData.tipoDocumento || "";
  cargo.value = storedData.cargo || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
  var formData = {
    nombreEmpleado: nombreEmpleado.value || "",
    apellidoEmpleado: apellidoEmpleado.value || "",
    documentoEmpleado: documentoEmpleado.value || "",
    nomina: nomina.value || "",
    telefonoEmpleado: telefonoEmpleado.value || "",
    tipodeContrato: tipodeContrato.value || "",
    tipoDocumento: tipoDocumento.value || "",
    cargo: cargo.value || ""
  };
  localStorage.setItem("formData", JSON.stringify(formData));
});

// Escuchar el evento "submit" del formulario para eliminar los datos almacenados en el almacenamiento local cuando se envía el formulario
document.getElementById("miFormulario").addEventListener("submit", function() {
  localStorage.removeItem("formData");
});

// Escuchar el evento "click" del botón para eliminar los datos almacenados en el almacenamiento local
document.getElementById("limpiarCampos").addEventListener("click", function() {
  localStorage.removeItem("formData");
  nombreEmpleado.value = "";
  apellidoEmpleado.value = "";
  documentoEmpleado.value = "";
  nomina.value = "";
  telefonoEmpleado.value = "";
  tipodeContrato.value = "";
  tipoDocumento.value = "";
  cargo.value = "";
});
