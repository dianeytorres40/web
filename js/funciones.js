//funciones de shwEspecialidades
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


// funciones de addEspecialidades
function grabarEspecialidad(){ 
    //falta validar las cajas de entrada de datos
    document.getElementById('frmAddEspecialidades').submit();
}

function regresarShwEspecialidades(){
    window.location.href="./shwEspecialidades.php"
}


//funciones de updEspecialidades
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
    }            
    
}
