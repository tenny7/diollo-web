$(function(){
    $("#tog-btn").click(function(){
      console.log("hello world");
      $(".other-menu").toggle();
    });
});


    // $(document).ready(function(){
    //   $('.carousel').slick({
    //     slidesToShow: 4,
    //     dots:true,
    //     autoplay: true,
    //     centerMode: true,
    //     autoplaySpeed: 2000,
    //   });
    // });

    // $(document).ready(function(){
    //   $('.carousel').slick({
    //   slidesToShow: 4,
    //   dots:true,
    //   centerMode: true,
    //   });
    // });
    // $(document).ready(() =>{
    //   console.log('hello')
    // })

    document.getElementById("btn1").onclick = function(){
                document.getElementById("number").innerHTML--;
            }
            document.getElementById("btn2").onclick = function(){
                document.getElementById("number").innerHTML++;
            }
