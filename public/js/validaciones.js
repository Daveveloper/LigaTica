function validar(nombre, espacio){

    var valor = document.getElementById(nombre).value;
    document.getElementById(espacio).innerHTML = '';

    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
        document.getElementById(espacio).innerHTML = 'Campo obligatorio';
        return false;
    }

}
