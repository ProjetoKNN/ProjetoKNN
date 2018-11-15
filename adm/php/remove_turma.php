<?php 
    //recebe o id dos dados que serão apagados
    $cod = filter_input(INPUT_POST, 'cod');

    //estabelece a conexão
    include("../../conexao.php");
    if(!$conexao){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query
    $sql = "DELETE FROM turma WHERE cod=".$cod;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if(!$remove){
        header("Location:../buscar_turm.php?remove=false");
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    header("Location:../buscar_turm.php?remocao=true");
?>
