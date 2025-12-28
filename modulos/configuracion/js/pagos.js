document.addEventListener('DOMContentLoaded', function() {
    const radiosPago = document.querySelectorAll('input[name="metodo_pago"]');

    radiosPago.forEach(radio => {
        radio.addEventListener('change', actualizarFormularioPago);
    });
});

function actualizarFormularioPago() {
    const cardForm = document.getElementById('credit-card-form');
    const paypalInfo = document.getElementById('paypal-info');
    
    // Buscamos cual opción este marcada actualmente
    const opcionSeleccionada = document.querySelector('input[name="metodo_pago"]:checked').value;


    if (opcionSeleccionada === 'tarjeta') {
        cardForm.style.display = 'block';
        paypalInfo.style.display = 'none';
        
    
        cardForm.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        
    } else if (opcionSeleccionada === 'paypal') {
        cardForm.style.display = 'none';
        paypalInfo.style.display = 'block';
        
    } else {
        // Para Cripto u otros futuros métodos
        cardForm.style.display = 'none';
        paypalInfo.style.display = 'none';
    }
}