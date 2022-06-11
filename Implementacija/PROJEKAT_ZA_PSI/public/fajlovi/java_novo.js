
$(document).ready(function(){
    if(localStorage.getItem('jeKliknut')!=null){
        var clickedIs=localStorage.getItem('jeKliknut'); 
        clickedIs=JSON.parse(clickedIs);
        switch(clickedIs){ 
            case 1:{   $('#korisnik').show();
            $('#salon').hide();
            $('#menadzer').hide();
            $("#korisnikRadioButton").attr("checked","checked") ;
          $("#salonRadioButton").removeAttr("checked") 
          $("#menadzerRadioButton").removeAttr("checked") 
            break;}
            case 2:{
                $('#korisnik').hide();
                $('#salon').show();
                $('#menadzer').hide();
                $("#korisnikRadioButton").removeAttr("checked") ;
            $("#salonRadioButton").attr("checked","checked")
            $("#menadzerRadioButton").removeAttr("checked") 
            break;}
            case 3:{ 
                $('#korisnik').hide();
                $('#salon').hide();
                $('#menadzer').show();
                $("#korisnikRadioButton").removeAttr("checked") ;
            $("#salonRadioButton").removeAttr("checked") 
            $("#menadzerRadioButton").attr("checked","checked")
            break;}
        }
    }
    else{ 
        $('#korisnik').show();
        $('#salon').hide();
        $('#menadzer').hide();
        document.getElementById("korisnikRadioButton").setAttribute("clicked","true"); 
    document.getElementById("salonRadioButton").setAttribute("clicked","false"); 
    document.getElementById("menadzerRadioButton").setAttribute("clicked","false");  
    localStorage.setItem('jeKliknut',JSON.stringify(1));
    }
 
 $('#korisnikRadioButton').on('click',function(){ 
    $('#korisnik').show();
    localStorage.setItem('jeKliknut', JSON.stringify(1));
    $('#salon').hide();
    $('#menadzer').hide();
 })
 $('#salonRadioButton').on('click',function(){ 
    $('#korisnik').hide();
    localStorage.setItem('jeKliknut', JSON.stringify(2));
    $('#salon').show();
    $('#menadzer').hide();
})
$('#menadzerRadioButton').on('click',function(){ 
    $('#korisnik').hide();
    $('#salon').hide();
    $('#menadzer').show();
    localStorage.setItem('jeKliknut', JSON.stringify(3));
})
$('#resetujFormuKorisnik').on('click',function(){ 
 localStorage.setItem('jeKliknut', JSON.stringify(1));
//window.location.href="registracija_novo.html"
});
$('#resetujFormuMenadzer').on('click',function(){ 
    localStorage.setItem('jeKliknut', JSON.stringify(3));
   // window.location.href="registracija_novo.html"
   });
   $('#resetujFormuSalon').on('click',function(){ 
    localStorage.setItem('jeKliknut', JSON.stringify(2));
   // window.location.href="registracija_novo.html"
   });
}); 
  
var pozicijaCitanja=0;
  var poslednji=false;
  var countBox = 0;
  var nizDodatih=[];
  var nizSelektovanih=[];
