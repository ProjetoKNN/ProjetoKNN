<?php 
    include("../../conexao.php");
    //Recebe os dados com as alterações feitas
    $NovaTurma = filter_input(INPUT_POST, 'turma');
    $NovoCurso = filter_input(INPUT_POST, 'curso');
    $codAluno = filter_input(INPUT_POST, 'Alunoo');

    if(!$conexao){
        header("Location:../buscar_mat.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE matricula SET turma_cod='".$NovaTurma."' WHERE aluno_cod='".$codAluno."'";
    $update = mysqli_query($conexao, $sql);
    //Se não deu certo, redireciona pra buscar_turm com alteracao igual a false
    if(!$update){
        header("Location:../buscar_mat.php?alteracao=false");
        exit;
    }else{
    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
        header("Location:../buscar_mat.php?alteracao=true");
    }
?>