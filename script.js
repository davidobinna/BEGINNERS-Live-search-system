$(document).ready(function() {
    //on typing any key, a callback function is activated to call ajax request
    $("#search").keyup(function () {
     let searchText = $(this).val();
     if (searchText != "") {

      /**       This is ajax request, it uses post method to sending the form text property
       *         to the action.php on the server in json format 
       * * */

       $.ajax({
         url:"action.php",
         method: "post",
         data: {
           query: searchText,
         },
         // the response from the server is passed as a parameter to the call back function
         success: function (response)
         {
          //the show-list id uses html propertice to display the response data
           $("#show-list").html(response);
         },
       });

     } else {
       $("#show-list").html("");
     }

   });
    // here we are binding a click even on 'a' tags anywhere it appears on the document.
    //when you click on predicted items, it places the text data on the form value.
  $(document).on("click","a",function(){
     $("#search").val($(this).text());
      $("#show-list").html("");
  });

});
