<?php
$validationErrors = [];  // validacijos klaidu saugojimui
function saveMessage($data) {
    $file = 'data/messages.txt';          // kelias iki duomenu failo
    $content = file_get_contents($file);  // nuskaitom duomenu faila
    $formData = implode(',',$data);       // konvertuojame masyva i stringa
    $content .=$formData."/n";            // prie stringo pridedam eilutes pabaigos simboli
    file_put_contents($file,$content);    // irasome duomenis i duomenu faila
}

function getData(){
    $messages = file_get_contents('data/messages.txt');  // nuskaitom duomenu faila
    $messages = explode('/n',$messages);                 // gauta stringa konvertuojam i masyva
    return $messages;
}

function validate($data){
    global $validationErrors;
    if(empty($data['company']) && !preg_match('/^[A-Za-z0-9]{1,50}$/',$data['company'])){
        // patikrinkite ar imones pavadinimas prasideda raide ir nevirsija 50 simboliu
        $validationErrors[] = "Neivestas imones pavadinimas";
    }
    if(empty($data['departments'])){
        $validationErrors[] = "Neivestas imones departamentas";
    }
    if(empty($data['firstName']) && !preg_match('/^([A-Z]+)0-9{1,30}$/',$data['firstName'])){
        // patikrinkite ar vardas prasideda raide
        $validationErrors[] = "Neivestas vardas";
    }
    if(empty($data['email']) && !preg_match('/^[^-_@A-Za-z0-9]{1,50}$/',$data['email'])){
        // patikrinkite ar el.pastas turi @ simboli
        $validationErrors[] = "Neivestas el.pastas arba pastas neturi @ simbolio";
    }
    if(($data['message'])  && !preg_match('/^[A-Za-z0-9]{1,200}$/',$data['message'])){
        $validationErrors[] = "Neivesta zinute arba zinute neatitinka duomenu formato";
    }
    return $validationErrors;
}