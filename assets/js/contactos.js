





////////////////////////////////////////////////////////////////////////////////
function ocultarBoton() {
    if (document.cookie.match(/session=1/)) {
      document.querySelector('#add').style.display = 'none';
    }
  }
  
  ocultarBoton();