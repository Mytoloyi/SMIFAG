// Obtener los campos del formulario
var nombrePotrero = document.getElementById("nombrePotrero");
var estadoPotrero = document.getElementById("estadoPotrero");
var medida = document.getElementById("medida");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombrePotrero.value = "";
estadoPotrero.value = "";
medida.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
nombrePotrero.value = storedData.nombrePotrero || "";
estadoPotrero.value = storedData.estadoPotrero || "";
medida.value = storedData.medida || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
nombrePotrero: nombrePotrero.value || "",
estadoPotrero: estadoPotrero.value || "",
medida: medida.value || ""
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
nombrePotrero.value = "";
estadoPotrero.value = "";
medida.value = "";
});



