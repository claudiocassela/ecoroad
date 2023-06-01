<?php
include "conexao.php";
session_start();

if(isset($_POST["action"])){
	$action=$_POST["action"];;
	switch($action){
		case "novo":
			$nome=$_POST["nome"];
			$ende=$_POST["ende"];
			$fone=$_POST["fone"];
			$emai=$_POST["emai"];
			$sen1=$_POST["sen1"];
			$sen2=$_POST["sen2"];
			$usua=$_POST["usua"];
			$priv=$_POST["priv"];
			$botao="CADASTRAR";
			if($sen1==$sen2){
				mysqli_query($conn,"insert into tab_user (nome,ende,fone,emai,pass,usua,priv) values ('$nome','$ende','$fone','$emai','$sen1','$usua','$priv')");

				echo '
					<form name="atualiza" action="principal.php" method="post">
					</form>
					<script>
						alert("CADASTRO REALIZADO COM SUCESSO!");
						document.atualiza.submit();
					</script>
				';
				echo "insert into tab_user (nome,ende,fone,emai,pass,usua,priv) values ('$nome','$ende','$fone','$emai','$sen1','$usua','$priv')";
			} else {
				echo '
					<form name="atualiza" action="principal.php" method="post">
					</form>
					<script>
						alert("SENHAS NÃO CONFEREM!");
						document.atualiza.submit();
					</script>
				';
			}
		break;
		case "editar":
			$id=$_POST["code"];
			$botao="SALVAR";
			$action="salvar";
			$sql=mysqli_query($conn,"select * from tab_user where code='$id'");
			while($l=mysqli_fetch_array($sql)){
			$nome=$l["nome"];
			$ende=$l["ende"];
			$fone=$l["fone"];
			$emai=$l["emai"];
			$sen1=$l["pass"];
			$sen2=$l["pass"];
			$usua=$l["usua"];
			$code=$l["code"];
			switch($l["priv"]){
				case 0: 
					$priv='
						<option value="0">USUÁRIO</option>
					';
				break;
				case 1: 
					$priv='
						<option value="1">ADMINISTRADOR</option>
						<option value="0">USUÁRIO</option>						
					';				
				break;
				defaul: 
					$priv='
						<option value="0">USUÁRIO</option>
					';				
				break;
			}
			}
		break;
		case "salvar":
			$id=$_POST["code"];
			$nome=$_POST["nome"];
			$ende=$_POST["ende"];
			$fone=$_POST["fone"];
			$emai=$_POST["emai"];
			$sen1=$_POST["sen1"];
			$sen2=$_POST["sen2"];
			$usua=$_POST["usua"];
			$priv=$_POST["priv"];
			if($sen1==$sen2){
				mysqli_query($conn,"update tab_user set nome='$nome',ende='$ende',fone='$fone',emai='$emai',pass='$sen1',usua='$usua',priv='$priv' where code='$id'");

            if($_SESSION["pri"]=='1'){
				echo '
					<form name="atualiza" action="principal.php" method="post">
					</form>
					<script>
						alert("CADASTRO EDITADO COM SUCESSO!");
						document.atualiza.submit();
					</script>
				';} else {
                  echo '
					<form name="atualiza" action="index.php" method="post">
					</form>
					<script>
						alert("CADASTRO EDITADO COM SUCESSO!");
						document.atualiza.submit();
					</script>
				';  
                }
			} else {
				echo '
					<form name="atualiza" action="principal.php" method="post">
					</form>
					<script>
						alert("SENHAS NÃO CONFEREM!");
						document.atualiza.submit();
					</script>
				';
			}			
		break;
		case "excluir":
			$id=$_POST["code"];
			mysqli_query($conn,"delete from tab_user where code='$id'");
			echo '
					<form name="atualiza" action="principal.php" method="post">
					</form>
					<script>
						alert("REGISTRO EXCLUIDO COM SUCESSO!");
						document.atualiza.submit();
					</script>
				';
		break;
	}
} else {
	$action="novo";
	$nome="";
	$ende="";
	$fone="";
	$emai="";
	$sen1="";
	$sen2="";
	$usua="";
	$code="";
	$botao="CADASTRAR";
	$priv='
		<option value="0">USUÁRIO</option>
		<option value="1">ADMINISTRADOR</option>
	';
}


	$body='
	<!DOCTYPE html>
	<html>
		<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="ecoroad.png" />
		<title>EcoRoad</title>
		</head>
		<body>
		';
		
