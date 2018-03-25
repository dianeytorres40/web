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
                document.getElementById('frmUpdCalificacion').submit();
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
/////////////////////////funciones de Maestros////////////////////////////////////////////
function actualizarMaestros(id, nombre){                                    
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