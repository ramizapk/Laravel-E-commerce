


function getSubCategories(x){
  var myRequest =new XMLHttpRequest();
  var cont=document.getElementById("subcat");
  myRequest.onreadystatechange=function(){
    
 

    if(this.readyState === 4 && this.status === 200){




     var myJsonObject =JSON.parse(this.responseText);

     if(myJsonObject.length>0){
        var out='<label>Select SubCategoreis  :</label>';
            out+="<select name='cate_id'>";
         for(var i=0; i<myJsonObject.length; i++){
              out+="<option value='" + myJsonObject[i].cate_id + "'>" + myJsonObject[i].cate_name + "</option>";
            
              
           }
           out+="</select>";
       cont.innerHTML =out;
      }else{
        cont.innerHTML='';
      }

  
   
           
         
     }  
  };



  myRequest.open(
    "GET",
        "/ajax/subcategories/"+x,
        true
    );
    myRequest.send();

 
 

}



function deleteRow(id,row,processname,name){
  var myRequest =new XMLHttpRequest();
  myRequest.onreadystatechange=function(){

    if(this.readyState === 4 && this.status === 200){


      if(this.responseText =="done"){
        showmessage(name+" has been deleted !");
        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById("table").deleteRow(i);
        $bottomCounter=document.getElementById("bottomCounter");
        bottomCounter.innerText =parseInt(bottomCounter.innerText)-1;
       
      }else{
        showmessage("you can't delete this !");
      }





    }  
  };

  
  myRequest.open(
    "GET",
        "/ajax/"+processname+"/delete/"+id,
        true
    );
    myRequest.send();

 

}


function display(id,position,processname){
  var row=position.parentNode.parentNode;
  var long=row.cells.length;
  var textPosition=long-2;
  
  if(processname =='categories'){
    textPosition-=1;

  }
  var element=row.cells[textPosition];






  var myRequest =new XMLHttpRequest();
  myRequest.onreadystatechange=function(){

    if(this.readyState === 4 && this.status === 200){


      if(this.responseText =="done"){
        element.innerText=='available'? element.innerText='unavailable' : element.innerText='available';
         position.innerText=='show'?  position.innerText='hide' :  position.innerText='show';
      }else{
        alert(this.responseText);
      }





    }  
  };

  
  myRequest.open(
    "GET",
        "/ajax/"+processname+"/display/"+id,
        true
    );
    myRequest.send();



}