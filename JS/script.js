//exo 1
/* function abs(a) {
    if(a < 0) a=-a;
    return a;
}
alert("abs(-11) =" + abs(-11)); 
 */

//exo2
/* var a = 1;
var b = 5;
if (a > b) {
    alert("a = " + a + " est plus grand que b" );
}
else 
{
    alert("a = " + a + "est plus petit que b")
} */

//exo3
/* var a = 5;
if (a % 2 == 0) {
    alert("a est pair");
} 
else 
{
    alert("a est impair");
} */

//exo4
/* var a = 10;
function fact(a){
    return a>1 ? a*fact(a-1) : 1;
}
alert("fact(a) = " + fact(a));
 */

//exo5
/* function tab_multi(a)
	{
    var i;
    for (i=0; i<=10; i++) {
        result=a*i;
        alert(a+" x "+i+"="+a*i+);
                            }
    }	
    a=window.prompt("Entrez le numéro de la table:","Saisir un entier ici");
    tab_multi(a); */

//exo6
/* function fact(a) {
    var result = 1;
    for (var i = 1; i <= a; i++)
      result = result * i;
    return result;
  }
alert(+ fact(5)); // output : 120 */

// ****************************************************************************
// ****************************************************************************
// Bouton afficher /masquer
var afficheBt = document.getElementById("afficheBt");
var masquerBt = document.getElementById("masquerBt");
var divTP1 = document.getElementById("divTP1");
var divTP2 = document.getElementById("divTP2");

afficheBt.addEventListener("click", () => {
    if(getComputedStyle(divTP1).display != "none"){
      divTP1.style.display = "none";
    } else {
      divTP1.style.display = "block";
    }
  }) 
  
masquerBt.addEventListener("click", () => {
      if(getComputedStyle(divTP2).display != "none"){
        divTP2.style.display = "none";
      } else {
        divTP2.style.display = "block";
      }
    })  

var afficheDiv = document.getElementById("afficheDiv");
var masquerDiv = document.getElementById("masquerDiv");

afficheDiv.addEventListener("click", () => {
    if(getComputedStyle(divTP1, divTP2).display != "block"){
    divTP1.style.display = "block";
    divTP2.style.display = "block";
    }
}) 

masquerDiv.addEventListener("click", () => {
    if(getComputedStyle(divTP2, divTP1).display != "none"){
      divTP1.style.display = "none";
      divTP2.style.display = "none";
    } 
  }) 
    
/* function button1(){
    if(getComputedStyle(divTP1).display != "none"){
      divTP1.style.display = "none";
    } else {
      divTP1.style.display = "block";
    }
  };
function button2(){
  if(getComputedStyle(divTP2).display != "none"){
    divTP2.style.display = "none";
  } else {
    divTP2.style.display = "block";
  }
};  */


// ****************************************************************************
// ****************************************************************************
//exo1 DOM ****************************************************************************
/* <div id="divTP1">
    Le <strong> World Wibe Web Consortium</strong>, abrégé par le sigle
    <strong>W3C</strong>, est un 
    <a hef="#" title="#"> organisme de standardisation</a>
    a but non lucratif chargé de promouvoir la comptabilité des technologie du
    <a href="#" title="#">Worl Wide Web</a>
</div>  */

// On crée l'élément conteneur
var divTP1 = document.createElement('div');
    divTP1.id = 'divTP1';

// On crée les fonction des balises
function strong(text,parent){
    var newStrong = document.createElement('strong');
    newStrong.appendChild(document.createTextNode(text));
    parent.appendChild(newStrong);
}
// strong('World Wide Web Consortium',divTP1);
// strong('W3C', divTP1);

function a(ahref,atitle,text,parent) {
    newA = document.createElement('a');
    newA.href  = ahref;
    newA.title = atitle;
    newA.appendChild(document.createTextNode(text));
    parent.appendChild(newA);
}
// a('http://fr.wikipedia.org/wiki/Organisme_de_normalisation', 'Organisme de normalisation', 'organisme de standardisation' );
// a('http://fr.wikipedia.org/wiki/World_Wide_Web', 'World Wide Web', 'World Wide Web' );

function text(text,parent){
    var newText = document.createTextNode(text);
    parent.appendChild(newText);
}
// text('Le', divTP1);
// text(', abrégé par le sigle ', divTP1);
// text(', est un ', divTP1);
// text(' à but non-lucratif chargé de promouvoir la compatibilité des technologies du ', divTP1);


