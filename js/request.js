function request(action){

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'serv.php?req='+action);

  //On envoie les données d’un formulaire
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        document.getElementById('posts').innerHTML = xhr.responseText
    }
  }
};

xhr.send()

}


