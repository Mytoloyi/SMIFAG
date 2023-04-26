            // Obtener los elementos de los campos "raza", "color", "precio-inicial" y "precio-final"
            var raza = document.getElementById("raza");
            var color = document.getElementById("colorRes");
            var marcaChapeta = document.getElementById("marcaChapeta");
            var precioInicial = document.getElementById("precioinicial");
            var precioFinal = document.getElementById("precioFinal");

            // Validar el campo "raza" mientras se escribe
            raza.addEventListener("input", function() {
            if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/.test(raza.value)) {
                alert("El campo 'raza' solo debe contener caracteres alfabéticos.");
                raza.value = raza.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '');
            }
            });

            // Validar el campo "color" mientras se escribe
            color.addEventListener("input", function() {
            if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/.test(color.value)) {
                alert("El campo 'color' solo debe contener caracteres alfabéticos.");
                color.value = color.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '');
            }
            });
            // Validar el campo "marcaChapeta" mientras se escribe
            marcaChapeta.addEventListener("input", function() {
                if (!/^[a-zA-Z0-9 ]+$/.test(marcaChapeta.value)) {
                    alert("El campo 'marcaChapeta' solo debe contener caracteres alfanuméricos y espacios.");
                    marcaChapeta.value = marcaChapeta.value.replace(/[^a-zA-Z0-9 ]/g, '');
                }
            });

            // Validar el campo "precioInicial" mientras se escribe
            precioInicial.addEventListener("input", function() {
            if (!/^[0-9]+$/.test(precioInicial.value)) {
                alert("El campo 'precio inicial' solo debe contener caracteres numéricos.");
                precioInicial.value = precioInicial.value.replace(/[^0-9]/g, '');
            }
            });

            // Validar el campo "precioFinal" mientras se escribe
            precioFinal.addEventListener("input", function() {
            if (!/^[0-9]+$/.test(precioFinal.value)) {
                alert("El campo 'precio final' solo debe contener caracteres numéricos.");
                precioFinal.value = precioFinal.value.replace(/[^0-9]/g, '');
            }
            });