var xmlForm = document.getElementById('xmlForm');//ubicate the form
xmlForm.addEventListener('submit', upload);//add submit function
var readXml=null;//xmlContent
function upload(){
    event.preventDefault();//no reload
    var selectedFile = document.getElementById('input').files[0];//obtain the first file
    var reader = new FileReader();
    reader.onload = function(e) {//delcare the function
        let xmlContent = e.target.result;//obtain the xml content
        let parser = new DOMParser();//Can parse xml like html
        let xmlDOM = parser.parseFromString(xmlContent, 'application/xml');//pass the xmlContent and the type of content
        let person = xmlDOM.querySelectorAll('invoice');//we get the complete object
        person.forEach(personXmlNode => {//Fill the inputs whit the xml values
            document.getElementById('numberfreight').value = personXmlNode.children[0].innerHTML;
            document.getElementById('Customer').value = personXmlNode.children[1].innerHTML;
            document.getElementById('Commodity').value = personXmlNode.children[2].innerHTML;
            document.getElementById('invoicedate').value = personXmlNode.children[3].innerHTML;
            document.getElementById('Cost').value = personXmlNode.children[4].innerHTML;
            document.getElementById('exchangerate').value = personXmlNode.children[5].innerHTML;
            document.getElementById('IVA').value = personXmlNode.children[6].innerHTML;
            document.getElementById('retention').value = personXmlNode.children[7].innerHTML;
            document.getElementById('calculatedtotal').value = personXmlNode.children[8].innerHTML;

        });
    }
    //can read the content to getString xmlContent =>js[9:9]
    reader.readAsText(selectedFile);
}