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

mysql_select_db($database_consertacarros, $consertacarros);
$query_RsLogin = "SELECT * FROM usuarios";
$RsLogin = mysql_query($query_RsLogin, $consertacarros) or die(mysql_error());
$row_RsLogin = mysql_fetch_assoc($RsLogin);
$totalRows_RsLogin = mysql_num_rows($RsLogin);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "inicio.php";
  $MM_redirectLoginFailed = "erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_consertacarros, $consertacarros);
  
  $LoginRS__query=sprintf("SELECT nome, senha FROM usuarios WHERE nome=%s AND senha=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $consertacarros) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="área administrativa proposta digital">
	<meta name="author" content="propostadigital.com.br">
	<title>Área Administrativa Proposta Digital</title>
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
<script language="JavaScript" type="text/JavaScript">
<!--
function savePass(nameusr,namepwd,valueusr,valuepwd,days) {
  var message = "";
  if (document.passForm.username.value == "" || document.passForm.password.value == "") {
    message = "Insira e-Mail e Senha.";
  }
  if (message.length > 0) {
    alert(message);
    return false;
  } else
  if (document.passForm.savepass.checked == true) {
    var time = new Date(Date.parse(Date()) + 86400000*days);
    document.cookie = nameusr + "=" + escape(valueusr) + "; expires=" + time.toUTCString();
    document.cookie = namepwd + "=" + escape(valuepwd) + "; expires=" + time.toUTCString();
  } else {
    document.cookie = nameusr + "=" + "" + "; expires=Thu,01-Jan-70 00:00:01 UTC";
    document.cookie = namepwd + "=" + "" + "; expires=Thu,01-Jan-70 00:00:01 UTC";
  }
}

function getCookie(name) {
  var arg = name + "=";
  var alen = arg.length;
  var clen = document.cookie.length;
  var i = 0;
  while (i < clen) {
    var j = i + alen;
    if (document.cookie.substring(i, j) == arg) {
      var endstr = document.cookie.indexOf(";", j);
      if (endstr == -1) endstr = document.cookie.length;
      return unescape(document.cookie.substring(j, endstr));
    }
    i = document.cookie.indexOf(" ", i) + 1;
    if (i == 0) break;
  }
  return "";
}

function getPass(nameusr,namepwd) {
  if (getCookie(namepwd) != "undefined" && getCookie(namepwd) != "") {
    document.passForm.username.value = getCookie(nameusr);
    document.passForm.password.value = getCookie(namepwd);
    document.passForm.savepass.checked = true;
  }
}
//-->
</script>
</head>

<body onLoad="getPass('username','password')">
	<!-- Fixed navbar -->
		<div id="header-top">       
		<!--  HEADER TOP -->
        <div class="container">
        	<div class="row">
				<div class="col-md-6"> 
                    
                        <div class="text">
                            
							<p> WhatsApp: 11 98453-5123</p>
                            
                        </div>      
                </div><!-- end -->
            	
          </div><!-- end .row -->
           </div> 
		</div>
	
		</div>
	</div>
	<!-- /.navbar -->

	<header >
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Área Administrativa</h1>
				</div>
			</div>
		</div>
	</header>

	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Área Restrita</h3>
						
						
					  <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" class="form-light mt-20" role="form" id="passForm" name="passForm">
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Usuário</label>
										<input type="text" class="form-control" placeholder="Usuário" name="username" id="username">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Senha</label>
										<input name="password" type="password" id="password" value="senha" class="form-control" placeholder="Senha" >
									</div>
								</div>
							</div>
                            <input name="savepass" type="checkbox" value="true" onClick="return savePass('username','password',username.value,password.value,999)">
          <font face="Arial" size="1">Salvar Senha</font>
							
						  <button type="submit" class="btn btn-two" name="Enviar" id="enviar" onClick="return savePass('username','password',username.value,password.value,999)">Login</button><p><br/></p>
						</form>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Proposta Digital</h3>
								<div class="contact-info">
									<h5>Suporte</h5>
									<p>www.propostadigitalo.com.br</p>
									
									<h5>E-mail</h5>
									<p>contato@propostadigital.com.br</p>
									
									<h5>WhatsApp</h5>
									<p>11 98453-5123</p>
								</div>
							</div>
							<div class="col-md-6">
								<h3 class="section-title">Atendimento</h3>
								<div class="contact-info">
									<h5>Segunda a Sexta-Feira</h5>
									<p>09:00 AM - 5:30 PM</p>
									
									
							  </div>
							</div>
						</div>
						<h3 class="section-title">&nbsp;</h3>						
					</div>
				</div>
			</div>
	<!-- /container -->

	

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
								área restrita
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
?>