// On insère les fonction dans divTP1
text('Le ',divTP1);
strong('World Wide Web Consortium',divTP1);
text(', abrégé par le sigle ',divTP1);
strong('W3C',divTP1);
text(', est un ',divTP1);
a('http://fr.wikipedia.org/wiki/Organisme_de_normalisation', 'Organisme de normalisation', 'organisme de standardisation', divTP1 );
text(' à but non-lucratif chargé de promouvoir la compatibilité des technologies du ',divTP1);
a('http://fr.wikipedia.org/wiki/World_Wide_Web', 'World Wide Web', 'World Wide Web', divTP1 );


document.body.appendChild(divTP1);

// ****************************************************************************
// ****************************************************************************
//exo2 DOM ****************************************************************************
/* <div id="divTP2">
    <form enctype="multipart/form-data" method="post" action="upload.php">
        <fieldset>
            <legend>Uploader une image</legend>

            <div style="text-align: center">
                <label for="inputUpload">Image à uploader :</label>
                <input type="file" name="inputUpload" id="inputUpload" />
                <br/><br/>
                <input type="submit" value="Envoyez" />
            </div>
        </fieldset>
    </form>
</div> */


// On crée l'élément conteneur
var divTP2 = document.createElement('div');
    divTP2.id = 'divTP2';

// On crée les fonctions 
function form(enctype, method, action, parent) {
    var form = document.createElement('form');
    form.enctype = enctype;
    form.method = method;
    form.action = action;
    parent.appendChild(form);
    return form;
}
// form('multipart/form-data', 'post', 'upload.php', divTP2);

function fieldset(parent){
    var fieldset = document.createElement('fieldset');
    parent.appendChild(fieldset)
    return fieldset;
}
// fieldset(divTP2);

function legend(text, parent){
    var legend = document.createElement('legend');
    legend.appendChild(document.createTextNode(text));
    parent.appendChild(legend);
    return legend;
}
// legend('Uploader une image', divTP2);

function div(id, style, parent){
    var div = document.createElement('center');
    div.id = id;
    div.style = style;
    parent.appendChild(div);
    return div;
}
// div('', 'text-align: center', divTP2);

function label(forlabel, text, parent){
    var label = document.createElement('label');
    label.for = forlabel;
    label.appendChild(document.createTextNode(text));
    parent.appendChild(label);
    return label;
}
// label('inputUpload', 'Image a uploader', divTP2);


function input(type, name, id, value, parent){
    var input = document.createElement('input');
    input.type = type;
    input.name = name;
    input.id = id;
    input.value = value;
    parent.appendChild(input);
    return input;
}
// input('file','inputUpload', 'inputUpload', '', divTP2);
// input('submit', '', '', 'Envoyez', divTP2);

function br(parent){
    var br = document.createElement('br');
    parent.appendChild(br);
    return br;
}
// br(divTP2);

form1 = form('multipart/form-data', 'post', 'upload.php', divTP2);
fieldset1 = fieldset(form1);
legend('Uploader une image', fieldset1);
div1 = div('','text-align: center', fieldset1);
label('inputUpload', 'Image a uploader', div1);
input('file','inputUpload', 'inputUpload', '', div1);
br(div1);
br(div1);
input('submit', '', '', 'Envoyez', div1);

document.body.appendChild(divTP2);


// ****************************************************************************
// ****************************************************************************
//exo1 ****************************************************************************
// On crée l'élément conteneur
var cb = document.createElement('div');
    cb.id = 'divTP3';

var checked = document.getElementById("checked");
var unchecked = document.getElementById("unchecked");

function gereCheckbox(className,etat){
    var clist=document.getElementsByTagName(className);
    for (var i = 0; i < clist.length; ++i) {
        clist[i].checked = etat==1 ? "checked" : false; 
    }
}
document.body.appendChild(cb);
 
// ****************************************************************************
// ****************************************************************************
//exo2 ****************************************************************************
var br = document.createElement('div');
    br.id = 'divTP4';

var brOn = document.getElementById("brOn");
var brOff = document.getElementById("brOff");

var br = document.getElementById('br'), br;

var brs    = brOn.getElementsByTagName('br');

while (brs.length !== 0){
    brs[0].parentNode.removeChild(brs[0]);
}

document.body.appendChild(cb);