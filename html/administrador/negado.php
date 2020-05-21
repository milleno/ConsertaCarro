<?php require_once('../Connections/setetravel.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_RsUser = "-1";
if (isset($_SESSION['codigo'])) {
  $colname_RsUser = $_SESSION['codigo'];
}
mysql_select_db($database_setetravel, $setetravel);
$query_RsUser = sprintf("SELECT * FROM mnpa_login WHERE codigo = %s", GetSQLValueString($colname_RsUser, "int"));
$RsUser = mysql_query($query_RsUser, $setetravel) or die(mysql_error());
$row_RsUser = mysql_fetch_assoc($RsUser);
$totalRows_RsUser = mysql_num_rows($RsUser);

$colname_RsUser = "-1";
if (isset($_GET['codigo'])) {
  $colname_RsUser = $_GET['codigo'];
}
mysql_select_db($database_setetravel, $setetravel);
$query_RsUser = sprintf("SELECT * FROM mnpa_login WHERE codigo = %s", GetSQLValueString($colname_RsUser, "int"));
$RsUser = mysql_query($query_RsUser, $setetravel) or die(mysql_error());
$row_RsUser = mysql_fetch_assoc($RsUser);

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-Edge">
	<meta name="author" content="webThemez.com">
	<title>Início -Área Administrativa Proposta Digital</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
		<div id="header-top">       
		<!--  HEADER TOP -->
        <div class="container">
        	<div class="row">
				<div class="col-md-6"> 
                    
                        <div class="text">
                            
							<p>Fone: 11 2988-1577 | WhatsApp: 11 98453-5123</p>
                            
                        </div>      
                </div><!-- end -->
            	<div class="col-md-6">              	
                   <div class="text">
				<p>Olá: <?php echo $_SESSION['MM_Username']; ?> </p>
                </div>
                    
                </div><!-- end -->
            </div><!-- end .row -->
           </div> 
		</div>
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- Article content -->
			<section class="col-sm-12 maincontent">
				<h3>Você não tem acesso  a esta área administrativa Conserta Carros</h3>
				<p>
					Bem vindo a sua área administrativa, aqui você poderá incluir, excluir e editar o conteúdo de seu site.
				</p>

			</section>
		</div>
	</div>
	<!-- /container -->

	<section class="container">
		<div class="heading">
			<!-- Heading -->
			<p>&nbsp;</p>
			<br />
		</div>
		
	</section>

	<footer id="footer">
		<div class="container">
			<div class="social text-center">
           	  <a href="http://www.facebook.com.br/propostadigital"><i class="fa fa-facebook"></i></a>
				<a href="http://www.twitter.com/propostadigital"><i class="fa fa-twitter"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								suporte: contato@propostadigital.com.br
						  </p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2017. by <a href="http://www.propostadigital.com.br/" rel="develop">PropostaDigital</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
<?php
mysql_free_result($RsUser);
?>
