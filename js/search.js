$(document).ready(function(){
    $("#image").keyup(function(){
        var input = $(this).val();
        // alert(input);
        if(input != ""){
            $.ajax({
                url:"livesearch.php",
                method:"POST",
                data:{input:input},

                success:function(data){
                     $("#searchresult").html(data);
                     $("#searchresult").css("display","block");
                }
            });
        }else{
            $("#searchresult").css("display","none");
        }
    });
});