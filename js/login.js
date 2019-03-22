/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/29/2015
   #   Last Change   : 08/04/2015
   #
   ##################################################################### */
   
$(function() {
	
	var $formLogin = $('#login-form');
	var $formLost = $('#lost-form');
	var $formRegister = $('#register-form');
	var $divForms = $('#div-forms');
	var $modalAnimateTime = 300;
	var $msgAnimateTime = 150;
	var $msgShowTime = 2000;

// ESSE AQUI EM BAIXO É O MÉTODO QUE FAZ A VALIDAÇÃO
	$("form").submit(function() {

		if (typeof flagSenha === 'undefined') {

			flagSenha = 1; //Cria flag que só deixa para ver quantas vezes errou a senha
		}

		if ($("#login_username").val() != "" && $("#login_password").val() != "") {

			$.ajax({
				url: $("#login-form").attr('action'),
				data: $("#login-form :input").serializeArray(),
				method: $("#login-form").attr('method'),
				cache: true,
				dataType: 'json',
				success: function(data) {
					
					login = data['login']
					tipo = data['tipo'];

					$("#text-login-msg").text("Bem Vindo " + login).css('color', 'green');
					setTimeout(function() {
					 $("#login-modal").modal('toggle');
					},1000);

					switch(tipo) {
						case '4':
							window.location.replace("admin.php");
						break;
						case '1':
							window.location.replace("clinica.php");
						break;
						case '2':
							window.location.replace("assistente.php");
						break;
						case '3':
							window.location.replace("cliente.php");
						break;
					}

					delete flagSenha;
				},

				error: function() { //Errou a senha? essa função anônima vai executar
					if (flagSenha > 0) {	//Esse código vai executar no máximo 3x
						$("#text-login-msg").text("Usuário ou Senha Incorretos").css('color', 'red');
						$("#login_username").val("").focus();
						$("#login_password").val("");
						flagSenha--;
					}
					else {
						delete flagSenha;
						$("#login_lost_btn").removeClass("hidden");
					}
				}
			}); 
		}
		else {
			$("#text-login-msg").text("Digite o Usuário e senha").css('color', 'red');
		}

		return false;	
	});
	
	$('#login_register_btn').click( function () { window.location.replace("cadastroCliente.html") });
	$('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
	$('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
	$('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
	$('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
	$('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
	
	function modalAnimate ($oldForm, $newForm) {
		var $oldH = $oldForm.height();
		var $newH = $newForm.height();
		$divForms.css("height",$oldH);
		$oldForm.fadeToggle($modalAnimateTime, function(){
			$divForms.animate({height: $newH}, $modalAnimateTime, function(){
				$newForm.fadeToggle($modalAnimateTime);
			});
		});
	}
	
	function msgFade ($msgId, $msgText) {
		$msgId.fadeOut($msgAnimateTime, function() {
			$(this).text($msgText).fadeIn($msgAnimateTime);
		});
	}
	
	function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
		var $msgOld = $divTag.text();
		msgFade($textTag, $msgText);
		$divTag.addClass($divClass);
		$iconTag.removeClass("glyphicon-chevron-right");
		$iconTag.addClass($iconClass + " " + $divClass);
		setTimeout(function() {
			msgFade($textTag, $msgOld);
			$divTag.removeClass($divClass);
			$iconTag.addClass("glyphicon-chevron-right");
			$iconTag.removeClass($iconClass + " " + $divClass);
		}, $msgShowTime);
	}
});