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

// La méthode window.getComputedStyle() donne la  valeur calculée finale de toutes les propriétés CSS sur un élément.
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

// OUUU
// masquerDiv.addEventListener("click", (e) => {
//     divTP2.style.display = "none";
//   } 
// }) 
    
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
var divTP4 = document.createElement('div');
    divTP4.id = 'divTP4';

var brOn = document.getElementById("brOn");
var brOff = document.getElementById("brOff");

/* brOn.addEventListener("click", () => {
    //Supprime br 
    let brO = $("br").remove();
}); */  

/* brOn.addEventListener('click', function(e){
    var br = document.querySelectorAll("br");
    for(i=0; i < br.length; i++) {
        br[i].remove();
    }
}); */

brOn.addEventListener("click", () => {
    var br = document.getElementsByTagName('br');
    for(i=0; i < br.length; i++) {
        br[i].parentElement.removeChild(br[i]);
    }
}); 
// La méthode peut lever une exception de deux façons :

// Si enfant était bien un enfant de element et qu'il existe donc dans le DOM, mais qu'il a déjà été retiré, la méthode provoque l'exception suivante :​​
// Uncaught NotFoundError: Failed to execute 'removeChild' on 'element': The node to be removed is not a child of this node.
// si l'enfant n'existe pas dans le DOM de la page, la méthode provoque l'exception suivante :
// Uncaught TypeError: Failed to execute 'removeChild' on 'element': parameter 1 is not of type 'Node'.

/* brOn.addEventListener("click", () => {
    var list = document.getElementById("br");
    list.removeChild(list.childNodes[0]);
}); */

document.body.appendChild(divTP4);

// ****************************************************************************
// ****************************************************************************
//exo3 ****************************************************************************

/* var tds = document.getElementsByTagName('td');

for(var i = 0; i<tds.length; i++){
    var tdCase = tds[i];
    tdCase.addEventListener('click', function(e){
        var input = document.createElement('input');
        input.type ="text";
        var myClickedElement = e.target;
        myClickedElement.appendChild(input);
        document.getElementById(myClickedElement).disabled = true;
    });
}  */


var table = document.getElementById("table");
var tds = document.getElementsByTagName("td");


for(var i = 0; i < tds.length; i++){
    var td = tds[i];
// quand on clique sur td     
    td.addEventListener('click', function (e){
        // on donne des attributs 
        // la valeur de this sera déterminée à partir de la façon dont une fonction est appelée
        this.setAttribute('data-clicked','yes');
        this.setAttribute('data-text',this.innerHTML);

        // on créer l'element input qui prend la place du td
        var input = document.createElement("input");
            input.type = "text";
            // garder la valeur de la cellule dans l'input
            input.value = this.innerHTML;         

        // element.onblur = function() enleve le focus 
        input.onblur = function() {               
            var td = input.parentElement;
            // le text de base
            var originalText = input.parentElement.getAttribute("data-text");
            // le nouveau text
            var currentText = this.value;

            // si le text de base est different du nouveau alors on garde le nouveau
            if(originalText != currentText) {
                td.removeAttribute('data-clicked');
                td.removeAttribute('data-text');
                td.innerHTML = currentText;
            }
        }
        // clear la td quand on clique
        this.innerHTML = "";                      

        // fonction target
        var myClickedElement = e.target;
        myClickedElement.appendChild(input);
        // select la valeur par défaut du input l'élément sélectionné
        this.firstElementChild.select();          
    })
}

/* var tdList = document.querySelectorAll('td');
var input = document.createElement('input'); 
    input.id = 'modifTable';

for (i = 0; i < tdList.length; i++) {
    tdList[i].addEventListener('click', function(e){
        var test = e.target;
        var tdContent = test.innerText;
        test.replaceWith(input);
        document.getElementById("modifTable").value = tdContent;

        document.getElementById("modifTable").addEventListener('focusout', function(e){
            e.preventDefault();
            this.replaceWith(this.value);
        });
    });
} */

// CORRECTION
var cells = document.getElementsByTagName("td");

for (let i= 0; i<cells.length; i++) {
    const element = cells[i];
    element.addEventListener('click', function(e) {
        //recharge
        const tdContent = element.innerHTML;
        //vide 
        element.innerHTML = "";
        //creation input
        const input = document.createElement('input');
        input.type = "text";
        input.value = tdContent;
        const target = e.target;
        e.target.appendChild(input);
        //focus sur input
        input.focus();
    
        // lorsque tu clique ailleur (focusout)
        input.addEventListener('focusout', function(e) {
            const targetInput = e.target;
            // recupere ce qui a été saisie
            const inputContent = e.targetInput.value;
            // met dans le td, le contenu de input
            targetInput.parentNode.innerHTML = inputContent;
        })
    })
}