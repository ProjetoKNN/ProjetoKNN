<?php 
    include("../../conexao.php");
    //Recebe os dados com as alterações feitas
    $cod = filter_input(INPUT_POST, 'cod');
    $NovoNome = filter_input(INPUT_POST, 'nome');
    $NovoProf = filter_input(INPUT_POST, 'prof');
    $NovaQtd = filter_input(INPUT_POST, 'qtd');
    $NovoCurso = filter_input(INPUT_POST, 'codCurso');

    if(!$conexao){
        header("Location:../buscar_turm.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE turma SET nome='".$NovoNome."', codProf='".$NovoProf. "', qtd='".$NovaQtd."', curso_cod='".$NovoCurso."' WHERE cod='".$cod."'";
    $update = mysqli_query($conexao, $sql);


    //Se não deu certo, redireciona pra buscar_turm com alteracao igual a false
    if(!$update){
        header("Location:../buscar_turm.php?alteracao=false");
        exit;
    }else{
    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
        header("Location:../buscar_turm.php?alteracao=true");
    }
?>