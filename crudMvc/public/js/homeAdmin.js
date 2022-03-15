// // $('#input_starttime').pickatime({
// //     // 12 or 24 hour
// //     twelvehour: true,
// //     });

// // if(strcmp($gare_depart,$gare_arriver)!=0){

// //     if($heure_depart<$heure_fin ){
// //        $db->addVoyage($gare_depart,$gare_arriver,$prix,$heure_depart,$heure_fin,$id_train,$etat_voyage);
// //        $data['voyages']=$db->getAllVoyages();
// //          view::load('home',$data);

// //     }
// //     else{
// //         $data['errorHeure']="verifier l'heures";
// //     }

// //  }else $data['errorFar']="les villes sont les memes";


// // }


// // 
function formCheck(){
    var gare_depart = document.getElementById("gare_depart").value;
    var gare_arriver = document.getElementById("gare_arriver").value;
    var heure_depart = document.getElementById("heure_depart").value;
    var heure_fin = document.getElementById("heure_fin").value;

    if(gare_depart.localeCompare(gare_arriver)==0){

        document.getElementById("errorGareP").innerHTML="erreur gare";
        document.getElementById("errorGare").style.display="block";
        return false;

    }

    if(heure_depart>=heure_fin){

        document.getElementById("errorHeureP").innerHTML="erreur heure";
        document.getElementById("errorHeure").style.display="block";
        return false;


    }
}

// updateForm

function showUpdateBox(id_voyage,gare_depart,gare_arriver,prix,heure_depart,heure_fin,nom_train,etat_voyage){
    // document.querySelector('.crud-form-products').style.visibility = 'visible';
    document.getElementById("gare_depart").value=gare_depart;
    document.getElementById("gare_arriver").value=gare_arriver;
    document.getElementById("prix").value=prix;
    document.getElementById("heure_depart").value=heure_depart;
    document.getElementById("heure_fin").value=heure_fin;
    document.getElementById("etat_voyage").value=etat_voyage;
    document.getElementById("id_train").value=nom_train;
    document.getElementById("id_voyage").value=id_voyage;
    // document.getElementById("id_voyageV").style.display="block";
    // document.getElementById("product_thumb").src=product_thumb;
}
//reset form add 

function resetForm(){
    document.getElementById("gare_depart").value="";
    document.getElementById("gare_arriver").value="";
    document.getElementById("prix").value="";
    document.getElementById("heure_depart").value="";
    document.getElementById("heure_fin").value="";
    // document.getElementById("etat_voyage").value="";
    // document.getElementById("id_train").value="";
    document.getElementById("id_voyage").value="";



}
function paasingIdVoyagePoup(id_voyage){

    document.getElementById("id_voyageA").value=id_voyage;


}

