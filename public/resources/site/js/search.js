//Getting value from "ajax.php".

function fill(Value) {

    //Assigning value to "search" div in "search.php" file.
 
    $('#searchBar').val(Value);
 
    //Hiding "display" div in "search.php" file.
 
    $('#searchitems').hide();
 
 }
 
 $(document).ready(function() {
     // $("#search").focusout(function() {
     //     $('#display').hide();
     //    })
    //On pressing a key on "Search box" in "search.php" file. This function will be called.
  
    $("#searchBar").keyup(function() {
 
        //Assigning search box value to javascript variable named as "name".
 
        var name = $('#searchBar').val();
 
        //Validating, if "name" is empty.
 
        if (name == "") {
 
            //Assigning empty value to "display" div in "search.php" file.
 
            $("#searchitems").html("");
            
        }
 
        //If name is not empty.
 
        else {
 
            //AJAX is called.
 
            $.ajax({
 
                //AJAX type is "Post".
 
                type: "POST",
 
                //Data will be sent to "ajax.php".
 
                url: "Ajax.php",
 
                //Data, that will be sent to "ajax.php".
 
                data: {
 
                    //Assigning value of "name" into "search" variable.
 
                    search: name
 
                },
 
                //If result found, this funtion will be called.
 
                success: function(html) {
 
                    //Assigning result to "display" div in "search.php" file.
 
                    $("#searchitems").html(html).show();
 
                }
 
            });
            
                
        }
 
    });
 
 });
 
 
 
 