<<<<<<< HEAD
// Validación UX mejorada (sin jQuery)
document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('contactForm');
  const modal = document.getElementById('modal');
  const modalErrors = document.getElementById('modalErrors');
  const btnClose = document.getElementById('btnClose');

  function addError(fieldId, message){
    const el = document.getElementById(fieldId);
    el.style.borderColor = '#F14B4B';
    modalErrors.insertAdjacentHTML('beforeend', `<p>• ${message}</p>`);
  }
  function clearStyles(){
    ['names','email','mensaje','phone'].forEach(id => {
      const el = document.getElementById(id);
      if(el){ el.style.borderColor = 'rgba(255,255,255,0.10)'; }
    });
    modalErrors.innerHTML = '';
  }

  form.addEventListener('submit', function(e){
    clearStyles();
    let hasErrors = false;

    const names = document.getElementById('names').value.trim();
    const email = document.getElementById('email').value.trim();
    const mensaje = document.getElementById('mensaje').value.trim();

    if(!names){ addError('names', 'Escriba un nombre'); hasErrors = true; }

    if(!email){
      addError('email', 'Ingrese un correo');
      hasErrors = true;
    }else{
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if(!re.test(email)){
        addError('email', 'El correo no es válido');
        hasErrors = true;
      }
    }

    if(!mensaje){ addError('mensaje', 'Escriba un mensaje'); hasErrors = true; }

    if(hasErrors){
      e.preventDefault();
      modal.hidden = false;
    } // si no hay errores, el form se envía a enviar.php
  });

  btnClose.addEventListener('click', () => { modal.hidden = true; });
  modal.addEventListener('click', (ev)=>{
    if(ev.target === modal){ modal.hidden = true; }
  });
});
=======
$(document).ready(function(){

    $('#btnSend').click(function(){

        var errores = '';

        // Validado Nombre ==============================
        if( $('#names').val() == '' ){
            errores += '<p>Escriba un nombre</p>';
            $('#names').css("border-bottom-color", "#F14B4B")
        } else{
            $('#names').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Correo ==============================
        if( $('#email').val() == '' ){
            errores += '<p>Ingrese un correo</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else{
            $('#email').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Mensaje ==============================
        if( $('#mensaje').val() == '' ){
            errores += '<p>Escriba un mensaje</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }

        // ENVIANDO MENSAJE ============================
        if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
                                        '<h3>Errores encontrados</h3>'+
                                        errores+
                                        '<span id="btnClose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function(){
            $('.modal_wrap').remove();
        });
    });

});
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
