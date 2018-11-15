<?php 
    include("../../conexao.php");
    //Recebe os dados com as alterações feitas
    $cod = filter_input(INPUT_POST, 'cod');
    $novoNome = filter_input(INPUT_POST, 'nome');
    $novoCpf = filter_input(INPUT_POST, 'cpf');
    $novoRg = filter_input(INPUT_POST, 'rg');
    $novoEmail = filter_input(INPUT_POST, 'email');
    $novoTel = filter_input(INPUT_POST, 'telefone');
    $novaRua = filter_input(INPUT_POST, 'rua');
    $novoNmr = filter_input(INPUT_POST, 'nmr');
    $novoBairro = filter_input(INPUT_POST, 'bairro');
    $novaCidade = filter_input(INPUT_POST, 'cidade');
    $novoEstado = filter_input(INPUT_POST, 'estado');

    //Estabelece a conexão com o mysql

   
    if(!$conexao){
        header("Location:../buscar_prof.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE professor SET nome='".$novoNome. "', cpf='" . $novoCpf . "', rg='".$novoRg."', email='".$novoEmail."',telefone='".$novoTel. "',rua='".$novaRua."',numero='".$novoNmr."', bairro='".$novoBairro."', cidade='".$novaCidade."', estado='".$novoEstado."' WHERE cod='".$cod."'";
    $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra exibe.php com alteracao igual a false
    if(!$update){
        header("Location:../buscar_prof.php?alteracao=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:../buscar_prof.php?alteracao=true");
?>