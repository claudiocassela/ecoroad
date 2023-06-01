<?php
//verificar erro na destruição de sesions
session_start();
$body= '
    <script>
        if(confirm("DESEJA REALMENTE SAIR?")){
                '.session_unset().';
                '.session_destroy().';
                location.href="index.php";
						} else {
							alert("OPERAÇÃO CANCELADA DO SUCESSO!");
                            location.href="index.php";
						}
    </script>
';
echo $body;
?>