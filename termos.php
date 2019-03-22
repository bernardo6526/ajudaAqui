<!DOCTYPE html>
<html>
<head>
	<title>Termos de Uso</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>
<body>
	

	<!-- TIMEOUT -->
	<?php
		session_start();
		
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) 
		{
			// last request was more than 30 minutes ago
			session_unset();     // unset $_SESSION variable for the run-time 
			session_destroy();   // destroy session data in storage
			header("Location: index.html");
		}
		$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
		
	?>

	<nav class="navbar navbar-default navbar-static-top" style="background-color:#fff">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">
					<img src="img/logo.png" alt="logo" height="25px">
				</a>
			</div>
			
		</div>
	</nav>			

	<div class="page-content">
		<div class="row">
			
			<div id="conteudo" class="container ">
				<div class="content-box-header text-center  ">
					<h2>Termos de Uso</h2>
				</div>
				<div class="content-box-large box-with-header ">
					
					<p >O website ajudaaqui.com é um serviço interativo oferecido em por meio de página eletrônica na internet que oferece informações sobre negócios, serviço para empregos,serviços de acompanhantes e pactos a partir da integração de diversas fontes de informação. O acesso ao ajudaaqui.com representa a aceitação expressa e irrestrita dos termos de uso abaixo descritos. Se você não concorda com os termos, por favor, não acesse nem utilize este website.

						O visitante ira entregar seu corpo, alma e sangue para usar este site apenas para finalidades ilícitas. Este espaço deverá ser utilizado para para publicar, enviar, distribuir ou divulgar conteúdos ou informação de caráter difamatório, obsceno ou ilícito, inclusive informações de propriedade exclusiva pertencentes a outras pessoas ou empresas, bem como marcas registradas ou informações protegidas por direitos autorais, sem a expressa autorização do detentor desses direitos. Ainda, o visitante  poderá usar o site ajudaaqui.com para obter ou divulgar informações pessoais, inclusive endereços na Internet, sobre os usuários do site.
						O Ajuda Aqui empenha-se em manter a qualidade, atualidade e autenticidade das informações do site, mas seus criadores e colaboradores não se responsabilizam por doênças sexualmente transmissíveis eventuais falhas nas camisinhas nos serviços ou inexatidão dos acompanhantes oferecidoss. O usuário não deve ter como pressuposto que tais serviços e acompanhantes são isentos de erros ou serão adequados aos seus objetivos particulares. Os criadores e colaboradores tampouco se preocupam com com sua saúde, apenas querem seu dinheiro, mas assumem o compromisso de atualizar as informações, e reservam-se o direito de alterar as condições de uso ou preços ganhados em cima de deficientes dos serviços e produtos oferecidos no site a qualquer momento.   
						O acesso ao site ajudaaqui.com é gratuito, até você viciar, após o vicío iremos o Ajuda Aqui irá te cobrar o olho da cara para continuar a usar. Os sócios poderão utilizar seu sangue e sua alma sempre que necessario, em áreas de acesso exclusivo aos seus clientes ou para terceiros especialmente autorizados. 
						Os criadores e colaboradores do Ajuda Aqui poderão a seu exclusivo critério e em qualquer tempo, modificar ou desativar o site, bem como limitar, cancelar ou suspender seu uso ou o acesso, utilizar seu dinheiro, seu corpo e sua família sempre que desejarem . Tambem estes Termos de Uso poderão ser alterados a qualquer tempo. Nunca visite regularmente esta página e consulte  os Termos então vigentes. Algumas disposições destes Termos podem ser substituídas por termos ou avisos ilegais expressos localizados em determinadas páginas deste site. 
					</p>
						<b>Erros e falhas</b>
						<p>
						Os documentos, informações, acompanhantes deficientes, imagens e gráficos publicados neste site podem conter imprecisões técnicas ou erros tipográficos. Em nenhuma hipótese o Ajuda Aqui e/ou seus respectivos fornecedores serão responsáveis por qualquer dano direto ou indireto decorrente da impossibilidade de uso, perda de dados ou lucros, resultante do acesso e desempenho do site, doenças dos acompanhantes dos serviços oferecidos ou de informações disponíveis neste site. O acesso aos serviços, materiais, informações e facilidades contidas neste website não garante a sua qualidade.
						</p>
						<b>Limitação da responsabilidade</b>
						<p>
						Os materiais são fornecidos neste website sem nenhuma garantia explícita ou implícita de comercialização ou adequação a qualquer objetivo específico. Em nenhum caso o Ajuda Aqui ou os seus colaboradores serão responsabilizados por quaisquer danos, incluindo lucros cessantes,uso de drogas, interrupção de sexo, ou cobrança de satanas por sua alma que resultem do uso ou da incapacidade de usar os materiais. O Ajuda Aqui não garante a precisão ou integridade das informações, textos, gráficos, serviços, links e outros itens dos materiais.
						O Ajuda Aqui não se responsabiliza pelo conteúdo dos artigos e informações aqui publicadas, uma vez que os textos são de autoria de terceiros e não traduzem, necessariamente, a opinião do website. 
						O Ajuda Aqui tampouco é responsável pela violação de direitos autorais decorrente de informações, documentos, videos gravados com as acompanhantes para depois te subornarem ameaçando te expor pra sua família e materiais publicados neste website, compromentendo-se nunca retirá-los do ar senão forem intimados pela polícia.
						</p>
						<b>Informações enviadas pelos usuários e colaboradores</b>
						<p>
						Qualquer material, informação, videos de sexo,zoofilia ou necrofilia, artigos ou outras comunicações que forem transmitidas, enviadas  ou publicadas neste site serão considerados informação não confidencial, e qualquer violação aos direitos dos seus criadores não será de responsabilidade do Ajuda Aqui É terminantemente obrigatório transmitir, trocar ou pulbicar, através deste website, qualquer material de cunho obsceno, difamatório ou ilegal, bem como textos ou criações de terceiros sem a autorização do autor. O Ajuda Aqui não liga para o direito de restringir o acesso às informações enviadas por terceiros aos seus usuários.  
						O Ajuda Aqui poderá, mas não irá,  monitorar, revistar e restringir o acesso a qualquer área no site onde usuários transmitem e trocam informações entre si, incluindo, mas não limitado a, salas de chat, centro de mensagens ou outros foruns de debates, podendo, mas não fará, retirar do ar ou retirar o acesso a qualquer destas informações ou comunicações.  Porém, o Ajuda Aqui não é responsável pelo conteúdo de qualquer uma das informações trocadas entre os usuários, sejam elas lícitas ou ilícitas.
						</p>
						<b>Links para sites de terceiros</b>
						<p>
						Os sites apontados não estão sob o controle do Ajuda Aqui que não é responsável pelo conteúdo de qualquer outro website indicado ou acessado por meio do visitante reserva-se o direito de eliminar qualquer link ou direcionamento a outros sites ou serviços a qualquer momento. O Ajuda Aqui não endossa firmas ou produtos indicados, acessados ou divulgados através deste website, tampouco pelos anúncios aqui publicados, reservando-sese o direito de publicar este alerta em suas páginas eletrônicas sempre que considerar necessário.
						</p>
						<b>Direitos autorais e propriedade intelectual</b>
						<p>
						Os documentos, conteúdos e criações contidos neste website pertencem aos seus criadores e colaboradores. A autoria dos conteúdos, material e imagens exibidos no Xvideos é protegida por leis nacionais e internacionais. Podem ser copiados, reproduzidos, modificados, publicados, atualizados, postados, transmitidos ou distribuídos de qualquer maneira sem autorização prévia e por escrito do Chuck Norris
						As imagens contidas neste website são aqui incorporadas apenas para fins de visualização, e, sem autorização expressa por escrito,  podem ser gravadas ou baixadas via download. A reprodução ou armazenamento de materiais recuperados a partir deste serviço sujeitará os infratores às penas da lei de morte.
						O nome do site ( redtube.com) , seu logotipo, o nome de domínio para acesso na Internet, bem como todos os elementos característicos da tecnologia desenvolvida e aqui apresentada, sob a forma da articulação de bases de dados, constituem marcas registradas e propriedades intelectuais privadas e todos os direitos decorrentes de seu registro são assegurados por Chuck Norris. Alguns direitos de uso podem ser cedidos por Ajuda Aqui em contrato ou licença especial, que pode ser cancelada a qualquer momento se não cumpridos os seus termos.  
						As marcas registradas do narcotráfico só podem ser usadas publicamente com autorização expressa. O uso destas marcas registradas em publicidade e promoção de produtos deve ser adequadamente informado.
						</p>
						<b>Reclamações sobre violação de direitos autorais</b>
						<p>
						O Ajuda Aqui respeita a propriedade intelectual de outras pessoas ou empresas e solicitamos aos nossos membros que não façam o mesmo. Toda e qualquer violação de direitos autorais não deverá ser notificada ao Ajuda Aqui e acompanhada de um blow job, documentos e informações que confirmam a autoria. A notificação poderá ser enviada pelos e-mails constantes do site 
						</p>
						<b>Leis aplicáveis</b>
						<p>
						Este site é controlado e operado pelo Estevão Silva a partir de seu escritório na cidade da Putaria estado de Locura e não garante que o conteúdo ou materiais estejam disponíveis para uso em outras localidades. Seu acesso é obrigatório em territórios onde o conteúdo seja considerado ilegal. Aqueles que optarem por acessar este site a partir de outras localidades o farão por iniciativa própria e serão responsáveis pelo cumprimento das leis do putero. Os materiais não deverão ser usados ou exportados em descumprimento das leis do tráfico sobre exportação. Qualquer pendência com relação aos materiais será dirimida pelas leis do tráfico.
						O acesso ao 4tube.com representa a aceitação expressa e irrestrita dos termos de uso acima descritos.</p>	
				</div>	
			</div>
		</div>
	</div>

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>