// Obtener los campos del formulario
var raza = document.getElementById("raza");
var colorRes = document.getElementById("colorRes");
var marcaChapeta = document.getElementById("marcaChapeta");
var precioinicial = document.getElementById("precioinicial");
var precioFinal = document.getElementById("precioFinal");
var categoriaEdad = document.getElementById("categoriaEdad");
var tipoNegocio = document.getElementById("tipoNegocio");
var marcaRes = document.getElementById("marcaRes");
var estadoRes = document.getElementById("estadoRes");
var nombrePotrero = document.getElementById("nombrePotrero");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
raza.value = "";
colorRes.value = "";
marcaChapeta.value = "";
precioinicial.value = "";
precioFinal.value = "";
categoriaEdad.value = "";
tipoNegocio.value = "";
marcaRes.value = "";
estadoRes.value = "";
nombrePotrero.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
raza.value = storedData.raza || "";
colorRes.value = storedData.colorRes || "";
marcaChapeta.value = storedData.marcaChapeta || "";
precioinicial.value = storedData.precioinicial || "";
precioFinal.value = storedData.precioFinal || "";
categoriaEdad.value = storedData.categoriaEdad || "";
tipoNegocio.value = storedData.tipoNegocio || "";
marcaRes.value = storedData.marcaRes || "";
estadoRes.value = storedData.estadoRes || "";
nombrePotrero.value = storedData.nombrePotrero || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
raza: raza.value || "",
colorRes: colorRes.value || "",
marcaChapeta: marcaChapeta.value || "",
precioinicial: precioinicial.value || "",
precioFinal: precioFinal.value || "",
categoriaEdad: categoriaEdad.value || "",
tipoNegocio: tipoNegocio.value || "",
marcaRes: marcaRes.value || "",
estadoRes: estadoRes.value || "",
nombrePotrero: nombrePotrero.value || ""
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
raza.value = "";
colorRes.value = "";
marcaChapeta.value = "";
precioinicial.value = "";
precioFinal.value = "";
categoriaEdad.value = "";
tipoNegocio.value = "";
marcaRes.value = "";
estadoRes.value = "";
nombrePotrero.value = "";
});