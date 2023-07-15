document.addEventListener('DOMContentLoaded', function() {

    // Obtener los elementos del DOM
    formulario = document.getElementById('formulario');
    cantidadInput = document.getElementById('cantidad');
    categoriaSelect = document.getElementById('categoria');
    nombreInput = document.getElementById('nombre');
    apellidoInput = document.getElementById('apellido');
    emailInput = document.getElementById('email');
    totalMsg = document.getElementById('total-msg');
    borrarBtn = document.getElementById('borrar-btn');
    resumenBtn = document.getElementById('resumen-btn');
  
    borrarBtn.addEventListener('click', function() {
    formulario.reset();
    totalMsg.textContent = 'Total a Pagar: $';
    });
  
    // Asignar evento de clic al botón de Resumen
    resumenBtn.addEventListener('click', function() {
    // Obtener los valores de los inputs
    const cantidad = parseInt(cantidadInput.value);
    const categoria = categoriaSelect.value;
    const nombre = nombreInput.value.trim();
    const apellido = apellidoInput.value.trim();
    const email = emailInput.value.trim();
  
    // Validar los campos
    if (nombre === '') {
      alert('Por favor, ingresa tu nombre.');
      return;
    }
  
    // Validar que solo se ingresen letras en el nombre
    const nombreRegex = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
    if (!nombreRegex.test(nombre)) {
      alert('Por favor, ingresa un nombre válido (solo letras).');
      return;
    }
  
    if (apellido === '') {
      alert('Por favor, ingresa tu apellido.');
      return;
    }
  
    // Validar que solo se ingresen letras en el apellido
    const apellidoRegex = /^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]+$/;
    if (!apellidoRegex.test(apellido)) {
      alert('Por favor, ingresa un apellido válido (solo letras).');
      return;
    }
  
    if (email === '') {
      alert('Por favor, ingresa tu correo electrónico.');
      return;
    }
  
    // Validar el formato del correo electrónico usando una expresión regular básica
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Por favor, ingresa un correo electrónico válido.');
      return;
    }
  
    let descuento = 0;
  
    switch (categoria) {
      case 'estudiante':
        descuento = 0.8;
        break;
      case 'trainee':
        descuento = 0.5;
        break;
      case 'junior':
        descuento = 0.14;
        break;
      default:
        descuento = 0;
    }
  
    const total = (200 * cantidad * (1 - descuento)).toFixed(2);
    totalMsg.textContent = `Total a Pagar: $${total}`;
    });
  
  });
  