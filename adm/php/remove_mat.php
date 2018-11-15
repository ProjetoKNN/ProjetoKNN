<?php 
    //recebe o id dos dados que serão apagados
    $Aluno = filter_input(INPUT_POST, 'Aluno');

    //estabelece a conexão
    include("../../conexao.php");
    if(!$conexao){
        echo "Ops.. Erro na conexão.";
        exit;
    }
    //Executa a query
    $sql = "DELETE FROM matricula WHERE aluno_cod=".$Aluno;
    $remove = mysqli_query($conexao, $sql);
    //Se falhou, redireciona pra exibe.php com remove igual a false 
    if(!$remove){
        header("Location:../buscar_mat.php?remove=false");
        exit;
    }
    //se tudo deu certo, redireciona pra exibe.php com remove igual a true
    header("Location:../buscar_mat.php?remocao=true");
?>
