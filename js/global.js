var paso_actual=0,paso_maximo=5,paso_minimo=1;$(function(){$(".gt-btn-menu").on("click",function(a){a.preventDefault(),document.getElementById("gt-sidenav").style.width="280px",document.getElementById("main").style.marginLeft="280px"}),$(".closebtn").on("click",function(a){a.preventDefault(),document.getElementById("gt-sidenav").style.width="0",document.getElementById("main").style.marginLeft="0"}),$(".btn-siguiente").on("click",function(a){console.log("entramos"),paso=Number($(this).data("paso")),$(this).hasClass("animar-boton")&&$(this).removeClass("animar-boton"),paso<paso_maximo&&(paso_actual=paso+1,$(this).data("paso",paso_actual),$(".paso-"+paso_actual).removeClass("out").addClass("active"),$(".btn-anterior").data("paso",paso_actual))}),$(".btn-anterior").on("click",function(a){console.log("entramos anterior"),paso=Number($(this).data("paso")),paso>paso_minimo&&(console.log(paso," - ",paso_minimo),$(".paso-"+paso).removeClass("active").addClass("out"),paso_actual=paso-1,$(this).data("paso",paso_actual),$(".btn-siguiente").data("paso",paso_actual))})});