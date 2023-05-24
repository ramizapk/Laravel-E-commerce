//navbar fixed on scroll

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}


//close message 
 function closeBigMessage(){
  var message =document.getElementById("bigmessage");
  message.style.display ='none';
 }
//show and hide search 

function searchState(){

    var search =document.getElementById("searchBar");
    var searchItems=document.getElementById('searchitems');
    var state= search.style.display;
    if(state == 'none'){
      search.style.display ='block';
      search.addEventListener('animationend', () => {
            
        search.style.display ='block';
       
       
     });
      search.style.animationName='showSearchBar';
      

    }else{
        searchItems.style.display ='none';
        search.style.animationName='hideSearchBar';
        search.addEventListener('animationend', () => {
            
            search.style.display ='none';
           
           
         });
     
    }
}


// nav bar on mobile devices

function mobileNavLinks(){
    var navbarLinks = document.getElementById("navlinks");

    var icon = document.getElementById("navicon");

    var state = navbarLinks.style.display;
  
      
    if(state !='flex'){
        
        navbarLinks.style.display="flex";
        navbarLinks.style.animationName='showNavLinks';

        navbarLinks.addEventListener('animationend', () => {
        navbarLinks.style.display="flex";
        });

        icon.style.transform='rotate(90deg)';

    }else{
     
        navbarLinks.style.animationName='hideNavLinks';

        navbarLinks.addEventListener('animationend', () => {
        navbarLinks.style.display="none";
        });

        icon.style.transform='rotate(0deg)';
    }
}


//user box
function userBox(){
    var user = document.getElementById("user-box");

    // var icon = document.getElementById("navicon");

    var state = user.style.display;
    
   
    if(state !='flex'){
       
        user.style.display='flex';


    }else{
        user.style.display='none';
    }

}


//love button

function love(x,y){
    var name=x.className;
 
    if(y=='done'){
     x.className =x.className.replace('far','fas');
    
    }else if(y=='delete'){
        x.className =x.className.replace('fas','far');
    }
}



function messageContent(text,type ,id){

  if(type=='done'){
    var x ="<div class='done' id='"+id+"'><i class='fas fa-check-circle'></i> <span>"+text+"</span>  <i class='fas fa-times' onclick='closeMessage(this);'></i></div>";
    return x;

  }
  if(type=='error'){
    var x ="<div class='error' id='"+id+"'><i class='fas fa-exclamation-triangle'></i> <span>"+text+"</span>  <i class='fas fa-times' onclick='closeMessage(this);'></i></div>";
    return x;
  }

}

function removeMessage(id){
  var x=id;
  setTimeout(
    function() {
    var lastMessage = document.getElementById(x);
    lastMessage.remove(); 
  },30000);
}

function closeMessage(id){
  var parentId=id.parentNode.id;
  var lastMessage = document.getElementById(parentId);
  lastMessage.remove(); 
 

}

function showMessage(type ,text){
  const d = new Date();
  var id='ramiz';
  id+=Math.random()+Math.random()+d.getTime();
  
   var container= document.getElementById("newMessage");

   var message =messageContent(text,type ,id);

   container.innerHTML+=message;

   removeMessage(id);
   console.log(id);
}

function cartItemAdd(elemnt,process,max,price){
  //increase and decrease
  var text = elemnt.parentNode;
  var textbox=text.children[1];
  var total=document.getElementsByClassName("totalprice");
  var itemsCount=document.getElementsByClassName("allPiecces");
  total1=total[0].innerText.slice(1);
  total2=total[1].innerText.slice(1);

  total1=parseInt(total1);
  total2=parseInt(total2);
  var itemsCountNumbers=(parseInt(itemsCount[0].innerText));

  if(textbox.value<max && process =='increase'){
    textbox.value=parseInt(textbox.value) + 1;
    // total[0].innerHTML='$'+(total1+price);
    total[1].innerHTML='$'+(total2+price);
    itemsCount[0].innerText=itemsCountNumbers+1;
      
  }else if(textbox.value>1 && process =='decrease'){
    textbox.value=parseInt(textbox.value) - 1;
    // total[0].innerHTML='$'+(total1-price);
    total[1].innerHTML='$'+(total2-price);
    itemsCount[0].innerText=itemsCountNumbers-1;

  }
 

}

function resetCartOnsave(element,price){
  var total=document.getElementsByClassName("totalprice");
  var itemsCount=document.getElementsByClassName("allPiecces");
  var contOne=document.getElementsByClassName("itemsCount");

  var itemsCountNumbers=(parseInt(itemsCount[0].innerText));
  var countOneNumbers=(parseInt(contOne[0].innerText));
  total1=total[0].innerText.slice(1);
  total2=total[1].innerText.slice(1);
  total1=parseInt(total1);
  total2=parseInt(total2);

   text=element.parentNode.children[3];
   var count=parseInt(text.children[1].value);

   var price=parseInt(price);
   var totalPrice=count*price;

   total[0].innerHTML='$'+(total1-price);
   total[1].innerHTML='$'+(total2-totalPrice);

   itemsCount[0].innerText=itemsCountNumbers-count;
   contOne[0].innerText=countOneNumbers-1;


 


  element.parentNode.parentNode.parentNode.remove();
}

function resetCartOnDelete(element,price){
  var total=document.getElementsByClassName("totalprice");
  var itemsCount=document.getElementsByClassName("allPiecces");
  var contOne=document.getElementsByClassName("itemsCount");
  //

  var itemsCountNumbers=(parseInt(itemsCount[0].innerText));
  var countOneNumbers=(parseInt(contOne[0].innerText));

  total1=total[0].innerText.slice(1);
  total2=total[1].innerText.slice(1);
  total1=parseInt(total1);
  total2=parseInt(total2);

   text=element.parentNode.children[0].children[1].children[3];
   var count=parseInt(text.children[1].value);

   var price=parseInt(price);
   var totalPrice=count*price;

   total[0].innerHTML='$'+(total1-price);
   total[1].innerHTML='$'+(total2-totalPrice);

   itemsCount[0].innerText=itemsCountNumbers-count;
   contOne[0].innerText=countOneNumbers-1;


 


  element.parentNode.remove();
}



// $("#").rating({
//     // "value": 2,
//     "click": function(e) {
//       console.log(e);
    
//     }
//   });

  $("#dataReview").rating({
    "half":true,
      "click":function (e) {
    
    // console.log(e);// {stars: 3, event: E.Event}
    
        alert(e.stars);// 3
    
      }
    
    });
    
this.flickity.on('uiChange', function() {
    currentFlickity.player.play();
  });