var selectedValue1;

  //dodavanjeUsluga podrazumeva dodavanje novog reda ili prikazivanje sakrivenog reda (sakriven je zbog pritiska na dugme Ukloni);
  function dodajUsluguSalonaPriRegistraciji() {

  //ako je unet maksimalan broj usluga, treba da se obavesti korisnik o tome
  if(pozicijaCitanja==6) 
  {     document.getElementById("porukaUslugeGreska").innerHTML="<div class='alert alert-danger'>Žao nam je, dodali ste sve usluge koje su na raspolaganju!</div>";
    return; }
//provera da li je sve uneto u prethodnoj uslugi
{   var e = document.getElementById("izborUsluga"+(pozicijaCitanja).toString());
    var selectedValue =e.options[e.selectedIndex].text;

  if(document.getElementById("cena"+(pozicijaCitanja).toString()+"_0").value==""||
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_1").value==""||
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_2").value=="")
  { 
    document.getElementById("porukaUslugeGreska").innerHTML="<div class='alert alert-danger'>Da biste dodali novu uslugu, morate popuniti sva polja cena prethodne usluge!</div>";
    return;}
   if(selectedValue=="Izaberite uslugu")  { 
      document.getElementById("porukaUslugeGreska").innerHTML="<div class='alert alert-danger'>Da biste dodali novu uslugu, morate izabrati prethodnu!</div>";
      return;}
  
} 


      //ogranicavanje opcija za izbor u padajucoj listi:
     var values = ["Šišanje", "Ćišćenje ušiju", "Kupanje", "Frizura", "Čišćenje očiju", "Sređivanje noktiju", "Češljanje"];
  
       var e = document.getElementById("izborUsluga"+(pozicijaCitanja).toString());
       var selectedValue =e.options[e.selectedIndex].text;
       nizSelektovanih[pozicijaCitanja]=selectedValue;
  
       
       for (const val of values)
       {
           
           for(let u=0; u<=pozicijaCitanja;u++){
             if(nizSelektovanih[u]==val)
             { 
               switch(val){ 
                 case "Šišanje": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_0").setAttribute("disabled","disabled"); break;
                 case "Ćišćenje ušiju": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_1").setAttribute("disabled","disabled"); break;
                 case "Kupanje": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_2").setAttribute("disabled","disabled"); break;
                 case "Frizura": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_3").setAttribute("disabled","disabled"); break;
                 case "Čišćenje očiju": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_4").setAttribute("disabled","disabled"); break;
                 case "Sređivanje noktiju": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_5").setAttribute("disabled","disabled"); break;
                 case "Češljanje": document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_6").setAttribute("disabled","disabled"); break;

               }
              }
           };
         
       }
  

       
       // disejblovanje prethodne usluge da se menja izbor u padajucoj listi
        var izabranoUListi=document.getElementById("izborUsluga"+(pozicijaCitanja).toString());
        var selectedValue1 =izabranoUListi.options[izabranoUListi.selectedIndex].text;
   
         
        let brojac=0;
        document.getElementById("nista"+(pozicijaCitanja).toString()).setAttribute("disabled","disabled");
       document.getElementById("izborUslugaS"+pozicijaCitanja.toString()).value=selectedValue1;
       document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_0").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_0").value;
       document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_1").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_1").value;
       document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_2").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_2").value;
      
      
        //NOVO 
    document.getElementById("cena"+pozicijaCitanja.toString()+"_0").setAttribute("disabled","disabled");
    document.getElementById("cena"+pozicijaCitanja.toString()+"_1").setAttribute("disabled","disabled");
    document.getElementById("cena"+pozicijaCitanja.toString()+"_2").setAttribute("disabled","disabled");

        //DOVDE
     
        for (const val of values)
        { 
          
            if(val==selectedValue1) {  brojac++;
              continue;
            };
            document.getElementById("opcija"+(pozicijaCitanja).toString()+"_"+( brojac++).toString()).setAttribute("disabled","disabled");
           ;
          
        }

        //setovanje na prazno usluge koja se otkriva
        document.getElementById("cena"+(pozicijaCitanja+1).toString()+"_0").value="";
        document.getElementById("cena"+(pozicijaCitanja+1).toString()+"_1").value="";
        document.getElementById("cena"+(pozicijaCitanja+1).toString()+"_2").value="";
    
         //oktrivanje sakrivenog reda
        document.getElementById(nizSakrivenih[pozicijaCitanja++]).setAttribute("style", "display: table-row");
        countBox=pozicijaCitanja;
    document.getElementById("porukaUslugeGreska").innerHTML="";
    
}










 function sakrijRed(){ 
   if(pozicijaCitanja==0) { 
    document.getElementById("porukaUslugeGreska").innerHTML="<div class='alert alert-danger'>Žao nam je, morate imati bar jednu uslugu!</div>"; return}
    pozicijaCitanja--;
    
//enejblujemo aktivnu uslugu koja se bira
    var values = ["Šišanje", "Ćišćenje ušiju", "Kupanje", "Frizura", "Čišćenje očiju", "Sređivanje noktiju", "Češljanje"];
    var nastavi;
    var brojac=-1;
    for (const val of values)
    { nastavi=false;
      brojac++;
      for(let u=0;u<=pozicijaCitanja;u++){ 
        if(nizSelektovanih[u]==val) {nastavi=true; break;}
      }
      if(nastavi) continue;
      document.getElementById("opcija"+(pozicijaCitanja).toString()+"_"+(brojac).toString()).removeAttribute("disabled");

    }

document.getElementById("nista"+(pozicijaCitanja)).removeAttribute("disabled");
document.getElementById("izborUslugaS"+pozicijaCitanja.toString()).value="";
  //NOVO
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_0").removeAttribute("disabled");
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_1").removeAttribute("disabled");
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_2").removeAttribute("disabled");
 
  //OVDE

  
  
//vratimo na difolt uslugu koja se sakriva
document.getElementById("nista"+(pozicijaCitanja+1)).removeAttribute("disabled");
   document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_0").removeAttribute("disabled");
   document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_1").removeAttribute("disabled");
   document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_2").removeAttribute("disabled"); 
    document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_3").removeAttribute("disabled");
     document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_4").removeAttribute("disabled"); 
     document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_5").removeAttribute("disabled"); 
   document.getElementById("opcija"+(pozicijaCitanja+1).toString()+"_6").removeAttribute("disabled");
 
   document.getElementById("porukaUslugeGreska").innerHTML="";
   document.getElementById(nizSakrivenih[pozicijaCitanja]).setAttribute("style", "display: none");

 }


