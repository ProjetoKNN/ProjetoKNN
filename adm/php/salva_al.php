<?php 
    include("../../conexao.php");
    //Recebe os dados com as alterações feitas
    $cod = filter_input(INPUT_POST, 'cod');
    $NovoNome = filter_input(INPUT_POST, 'nome');
    $NovoCpf = filter_input(INPUT_POST, 'cpf');
    $NovoRg = filter_input(INPUT_POST, 'rg');
    $NovaDataNasc = filter_input(INPUT_POST, 'datanasc');
    $NovoContato = filter_input(INPUT_POST, 'contato');
    $NovaRua = filter_input(INPUT_POST, 'rua');
    $NovoNmr = filter_input(INPUT_POST, 'nmr');
    $NovoBairro = filter_input(INPUT_POST, 'bairro');
    $NovaCidade = filter_input(INPUT_POST, 'cidade');
    $NovoEstado = filter_input(INPUT_POST, 'estado');
    $NovoNomeResp = filter_input(INPUT_POST, 'responsavel');
    $NovaAlergAlimentar = filter_input(INPUT_POST, 'alergiaalimentar');
    $NovaAlergia = filter_input(INPUT_POST, 'alergia');
    $NovoRemedio = filter_input(INPUT_POST, 'remedio');
    $NovoCep = filter_input(INPUT_POST, 'cep');
    $NovoEmail = filter_input(INPUT_POST, 'email');

    //Estabelece a conexão com o mysql

    if(!$conexao){
        header("Location:../buscar_al.php?alteracao=false");
        exit;
    }
    //Executa a atualização no banco de dados
    $sql = "UPDATE aluno SET nome='" . $NovoNome . "', cpf='" . $NovoCpf . "', rg='".$NovoRg."', datanascimento='".$NovaDataNasc."',telefonealuno='".$NovoContato. "',rua='".$NovaRua."',numero='".$NovoNmr."', bairro='".$NovoBairro."', cidade='".$NovaCidade."', estado='".$NovoEstado."', cep='".$NovoCep."', email='".$NovoEmail."', alergiaalimentar='".$NovaAlergAlimentar."', remedio='".$NovoRemedio."', alergia='".$NovaAlergia."' WHERE cod='".$cod."'";
    $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra buscar_al.php com alteracao igual a false
    if(!$update){
        header("Location:../buscar_al.php?alteracao=false");
        exit;
    }else{
    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:../buscar_al.php?alteracao=true");
    }
?>