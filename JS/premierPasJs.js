//EXERCICES N°2 - PAGE 19 DU COURS !

//exo 1 :

/** creation de la div */
var div1= document.createElement('div');
div1.id="divTP1";

//création des fonctions insertion du texte
function contenu(a,b){
    var cont= document.createTextNode(a);
    b.appendChild(cont);
}

//fonction pour la création de balises <strong>
function strong(b){
    var strong=document.createElement("strong");
        b.appendChild(strong);
        return strong
}

//fonction pour la création de balises <a>
function createA(href, c, d, parent){
    a= document.createElement("a");
    a.href= href;
    a.title= c;
    a.textContent= d;
    parent.appendChild(a);

} 

/** insertion des a dans la div */

contenu("le ", div1);
strong1=strong(div1);
contenu(" WWW Consortium ", strong1);
contenu(", abrégé par le sigle", div1);
strong2=strong(div1);
contenu(" W3C ", strong2);
contenu(", est un ", div1);
createA("https://fr.wikipedia.org/wiki/Organisme_de_normalisation", "organisme de normalisation", "organisme de normalisation", div1 );
contenu(" à but non-lucratif chargé de promouvoir la compatbilitié des technologies du ", div1);
createA("https://fr.wikipedia.org/wiki/World_Wide_Web", "World Wild Web", "World Wild Web", div1);
contenu(" . ", div1);

document.body.appendChild(div1);




//exo2 
body=document.getElementsByTagName('body');
function creationElement(createQuoi, nomdeAttrib1, premierAttribut, deuxiemeAttribut, troisiemeAttribut,quatriemeAttribut, parent){
    creation = createQuoi;
    creation.nomdeAttrib1= premierAttribut;
    creation.deuxiemeAttribut;
    creation.troisiemeAttribut;
    creation.quatriemeAttribut;

    parent.appendChild(creation);

}

//fonction pour la création de balises div
function createDiv(a,b, c){
    div=document.createElement("div");
    div.id=a;
    div.style=b
    c.appendChild(div);
    return div;
}

//fonction pour la création de balises form
function createForm(a,b,c,d){
    var form1 = document.createElement('form');
        form1.enctype=a 
        form1.method=b 
        form1.action=c 
        d.appendChild(form1);
        return form1
}

//fonction pour la création de balises fieldset
function createFieldset(a){
    var fs1= document.createElement("fieldset");
        a.appendChild(fs1);
        return fs1;
}

//fonction pour la création de balises legend
function createLegend(a,b){
    var lgd = document.createElement("legend");
        lgd.textContent=a;
        b.appendChild(lgd);
}

//fonction pour la création de balises label
function createLabel(a,b,c){
var label =document.createElement("label");
    label.for=a;
    label.textContent=b
    c.appendChild(label);
}

//fonction pour la création de balises input
function createInput(a, b, c, d, e){
    input=document.createElement("input");
    input.type=a;
    input.name=b;
    input.id=c
    input.value=d

    e.appendChild(input);
}

/**fonction pour la création de balises saut de ligne
 * exemple de clone : var break2 = breaks.cloneNode(false);*/
function createBreaks(a){
    br= document.createElement("br");
    a.appendChild(br);
}

div2=createDiv("divTP2", "", body[0]);
form1=createForm("multipart/form-data","post", "upload.php",div2);
fs1=createFieldset(form1);

createLegend("Uploader une image ",fs1);
div3=createDiv("","text-align: center", fs1 );

createLabel("inputUpload","Image à uploader ", div3)
createInput("file", "inputUpload", "inputUpload", "", div3);
createBreaks(div3);
createBreaks(div3);
createInput("submit", "", "", "envoyer", div3);

creationElement("document.createElement('div')", "id", "bonjour", "class='pamplemousse", "style=''", "href=''", div3);




// EXERCICES N°1 - PAGE 9 DU COURS !
var v1 = prompt('Saisissez un chiffre');
var v2 = prompt('Saisissez en un deuxième');

// exo 1 :
function absolu(a){
    if(a < 0 ){
        b= -a;
    }
    else {
        b = a;
    }

    return b;
}
b=absolu(v1);
console.log("la valeur absolue de " + v1 + " est " + b);
c=absolu(v2);
console.log("la valeur absolue de " + v2 + " est " + c);

// exo2
function compare(a,b){
    if (a<b){
        console.log (b + ' est plus grand que ' + a);
    }
    else if(b<a) {
        console.log (a + " est plus grand que " + b);
    } else {
        console.log (a + " et " + b + " sont égaux ");
    }
}

compare(v1, v2);

//exo 3
function paire(a){
    
    if (a==0){
        console.log (a + " est nul ");
    } else if (a%2==0){
        console.log(a+ " est pair ");
    } else {
        console.log(a+" est impair ");
    }
}
paire(v1);
paire(v2);

//exo 4  
function factorielle(a){
    var c=absolu(a);
    
    if (c==0){
        return 1
    } else {
        return b= c* factorielle(c-1);
    }
    
}
var f=factorielle(v1);
console.log("la factorielle de " + v1 + " est " + f);
var g=factorielle(v2);
console.log("la factorielle de " + v2 + " est " + g);

// exo 5
function tableMultiplier(a){
    for (i=1; i<=10; i++){
        console.log(a + "x" + i + "=" + a*i);
}
}
tableMultiplier(v1);
tableMultiplier(v2);
