<?php
session_start();
include "conexao.php";
if(isset($_POST["act"])){
    switch($_POST["act"]){
        case "cadastrar":
            $nome = $_POST["nome"];
            $caso = $_POST["caso"];
            $perc = $_POST["perc"];
            mysqli_query($conn,"insert into tb_fauna (nome,caso,perc) values ('$nome','$caso','$perc')");
            echo '
            <form name="atualiza" action="fauna.php" method="post">
					</form>
					<script>
						alert("CADASTRO REALIZADO COM SUCESSO!");
						document.atualiza.submit();
					</script>';
        break;
        case "excluir":
            $code = $_POST["code"];
            mysqli_query($conn,"delete from tb_fauna where code='$code'");
            echo '
            <form name="atualiza" action="fauna.php" method="post">
					</form>
					<script>
						alert("CADASTRO EXCLUIDO COM SUCESSO!");
						document.atualiza.submit();
					</script>';
        break;
        case "salvar":
            $code = $_POST["id"];
            $nome = $_POST["nome"];
            $caso = $_POST["caso"];
            $perc = $_POST["perc"];
            mysqli_query($conn,"update tb_fauna set nome='$nome',caso='$caso',perc='$perc' where code='$code'");
            echo '
            <form name="atualiza" action="fauna.php" method="post">
					</form>
					<script>
						alert("CADASTRO SALVO COM SUCESSO!");
						document.atualiza.submit();
					</script>';
        break;
    }
}

if(isset($_SESSION["nom"])){
    if($_SESSION["pri"]=='1'){        
        $body.='
        <!DOCTYPE html>
        <html>
            <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <link rel="icon" type="image/png" href="ecoroad.png" />
            <title>Cadastro de Fauna</title>
            </head>
            <body>
        ';

        if(isset($_POST["code"])){
            switch($_POST["act"]){
                case "editar": 
                $code=$_POST["code"];
                $sql=mysqli_query($conn,"select * from tb_fauna where code='$code'");
                while($l=mysqli_fetch_array($sql)){
                    $nome=$l["nome"];
                    $caso=$l["caso"];
                    $perc=$l["perc"];
                    $btn ='SALVAR';
                    $act ='salvar';           
                }
                break;
            }

        } else {
        $nome='';
        $caso='';
        $perc='';
        $btn ='CADASTRAR';
        $act ='cadastrar';
        $code='nulo';
        }


        $body.='
        	<div class="div" style="margin-top:10%; padding-bottom:5px;">
				<a href="index.php"><img src="ecoroad.png" class="img_center" title="RETORNAR A PAGINA PRINCIPAL
				"></a>
				<form name="feditar" action="fauna.php" method="post">
					<input type="hidden" id="cod" name="code">
					<input type="hidden" id="act" name="action">
				</form>
			</div>
			<form name="fatualiza" action="fauna.php" method="post">
			<fieldset style="margin-top:10px; padding-top:20px; padding-bottom:40px;">
			<legend id="b"> cadastro de fauna </legend>
			<div class="div">
				<p class="p" id="b">nome popular:</p>
                <input type="hidden" name="id" value="'.$code.'">
				<input name="nome" style="width:700px; left:150px;" value="'.$nome.'" autofocus>
			</div>
            <div class="div">
				<p class="p" id="b">número de casos:</p>
				<input name="caso" type="number" style="width:300px; left:150px;" value="'.$caso.'" autofocus>
			</div>
            <div class="div">
				<p class="p" id="b">porcentagem de casos:</p>
				<input name="perc" type="number" style="width:300px; left:150px;" value="'.$perc.'" autofocus>
			</div>
            <div class="div">
                <input type="hidden" name="act" value="'.$act.'">
                <button class="btn">'.$btn.'</button>
                </form>
            </div>';

        $sql=mysqli_query($conn,"select * from tb_fauna order by nome");
        if(mysqli_num_rows($sql)>0){
            $body.='<fieldset style="margin-top:50px; border:1px solid green; padding-top:10px; padding-bottom:10px; margin-bottom:40px;">
				<legend style="color:green;"><b> ESPÉCIE(S) CADASTRADA(S) NO SISTEMA </b> </legend>';
                $body.='
                <div class="div">				
                        <p class="p" style="width:200px"><b>ESPÉCIE</b></p>
                        <p class="p" style="width:200px; left:450px; text-align:center;"><b>NÚMERO DE CASO</b></p>
                        <p class="p" style="width:200px; left:650px; text-align:center;"><b>PORCENTAGEM</b></p>
                        <form name="fenvia" action="fauna.php" method="post">
                            <input type="hidden" id="idcode" name="code">
                            <input type="hidden" id="idact" name="act">
                        </form>
                </div>
                <hr>
                ';
                while($l=mysqli_fetch_array($sql)){
                    $i=$l["code"];
                    $body.='
                    <script>
                        function excluir'.$i.'(){
                            document.getElementById("idact").value="excluir";
                            document.getElementById("idcode").value="'.$i.'";
                            document.fenvia.submit();
                            }
                        function editar'.$i.'(){
                            document.getElementById("idact").value="editar";
                            document.getElementById("idcode").value="'.$i.'";
                            document.fenvia.submit();
                            }
                    </script>
                        <div class="div">				
                        <p class="p" style="width:200px">'.$l["nome"].'</p>
                        <p class="p" style="width:200px; left:450px; text-align:center;">'.$l["caso"].'</p>
                        <p class="p" style="width:200px; left:650px; text-align:center;">'.$l["perc"].'%</p>
                        <img class="search" src="lancamentos.png" style="right:35px" title="EDITAR DADOS DA ESPÉCIA '.$li["nome"].'" onclick="editar'.$i.'()">
                        <img class="search" src="reject.png" title="EXCLUIR A ESPÉCIE '.$li["nome"].'" onclick="excluir'.$i.'()">
                    </div>';
                }
            $body.='</fieldset>';
        }

        $body.='
            </body>
        </html>
        ';
        echo $body;
    } else {
        echo '
            <script>
                location.href="index.php";
            </script>
        ';
    }
} else {
    echo '
    <script>
        location.href="index.php";
    </script>
    ';
}
?>