$(".readmore-btn").on('click', function(){
    $(this).parent().toggleClass("showContent")
    // var replace = $(this).parent().hasClass("showContent") ? "Read less" : "Read more" ;
    // $(this).text(replace);
});



// let changeIcon = function(icon){
//     icon.classList.toggle('fa-angle-up')
//    }