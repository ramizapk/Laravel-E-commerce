const actualBtn = document.getElementById('actual-btn');
const actualBtn1 = document.getElementById('actual-btn1');
const actualBtn2 = document.getElementById('actual-btn2');
const actualBtn3 = document.getElementById('actual-btn3');
const actualBtn4 = document.getElementById('actual-btn4');
const actualBtn5 = document.getElementById('actual-btn5');
const actualBtn6 = document.getElementById('actual-btn6');
const actualBtn7 = document.getElementById('actual-btn7');
const actualBtn8 = document.getElementById('actual-btn8');
const fileChosen = document.getElementById('file-chosen');
const fileChosen1 = document.getElementById('file-chosen1');
const fileChosen2 = document.getElementById('file-chosen2');
const fileChosen3 = document.getElementById('file-chosen3');
const fileChosen4 = document.getElementById('file-chosen4');
const fileChosen5 = document.getElementById('file-chosen5');
const fileChosen6 = document.getElementById('file-chosen6');
const fileChosen7 = document.getElementById('file-chosen7');
const fileChosen8 = document.getElementById('file-chosen8');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
actualBtn1.addEventListener('change', function(){
    fileChosen1.textContent = this.files[0].name
  })
  actualBtn2.addEventListener('change', function(){
    fileChosen2.textContent = this.files[0].name
  })
  actualBtn3.addEventListener('change', function(){
    fileChosen3.textContent = this.files[0].name
  })
  actualBtn4.addEventListener('change', function(){
    fileChosen4.textContent = this.files[0].name
  })
  actualBtn6.addEventListener('change', function(){
    fileChosen6.textContent = this.files[0].name
  })
  actualBtn7.addEventListener('change', function(){
    fileChosen7.textContent = this.files[0].name
  })
  actualBtn8.addEventListener('change', function(){
    fileChosen8.textContent = this.files[0].name
  })
  actualBtn5.addEventListener('change', function(){
    fileChosen5.textContent = this.files[0].name
  })


function hideNav(){
var x =document.getElementById("nav");
var y =document.getElementById("right");
var list =document.getElementById("list");
var close =document.getElementById("close");
if(x.style.display == "none"){
    x.style.display="flex";
    y.style.width="80%";
    list.style.display="none";
    close.style.display="block";

}else{
    x.style.display="none";
    y.style.width="100%";
    list.style.display="block";
    close.style.display="none";
}
}



function hideSubList(x){
    var sub =document.getElementById(x);
    if(sub.style.display == "block"){
        sub.style.display="none";
    }
    else{
        sub.style.display="block";
    }
}

function hidemessage(x){
    
    
    x.parentElement.style.display="none";

 
      
   
}

function showmessage(text){
  var message = "<div class='alert_message_cont'><p>"+text+"</p><img src='resources/admin/images/closemessage.png')' onclick='hidemessage(this)' height='15px' width='15px'></div>";
  var parent = document.getElementById("right"); 
  parent.innerHTML+=message;

 
      
   
}



function hidemessage(x){
    
    
  x.parentElement.style.display="none";


    
 
}

function showmessageLogin(text){
  var message = "<div class='alert_message_cont'><p>"+text+"</p><img src='resources/admin/images/loginmessage.png')' onclick='hidemessage(this)' height='15px' width='15px'></div>";
  var parent = document.getElementById("login_cont"); 
  parent.innerHTML+=message;

 
      
   
}





