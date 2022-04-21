document.addEventListener('DOMContentLoaded', (e)=>{
 
    /**
     * Genera un objeto Blob, que contiene un archivo XML.
     * @returns Blob Objeto de tipo Blob con el archivo xml.
     */
    const generarBlobXml = function(){
 
        //Se crea el elemtento XmlDocument
        const documento = document.implementation.createDocument('', '', null);
 
        //le agregamos un elemento raiz
        const raiz = documento.createElement('form');
 
        //El elemento raiz debe ser único, pero dentro de él
        //podemos agregar cualquier cantidad de elementos hijos:
        //Usaremos la propiedad textContent para que automáticamente "escape"
        //los caracteres que no pueden incluirse directamente en el XML
        campos = document.forms.namedItem("form").elements;
        for(var i = 0; i < campos.length; i++)
        {
            if(campos[i].name){
                var elem = documento.createElement(campos[i].name);
                elem.textContent = campos[i].value;
                raiz.appendChild(elem)
            }
        }
        // const nombre = documento.createElement('nombre');
        // nombre.textContent = document.querySelector('#Nombre').value;
        // raiz.appendChild(nombre);
        


        // const ApPaterno = documento.createElement('Apellido-Paterno');
        // ApPaterno.textContent = document.querySelector('#ApPaterno').value;
        // raiz.appendChild(ApPaterno);

        // const ApMaterno = documento.createElement('Apellido-Materno');
        // ApMaterno.textContent = document.querySelector('#ApMaterno').value;
        // raiz.appendChild(ApMaterno);



        // //También puedes agregar atributos a los elementos, 
        // const fecha = documento.createElement('fecha-nacimiento');
        // fecha.setAttribute('formato', 'yyyy-MM-dd');
        // fecha.textContent = document.querySelector('#FechaNacimiento').value;
        // raiz.appendChild(fecha);
 
 
        // const direccion = documento.createElement('direccion');
        // direccion.textContent = document.querySelector('#Direccion').value;
        // raiz.appendChild(direccion);
 

        //Para el blob, necesitamos convertir el documento XML en una cadena
        //de texto. Usamos la propiedad outerHTML del elemento raiz
        const partes = [raiz.outerHTML];
 
        //El tipo MIME para xml con contenido personalizado como este
        //debe ser "text/xml"
        const blobArchivo = new Blob(partes, { type: 'text/xml'} );
 
        return blobArchivo;
 
    }
 
 
    /**
     * Inicia la descarga del archivo en el navegador. 
     * Dependiendo de la configuración del navegador, 
     * este descarga el archivo automáticamente, o mostrará
     * el cuadro de dialogo "Guardar Cómo"
     * @param {Blob} archivo Objeto tipo Blob para descargar. 
     * @param {string} nombre Nombre por defecto para el archivo 
     */
    const descargarArchivo = function(archivo, nombre){
 
        //Creamos un link
        const guardar = document.createElement('a');
        //Le asigna el ObjectURL que "apunta" al Blob
        guardar.href = URL.createObjectURL(archivo);

        guardar.download = nombre || 'archivo.dat'; 
        guardar.target = '_blank'; 
         
        var clicEvent = new MouseEvent('click', {
            'view': window,
            'bubbles': true,
            'cancelable': true
        });
        guardar.dispatchEvent(clicEvent);
 
        //Al final removemos el DataURL para liberar recursos
        URL.revokeObjectURL(guardar.href);
 
    }
 
    //Al hacer clic: generar el archivo
    document.querySelector('#save-btn').addEventListener('click', (e) =>{
 
        //Primero generamos el Blob
        const archivo = generarBlobXml();
 
        //Y luego lo descargamos
        descargarArchivo(archivo, 'XML.xml');
 
    });
 
});