if(isset($_SESSION["log"])){
		
	$body.='
			<div class="div" style="margin-top:10%; padding-bottom:5px;">
				<a href="index.php"><img src="ecoroad.png" class="img_center" title="RETORNAR A PAGINA PRINCIPAL"></a>
				<form name="feditar" action="principal.php" method="post">
					<input type="hidden" id="cod" name="code">
					<input type="hidden" id="act" name="action">
				</form>
			</div>
			<form name="fatualiza" action="principal.php" method="post">
			<fieldset style="margin-top:10px; padding-top:20px; padding-bottom:40px;">
			<legend id="b"> cadastro de usuários </legend>
			<div class="div">
				<p class="p" id="b">privilégio:</p>
				<select name="priv">
					'.$priv.'
				</select>
				<input type="hidden" name="action" value="'.$action.'">
				<input type="hidden" name="code" value="'.$code.'">
			</div>
			<div class="div">
				<p class="p" id="b">nome completo:</p>
				<input name="nome" style="width:700px;" value="'.$nome.'" autofocus>
			</div>
			<div class="div">
				<p class="p" id="b">endereço:</p>
				<input name="ende" style="width:700px;" value="'.$ende.'">
			</div>
			<div class="div">
				<p class="p" id="b">telefone(s):</p>
				<input name="fone" style="width:700px;" value="'.$fone.'">
			</div>
			<div class="div">
				<p class="p" id="b">email:</p>
				<input name="emai" type="email" style="width:700px;" value="'.$emai.'">
			</div>
			<div class="div">
				<p class="p" id="b">usuário:</p>
				<input name="usua" value="'.$usua.'">
			</div>
			<div class="div">
				<p class="p" id="b">senha:</p>
				<input name="sen1" type="password" value="'.$sen1.'">
				<p class="p" style="left:500px" id="b">re-senha:</p>
				<input style="left:500px;" type="password" name="sen2" value="'.$sen2.'">
			</div>
			<div class="div" style="height:50px;">
				<button class="btn"> '.$botao.' </button>
			</div>
			<form>
			</fieldset>';

if($_SESSION["pri"]=="1"){
	$sql=mysqli_query($conn,"select * from tab_user order by nome");
	if(mysqli_num_rows($sql)>0){
		$body.='
			<fieldset style="margin-top:20px; border:1px solid green; padding-top:10px; padding-bottom:10px; margin-bottom:40px;">
				<legend style="color:green;"><b> USUÁRIO(S) CADASTRADO(S) NO SISTEMA </b> </legend>
		';
		$i=0;
		while($li=mysqli_fetch_array($sql)){
			$i++;
			switch($li["priv"]){
				case 0: $pv="USUÁRIO"; break;
				case 1: $pv="ADMINISTRADOR"; break;
				default: $pv="USUÁRIO"; break;
			}
			$body.='
				<script>
					function editar'.$i.'(){
						document.getElementById("act").value="editar";
						document.getElementById("cod").value="'.$li["code"].'";
						document.feditar.submit();
					}
					function excluir'.$i.'(){
						if(confirm("DESEJA REALMENTE EXCLUIR ESTE USUÁRIO?")){
							document.getElementById("act").value="excluir";
							document.getElementById("cod").value="'.$li["code"].'";
							document.feditar.submit();
						} else {
							alert("OPERAÇÃO CANCELADA DO SUCESSO!");
						}
					}
				</script>
				<div class="div">				
					<p class="p"><b>'.$pv.'</b> - ('.$li["usua"].')'.$li["nome"].'</p>
					<img class="search" src="lancamentos.png" style="right:35px" title="EDITAR DADOS DO USUÁRIO '.$li["nome"].'" onclick="editar'.$i.'()">
					<img class="search" src="reject.png" title="EXCLUIR O USUÁRIO '.$li["nome"].'" onclick="excluir'.$i.'()">
				</div>
			';
		}
		
		$body.='
			</fieldset>
		';
	}

}
} else {
	if(isset($_POST["log"])){
		$n=$_POST["log"];
		$s=$_POST["pas"];	
        $no="ADMINISTRADOR UNIVESP";
        $pv="1";
        $co="0";
        $u='21232f297a57a5a743894a0e4a801fc3';
		$p='4597a8376cbc091571510b8032c79bda';	

        $sql=mysqli_query($conn,"select code,priv,nome,stat from tab_user where usua='$n' and pass='$s'");
        if(mysqli_num_rows($sql)>0){
            $u='21232f297a57a5a743894a0e4a801fc3';
		    $p='4597a8376cbc091571510b8032c79bda';
            $n='21232f297a57a5a743894a0e4a801fc3';
		    $s='4597a8376cbc091571510b8032c79bda';
            while($li=mysqli_fetch_array($sql)){
                $no=$li["nome"];
                $st=$li["stat"];
                $pv=$li["priv"];
                $co=$li["code"];
            }
        } else {
           $n=md5($_POST["log"]);
		   $s=md5($_POST["pas"]); 
        }		
        
		
		if(($n==$u) and ($s==$p)){
			$_SESSION["log"]=$_POST["log"];
            $_SESSION["nom"]=$no;
            $_SESSION["pri"]=$pv;
            $_SESSION["cod"]=$co;
            if($priv=='1'){
			echo '
			<script>
				alert("SEJA BEM VINDO(A)! '.$no.'");
				location.href="principal.php";
			</script>
			';} else {
             echo '
			<script>
				alert("SEJA BEM VINDO(A)! '.$no.'");
				location.href="index.php";
			</script>
			';   
            }
		} else {
			echo '
			<script>
				alert("USUARIO OU SENHA ERRADO(A)!");
				location.href="principal.php";
			</script>
			';
		}
	} else {

    if(isset($_GET["new"])){
        $body.='
			<div class="div" style="margin-top:10%; padding-bottom:5px;">
				<a href="index.php"><img src="ecoroad.png" class="img_center" title="RETORNAR A PAGINA PRINCIPAL"></a>
				<form name="feditar" action="principal.php" method="post">
					<input type="hidden" id="cod" name="code">
					<input type="hidden" id="act" name="action">
				</form>
			</div>
			<form name="fatualiza" action="principal.php" method="post">
			<fieldset style="margin-top:10px; padding-top:20px; padding-bottom:40px;">
			<legend id="b"> cadastro de usuários </legend>
			<div class="div">
				<p class="p" id="b">privilégio:</p>
				<select name="priv">
					<option value="0">USUÁRIO</option>
				</select>
				<input type="hidden" name="action" value="'.$action.'">
				<input type="hidden" name="code" value="'.$code.'">
			</div>
			<div class="div">
				<p class="p" id="b">nome completo:</p>
				<input name="nome" style="width:700px;" value="'.$nome.'" autofocus>
			</div>
			<div class="div">
				<p class="p" id="b">endereço:</p>
				<input name="ende" style="width:700px;" value="'.$ende.'">
			</div>
			<div class="div">
				<p class="p" id="b">telefone(s):</p>
				<input name="fone" style="width:700px;" value="'.$fone.'">
			</div>
			<div class="div">
				<p class="p" id="b">email:</p>
				<input name="emai" type="email" style="width:700px;" value="'.$emai.'">
			</div>
			<div class="div">
				<p class="p" id="b">usuário:</p>
				<input name="usua" value="'.$usua.'">
			</div>
			<div class="div">
				<p class="p" id="b">senha:</p>
				<input name="sen1" type="password" value="'.$sen1.'">
				<p class="p" style="left:500px" id="b">re-senha:</p>
				<input style="left:500px;" type="password" name="sen2" value="'.$sen2.'">
			</div>
			<div class="div" style="height:50px;">
				<button class="btn"> '.$botao.' </button>
			</div>
			<form>
			</fieldset>
        ';
    } else {
	$body.='
		<script>
			function envialog(){
				document.FenviaLog.submit();
			}
			function login(){
				location.href="index.php";
			}
		</script>
		<img id="link" src="ecoroad.png" style="z-index:300; position:absolute; left:28%; top:0; margin-top:-17%" onclick="login()">
		<form name="FenviaLog" action="principal.php" method="post">
		<div class="div" style="margin-top:20%; border:2px solid green; width:45%; height:220px; border-radius:4px 4px 4px 4px;">
			<p class="p" style="margin-top:55px"><b>login:<b></p>
			<input style="margin-top:50px;" name="log">
			<p class="p" style="margin-top:95px"><b>password:<b></p>
			<input style="margin-top:90px;" type="password" name="pas">
			<button class="btn" style="left:45%; margin-top:130px; width:200px" onclick="envialog()">VERIFICAR</button>
			</form>
		</div>
	';
    }

	}
}	
	
			
	$body.='
		</body>
	</html>
	';
	echo $body;
?>