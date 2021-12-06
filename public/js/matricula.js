function agregaOpciones(componente, array_datos){
    let select = document.getElementById(componente);
    select.options.length = 0;

    for (elemento in array_datos){
        let opcion = document.createElement("option");
        opcion.value = elemento;
        opcion.text = array_datos[elemento];
        select.add(opcion);
    }
}

const selector = document.getElementById('nivel');
selector.addEventListener('change', function(){
    let indice = this.selectedIndex;

    switch (indice) {
        case 0:
            let datos = ["3 y 4 añitos","5 añitos"];
            agregaOpciones('grado',datos);
            break;
        case 1:
            let datos1 = ["1º","2º","3º y 4º","5º","6º"];
            agregaOpciones('grado',datos1);
            break;
        case 2:
            let datos2 = ["1º","2º","3º","4º","5º"];
            agregaOpciones('grado',datos2);
            break;    
    }
});