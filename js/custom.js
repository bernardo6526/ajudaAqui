$(document).ready(function(){


  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });

  $("ul.nav-sidebar li a").on('click', function() {
    $("ul.nav-sidebar li.current").removeClass('current');
    $(this).parent().addClass('current');

    $url = $(this).attr('data-url');
    if ($url != "") {
      $("#conteudo").load($url);
    }
    else {
      location.reload();
    }
  });

  $("#editar").on('click', function() {
    $url = $(this).attr('data-url');
    if ($url != "") {
      $("#conteudo").load($url);
    }
    else {
      location.reload();
    }
  });
  
  $("#sair").on('click', function() {
    
    $.get('bll/sessionDestroy.php', function(data) {
      window.location.replace('index.html');
    });
  });

});