function enviar(opc){       
    switch (opc){
        case 'upd':                           
            document.getElementById('txtOpc').value = 'upd'; 
            document.getElementById('frmUpdEspecialidades').submit();                               
            break;      
            
        case 'del':                                            
            if(confirm('Desea eliminar éste registro?')){
                document.getElementById('txtOpc').value = 'del';
                document.getElementById('frmUpdEspecialidades').submit();
            }                              
            break;

        case 'back':
            window.location.href='./shwEspecialidades.php'
            break;
        case 'updAlu':                           
            document.getElementById('txtOpc').value = 'upd'; 
            document.getElementById('frmUpdAlumno').submit();                               
            break;      
            
        case 'delAlu':                                            
            if(confirm('Desea eliminar éste registro?')){
                document.getElementById('txtOpc').value = 'del';
                document.getElementById('frmUpdAlumno').submit();
            }                              
            break;
        case 'backAlu':
            window.location.href='./shwAlumnos.php'
            break;
        case 'updPro':                           
            document.getElementById('txtOpc').value = 'upd'; 
            document.getElementById('frmUpdMaestros').submit();                               
            break;      
        case 'delPro':                                            
            if(confirm('Desea eliminar éste registro?')){
                document.getElementById('txtOpc').value = 'del';
                document.getElementById('frmUpdMaestros').submit();
            }                              
            break;
        case 'backPro':
            window.location.href='./shwMaestros.php'
            break;
        case 'updCal':                           
            document.getElementById('txtOpc').value = 'upd'; 
            document.getElementById('frmUpdCalificacion').submit();                               
            break;      
        case 'delCal':                                            
            if(confirm('Desea eliminar éste registro?')){
                document.getElementById('txtOpc').value = 'del';
                document.getElementById('frmUpdCalificacion').submit();
            }                              
            break;
        case 'backCal':
            window.location.href='./shwCalificaciones.php';
            break;
        case 'updCurso':                           
            document.getElementById('txtOpc').value = 'upd'; 
            document.getElementById('frmUpdCurso').submit();                               
            break;      
        case 'delCurso':                                            
            if(confirm('Desea eliminar éste registro?')){
                document.getElementById('txtOpc').value = 'del';
                document.getElementById('frmUpdCurso').submit();
            }                              
            break;
        case 'backCurso':
            window.location.href='./shwMaterias.php';
            break;
    
        
        }                       
}
/////////////////////////funciones de Especialidades////////////////////////////////////////////
function agregarEspecialidades(){                                    
    window.location.href = './addEspecialidades.php';
}
function actualizarEspecialidades(id, clave, nombre){                                    
    document.getElementById('txtId').value = id;
    document.getElementById('txtClave').value = clave;
    document.getElementById('txtNombre').value = nombre;
    document.getElementById('txtOpc').value = 'upd';
    document.getElementById('frmUpdEspecialidades').submit();
}
function buscarEspecialidades(){
    var sel     = document.getElementById("selBuscar");
    var clave   = sel.options[sel.selectedIndex].value;            
    var txtLike = document.getElementById('txtBuscar').value;                                        

    //ajax
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        }
    else {
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divTabla").innerHTML=xmlhttp.responseText;
        }
    };      

    xmlhttp.open("GET","./ajxEspecialidades.php?varAtributo="+clave+"&varTxtLike="+txtLike,true);             
    xmlhttp.send();  
} 
function imprimirEspecialidades(){
    window.location.href = '../reportes/repEspecialidades.php';
}   
function grabarEspecialidad(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddEspecialidades').submit();
}
function regresarShwEspecialidades(){
    window.location.href="./shwEspecialidades.php"
}
function validaEspecialidades(){
    var nombreEspecialidad = $("#txtNombre").val();
    //Valida si el nombre fue escrito.
    if(nombreEspecialidad!=""){
        enviar("upd");
    }
    else{
        alert("Escribe nombre de especialidad primero");
    }
    
    

}
function validaEspecialidadesAdd(){
    var nombreEspecialidad = $("#txtNombre").val();
    var txtClave = $("#txtClave").val();
    //Valida si el nombre y clave  fueron escritos.
    if(nombreEspecialidad!="" && txtClave!="" ){
        grabarEspecialidad()
    }
    else{
        alert("Los campos de clave y especialidad deben de estar llenados");
    }
}
/////////////////////////funciones de Alumnos////////////////////////////////////////////
function actualizarAlumno(id, matricula,nombre,paterno,materno, especialidad, edad){                                    
    document.getElementById('txtId').value = id;
    document.getElementById('matricula').value = matricula;
    document.getElementById('txtnombre').value = nombre;
    document.getElementById('paterno').value = paterno;
    document.getElementById('materno').value = materno;
    document.getElementById('especialidad').value = especialidad;
    document.getElementById('edad').value = edad;
    document.getElementById('txtOpc').value = 'updAlu';
    document.getElementById('frmUpdAlumno').submit();
}
function agregarAlumnos(){
    window.location.href = './addAlumnos.php';
}
function grabarAlumno(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddAlumnos').submit();
}
function regresarShwAlumnos(){
    window.location.href="./shwAlumnos.php"
}
function buscarAlumnos(){
    var sel     = document.getElementById("selBuscar");
    var clave   = sel.options[sel.selectedIndex].value;            
    var txtLike = document.getElementById('txtBuscar').value;                                        

    //ajax
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        }
    else {
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divTabla").innerHTML=xmlhttp.responseText;
        }
    };      
    xmlhttp.open("GET","./ajxAlumnos.php?varAtributo="+clave+"&varTxtLike="+txtLike,true);             
    xmlhttp.send();  
} 
function validaAlumnos(){
    var nombre = $("#txtnombre").val();
    var matricula = $("#matricula").val();
    var paterno = $("#paterno").val();
    var materno = $("#materno").val();
    var especialidad = $("#especialidad").val();
    var edad = $("#edad").val();
    //Valida si el nombre fue escrito.
    if(nombre!="" && matricula!="" && paterno!="" && materno!="" && especialidad!="" && edad!=""){
        if(soloNumeros(edad) && soloNumeros(matricula)){
            enviar("updAlu");
        }
        else{
            alert("La edad solo son numeros");
        }
    }
    else{
        alert("Las opcones no pueden dejarse en blanco");
    }
    //Valida si el nombre fue escrito.   
}
function validaAlumno2(){
    var nombre = $("#txtnombre").val();
    var matricula = $("#matricula").val();
    var paterno = $("#paterno").val();
    var materno = $("#materno").val();
    var especialidad = $("#especialidad").val();
    var edad = $("#edad").val();
    //Valida si el nombre fue escrito.
    if(nombre!="" && matricula!="" && paterno!="" && materno!="" && especialidad!="" && edad!=""){
        if(soloNumeros(edad) && soloNumeros(matricula)){
            grabarAlumno();
        }
        else{
            alert("La edad y matricula solo son numeros");
        }
    }
    else{
        alert("Las opcones no pueden dejarse en blanco");
    }
    //Valida si el nombre fue escrito.   
}

