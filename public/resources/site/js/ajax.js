
function addToCart($prod_id){
    var myRequest =new XMLHttpRequest();
    myRequest.onreadystatechange=function(){
    
 

        if(this.readyState === 4 && this.status === 200){
    
    
    
    
        //  var myJsonObject =JSON.parse(this.responseText);
    
        var x=this.responseText;
         if(x=='done'){
           showMessage('done','Successfully added');
          }else if (x=='this already in your cart') {
            showMessage('error','this already in your cart');
          } else {
            showMessage('error',x);
          }
      
      
       
               
             
         }  
      };


      myRequest.open(
        "GET",
            "/ajax/addtocart/"+$prod_id,
            true
        );
        myRequest.send();
    
     
    

}


function wishList(x,prod_id){
  var myRequest =new XMLHttpRequest();
  myRequest.onreadystatechange=function(){
  


      if(this.readyState === 4 && this.status === 200){
  
  
  
  
      //  var myJsonObject =JSON.parse(this.responseText);
  
      var get=this.responseText;
       if(get=='delete'){
        love(x,'delete');
        }else if (get=='done') {
          love(x,'done');
        } else {
      
        }
    
    
     
             
           
       }  
    };


    myRequest.open(
      "GET",
          "/ajax/love/"+prod_id,
          true
      );
      myRequest.send();
  
   
  

}




function deleteFromCart(element,prod_id,price){
  var myRequest =new XMLHttpRequest();
  myRequest.onreadystatechange=function(){
  


      if(this.readyState === 4 && this.status === 200){
  
  
  
  
      //  var myJsonObject =JSON.parse(this.responseText);
  
      var x=this.responseText;
       if(x=='done'){
        resetCartOnDelete(element,price);
         showMessage('done','Deleted successfully');
        }
    
    
     
             
           
       }  
    };


    myRequest.open(
      "GET",
          "/ajax/deletCartItems/"+prod_id,
          true
      );
      myRequest.send();
  
   
  

}


function saveForLatter(element,prod_id,price){
  var myRequest =new XMLHttpRequest();
  myRequest.onreadystatechange=function(){
  


      if(this.readyState === 4 && this.status === 200){
  
  
  
  
      //  var myJsonObject =JSON.parse(this.responseText);
  
      var x=this.responseText;
     
       if(x=='done'){
        resetCartOnsave(element,price);
        
         showMessage('done','saved successfully');
        
        }
    
    
     
             
           
       }  
    };


    myRequest.open(
      "GET",
          "/ajax/saveforlatter/"+prod_id,
          true
      );
      myRequest.send();
  
   
  

}



function search(name){
  var searchItems=document.getElementById('searchitems');

  if(name ==""){
    searchItems.style.display='none';
   }else{

    var myRequest =new XMLHttpRequest();
   myRequest.onreadystatechange=function(){
  
       
  
      // alert(name);
      if(this.readyState === 4 && this.status === 200){
  
        var myJsonObject =JSON.parse(this.responseText);

      
        if(myJsonObject.length>0){
          searchItems.style.display='block';
          var out='';
          for(var i=0; i<myJsonObject.length; i++){
            out+='<div class="item">';
            out+= '<img src="images/products/'+myJsonObject[i].prod_image+'"></img>';
            out+='<div><a href="/product/'+myJsonObject[i].prod_id+'">'+myJsonObject[i].prod_name+'</a><p>$'+myJsonObject[i].prod_price+'</p></div>';
            out+='</div>';
          }
          searchItems.innerHTML =out;
          
  
  
        
        }else{
          searchItems.innerHTML ='';
          searchItems.style.display='none';
        }
     
             
           
       }  
    };


    myRequest.open(
      "GET",
          "/ajax/search/"+name,
          true
      );
      myRequest.send();
  


     
   }
  
   
  

}