var velicinaNiza=6;
var nizSakrivenih=[];
function dodajSveUsluge(){
 
  for(let j=1;j<=6;j++){
  var breakNode = document.createElement("br");
    breakNode.className = j.toString();
    var values = ["Šišanje", "Ćišćenje ušiju", "Kupanje", "Frizura", "Čišćenje očiju", "Sređivanje noktiju", "Češljanje"];
    var select = document.createElement("select");
   
    select.type = "select";
  //  select.className = j.toString();
    select.classList.add(j.toString(),"inpt4");
    select.name="izborUsluga"+j.toString();
    select.id="izborUsluga"+j.toString();
    select.style="text-align:left;width: 240px;"
    var option = document.createElement("option");
    option.text="Izaberite uslugu"; 
    select.appendChild(option);
    option.name="nista"+j.toString();
    option.id="nista"+j.toString();
    let k=0;
    for (const val of values)
    {
        var option = document.createElement("option");
        option.value=val;
        option.name="opcija"+j.toString()+"_"+k.toString();
        option.id="opcija"+j.toString()+"_"+k.toString();
        option.text = val.charAt(0).toUpperCase() + val.slice(1);
        select.appendChild(option);
        k++;
    }


    var input1=document.createElement("input");
    input1.type="number";
    input1.id="cena"+j.toString()+"_"+"0";
    input1.placeholder="RSD";
    input1.name="cena"+j.toString()+"_"+"0";
    input1.className="inpt4";
    var input2=document.createElement("input");
    input2.type="number";
    input2.id="cena"+j.toString()+"_"+"1";
    input2.placeholder="RSD";
    input2.className="inpt4";
    input2.name="cena"+j.toString()+"_"+"1";
    var input3=document.createElement("input");
    input3.type="number";
    input3.id="cena"+j.toString()+"_"+"2";
    input3.placeholder="RSD";
    input3.className="inpt4";
    input3.name="cena"+j.toString()+"_"+"2";
   
  /*  input1.setAttribute("required","");
    input1.setAttribute("oninvalid","this.setCustomValidity('Morate popuniti ovo polje!')");
    input1.setAttribute('oninput',"setCustomValidity('')");
    input2.setAttribute("required","");
    input2.setAttribute("oninvalid","this.setCustomValidity('Morate popuniti ovo polje!')");
    input2.setAttribute('oninput',"setCustomValidity('')");
    input3.setAttribute("required","");
    input3.setAttribute("oninvalid","this.setCustomValidity('Morate popuniti ovo polje!')");
    input3.setAttribute('oninput',"setCustomValidity('')");
*/
    var red=document.createElement("tr");
    red.setAttribute("id","red"+j.toString());
    red.setAttribute("style","display:none;  position: relative;top: -25px; left:10px");
    nizSakrivenih[j-1]="red"+j.toString();
    var kolona1=document.createElement("td");
    var kolona2=document.createElement("td");
    var kolona3=document.createElement("td");
    var kolona4=document.createElement("td");
    
    kolona1.appendChild(select);
    kolona2.appendChild(input1);
    kolona3.appendChild(input2);
    kolona4.appendChild(input3);
    red.appendChild(kolona1);
    red.appendChild(kolona2);
    red.appendChild(kolona3);
    red.appendChild(kolona4);
    
    var container = document.getElementById('dodavanjeUslugaTabela');
   
    container.appendChild(red);

    document.getElementById("izborUslugaS0").value="";
 document.getElementById("izborUslugaS1").value="";
 document.getElementById("izborUslugaS2").value="";
 document.getElementById("izborUslugaS3").value="";
 document.getElementById("izborUslugaS4").value="";
 document.getElementById("izborUslugaS5").value="";
 document.getElementById("izborUslugaS6").value="";

}

}



function kliknuoRegistracijaSalon(){ 
   
//provera da li je sve uneto u prethodnoj uslugi
{ 
     var e = document.getElementById("izborUsluga"+(pozicijaCitanja).toString());
    var selectedValue =e.options[e.selectedIndex].text;
 document.getElementById("izborUslugaS"+(pozicijaCitanja).toString()).value=selectedValue;
 document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_0").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_0").value;
 document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_1").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_1").value;
 document.getElementById("cenaS"+(pozicijaCitanja).toString()+"_2").value=document.getElementById("cena"+(pozicijaCitanja).toString()+"_2").value;


  if(document.getElementById("cena"+(pozicijaCitanja).toString()+"_0").value==""||
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_1").value==""||
  document.getElementById("cena"+(pozicijaCitanja).toString()+"_2").value=="")
  { //alert("nije")
document.getElementById("daLiJeSveIspravnoKodUsluga").value="N"; 
   }
    if(selectedValue=="Izaberite uslugu")  { 
       // alert("nije")
document.getElementById("daLiJeSveIspravnoKodUsluga").value="N";}

    }
}