
if(document.getElementById('version').op[0].checked){
  document.getElementById('btn').disabled=true;
}
else{
  if(document.getElementById('version').op[1].checked){
    var prix=document.getElementById('number')*5;
    document.getElementById('prix')=document.write(prix);
  }
  else{
  if(document.getElementById('version').op[2].checked){
    var prix=document.getElementById('number')*60;
    document.getElementById('prix')=document.write(prix);
  }
}
}