/////////////////////////funciones de Maestros////////////////////////////////////////////
function actualizarMaestro(id, nombre){                                    
    document.getElementById('txtId').value = id;
    document.getElementById('txtNombre').value = nombre;
    document.getElementById('txtOpc').value = 'upd';
    document.getElementById('frmUpdMaestro').submit();
}
function agregarMaestros(){
    window.location.href = './addMaestros.php';
}
function grabarMaestro(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddMaestros').submit();
}
function regresarShwAlumnos(){
    window.location.href="./shwMaestros.php"
}
function buscarMaestros(){
    var sel     = document.getElementById("selBuscar");
    var clave   = sel.options[sel.selectedIndex].value;            
    var txtLike = document.getElementById('txtBuscar').value;                                        

    //ajax
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        }
    else {
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divTabla").innerHTML=xmlhttp.responseText;
        }
    };      
    xmlhttp.open("GET","./ajxMaestros.php?varAtributo="+clave+"&varTxtLike="+txtLike,true);             
    xmlhttp.send();  
} 
function validaMaestros(){
    var nombre = $("#txtNombre").val();
    //Valida si el nombre fue escrito.
    if(nombre!=""){
        enviar("updPro");
    }
    else{
        alert("Escribir Nombre de Maestro");
    }
    //Valida si el nombre fue escrito.   
}
function validaMaestros2(){
    var nombre = $("#txtNombre").val();
    //Valida si el nombre fue escrito.
    if(nombre!=""){
        grabarMaestro();
    }
    else{
        alert("Escribir Nombre de Maestro");
    }
    //Valida si el nombre fue escrito.   
}
/////////////////////////funciones de Calificaciones////////////////////////////////////////////
function actualizarCalificaciones(id, nombre,matricula,calificacion,curso,profesor,ciclo,ano){                                    
    document.getElementById('txtId').value = id;
    document.getElementById('txtNombre').value = nombre;
    document.getElementById('matricula').value = matricula;
    document.getElementById('calificacion').value = calificacion;
    document.getElementById('curso').value = curso;
    document.getElementById('profesor').value = profesor;
    document.getElementById('ciclo').value = ciclo;
    document.getElementById('ano').value = ano;
    document.getElementById('txtOpc').value = 'upd';
    document.getElementById('frmUpdCalificacion').submit();
}
function agregarCalificaciones(){
    window.location.href = './addCalificaciones.php';
}
function grabarCalificacion(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddCalificacion').submit();
}
function regresarShwCalificaciones(){
    window.location.href="./shwCalificaciones.php"
}
function buscarCalificacion(){
    var sel     = document.getElementById("selBuscar");
    var clave   = sel.options[sel.selectedIndex].value;            
    var txtLike = document.getElementById('txtBuscar').value;                                        

    //ajax
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        }
    else {
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divTabla").innerHTML=xmlhttp.responseText;
        }
    };      
    xmlhttp.open("GET","./ajxCalificacion.php?varAtributo="+clave+"&varTxtLike="+txtLike,true);             
    xmlhttp.send();  
}
function validaCalificaciones(){
    var curso = $("#curso").val();
    var profesor = $("#profesor").val();
    var ciclo = $("#ciclo").val();
    var ano = $("#ano").val();
    var calificacion = $("#calificacion").val();
    //Valida si el nombre fue escrito.
    if(curso!="" && profesor!="" && ciclo!="" && ano!="" && calificacion!=""){
        if(soloNumeros(ano) && soloNumeros(calificacion)){
            if(ano>=2000 && ano<=2018){
                if(calificacion>=0 && calificacion<=100){
                    if(ciclo=="Verano" || ciclo == "Invierno"){
                        enviar("updCal");
                    }
                    else{
                        alert("Ciclos validos. Verano y Invierno");
                    }
                }
                else{
                    alert("Calificaciones solo del 0 al 100");
                }
            }
            else{
                alert("Escribe un ano valido. Del 2000 al 2018");
            }
        }
        else{
            alert("La edad solo son numeros");
        }
    }
    else{
        alert("Las opcones no pueden dejarse en blanco");
    }
    //Valida si el nombre fue escrito.   
}
function validaCalificaciones2(){
    var matricula = $("#matricula").val();
    var curso = $("#curso").val();
    var profesor = $("#profesor").val();
    var ciclo = $("#ciclo").val();
    var ano = $("#ano").val();
    var calificacion = $("#calificacion").val();
    //Valida si el nombre fue escrito.
        if(matricula!="" &&curso!="" && profesor!="" && ciclo!="" && ano!="" && calificacion!=""){
            if(soloNumeros(ano) && soloNumeros(calificacion)){
                if(ano>=2000 && ano<=2018){
                    if(calificacion>=0 && calificacion<=100){
                        if(ciclo=="Verano" || ciclo == "Invierno"){
                            grabarCalificacion();
                        }
                        else{
                            alert("Ciclos validos. Verano y Invierno");
                        }
                    }
                    else{
                        alert("Calificaciones solo del 0 al 100");
                    }
                }
                else{
                    alert("Escribe un ano valido. Del 2000 al 2018");
                }
            }
            else{
                alert("La edad solo son numeros");
            }
        }
        else{
            alert("Las opcones no pueden dejarse en blanco");
        }   
}
/////////////////////////funciones de Calificaciones////////////////////////////////////////////
function actualizarCurso(id,clave, nombre, espec){                                
    document.getElementById('txtId').value = id;
    document.getElementById('clave').value = clave;
    document.getElementById('espec').value = espec;
    document.getElementById('txtNombre').value = nombre;
    document.getElementById('txtOpc').value = 'upd';
    document.getElementById('frmUpdCurso').submit();
}
function agregarCurso(){
    window.location.href = './addMateria.php';
}
function grabarCurso(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddCurso').submit();
}
function regresarShwCurso(){
    window.location.href="./shwMaterias.php"
}
function buscarCurso(){
    var sel     = document.getElementById("selBuscar");
    var clave   = sel.options[sel.selectedIndex].value;            
    var txtLike = document.getElementById('txtBuscar').value;                                        

    //ajax
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
    else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
        }
    else {
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divTabla").innerHTML=xmlhttp.responseText;
        }
    };      
    xmlhttp.open("GET","./ajxMateria.php?varAtributo="+clave+"&varTxtLike="+txtLike,true);             
    xmlhttp.send();  
} 

//////////////////////////Funciones para Validar////////////////////////////////////////////

function soloNumeros(str){
        return !/\D/.test(str);
}