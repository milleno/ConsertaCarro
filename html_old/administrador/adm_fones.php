<?php require_once('../Connections/consertacarros.php'); ?>
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

$colname_RsLogin = "-1";
if (isset($_GET['id'])) {
  $colname_RsLogin = $_GET['id'];
}
mysql_select_db($database_consertacarros, $consertacarros);
$query_RsLogin = sprintf("SELECT * FROM usuarios WHERE id = %s", GetSQLValueString($colname_RsLogin, "int"));
$RsLogin = mysql_query($query_RsLogin, $consertacarros) or die(mysql_error());
$row_RsLogin = mysql_fetch_assoc($RsLogin);
$totalRows_RsLogin = mysql_num_rows($RsLogin);

mysql_select_db($database_consertacarros, $consertacarros);
$query_RsFones = "SELECT * FROM telefones";
$RsFones = mysql_query($query_RsFones, $consertacarros) or die(mysql_error());
$row_RsFones = mysql_fetch_assoc($RsFones);
$totalRows_RsFones = mysql_num_rows($RsFones);

$colname_RsUser = "-1";
if (isset($_GET['nome'])) {
  $colname_RsUser = $_GET['nome'];
}
mysql_select_db($database_consertacarros, $consertacarros);
$query_RsUser = sprintf("SELECT * FROM usuarios WHERE nome = %s", GetSQLValueString($colname_RsUser, "text"));
$RsUser = mysql_query($query_RsUser, $consertacarros) or die(mysql_error());
$row_RsUser = mysql_fetch_assoc($RsUser);

$colname_RsUser = "-1";
if (isset($_GET['id'])) {
  $colname_RsUser = $_GET['id'];
}
mysql_select_db($database_consertacarros, $consertacarros);
$query_RsUser = sprintf("SELECT * FROM usuarios WHERE id = %s", GetSQLValueString($colname_RsUser, "int"));
$RsUser = mysql_query($query_RsUser, $consertacarros) or die(mysql_error());
$row_RsUser = mysql_fetch_assoc($RsUser);

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Área Administrativa Proposta Digital">
	<meta name="author" content="propostadigital.com.br">
	<title>Início - Área Administrativa Proposta Digital</title>
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
                            
							<p>WhatsApp: 11 98453-5123</p>
                            
                        </div>      
                </div><!-- end -->
            	<div class="col-md-6">              	
                   <div class="text">
				<p>Olá: <?php echo $_SESSION['MM_Username']; ?></p>
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
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="adm_fones.php">telefones</a></li>
					<li><a href="adm_servicos.php">serviÇos</a></li>
                    <li><a href="adm_produtos.php">produtos</a></li>
					<li><a href="adm_usuarios.php">administrador</a></li>
				</ul>
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
				<h3>Bem vindo a área administrativa ConsertaCarros - TELEFONES</h3>
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
            <table border="1" align="center">
              <tr>
                <td width="188">Telefone1</td>
                <td width="202">Telefone2</td>
                <td width="167">Telefone3</td>
                <td width="128">&nbsp;</td>
              </tr>
              <?php do { ?>
              <tr>
                <td> <?php echo $row_RsFones['fone1']; ?>&nbsp; </td>
                <td><?php echo $row_RsFones['fone2']; ?>&nbsp; </td>
                <td><?php echo $row_RsFones['fone3']; ?>&nbsp; </td>
                <td><a href="adm_fones_edit.php?recordID=<?php echo $row_RsFones['id']; ?>" class="btn">EDITAR</a></td>
              </tr>
              <?php } while ($row_RsFones = mysql_fetch_assoc($RsFones)); ?>
            </table>
            <p>&nbsp;</p>
            <p><br>
            <?php echo $totalRows_RsFones ?> Registros Total <br />
            </p>
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
								Copyright &copy; 2018. by <a href="http://www.propostadigital.com.br/" rel="develop">PropostaDigital</a>
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
mysql_free_result($RsLogin);

mysql_free_result($RsFones);
?>
