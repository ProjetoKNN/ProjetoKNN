<html>
<head>
    <title>Editar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
</head>
    <body class="BuscarAL">
        <nav class="navbar navbar-expand-lg bg-danger navbar-dark ">
                    <div class="container">
                        <a class="navbar-brand" id="bv">Bem-vindo, Administrador</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSite">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                                        Controles
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="buscar_al.php">Controle de alunos</a>
                                        <a class="dropdown-item" href="buscar_prof.php">Controle de professores</a>
                                        <a class="dropdown-item" href="buscar_turm.php">Controle de turmas</a>
                                        <a class="dropdown-item" href="buscar_curso.php">Controle de cursos</a>
                                        <a class="dropdown-item" href="buscar_mat.php">Controle de matrículas</a>
                                    </div>
                                </li>
                            </ul>   
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="adm_func.php" class="nav-link" name="voltar">Voltar</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
        <?php 
            //Recebe os dados a serem editados
            $cod = filter_input(INPUT_POST, 'cod');
            $nome = filter_input(INPUT_POST, 'nome');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $rg = filter_input(INPUT_POST, 'rg');
            $datanasc = filter_input(INPUT_POST, 'datanasc');
            //$datamat = filter_input(INPUT_POST, 'datamat');
            $rua = filter_input(INPUT_POST, 'rua');
            $nmr = filter_input(INPUT_POST, 'nmr');
            $contato = filter_input(INPUT_POST, 'contatoaluno');
            $bairro = filter_input(INPUT_POST, 'bairro');
            $nomeresponsavel = filter_input(INPUT_POST, 'nomeresponsavel');
            $telefoneresponsavel = filter_input(INPUT_POST, 'telefoneresponsavel');
            $cidade = filter_input(INPUT_POST, 'cidade');
            $estado = filter_input(INPUT_POST, 'estado');
            $email = filter_input(INPUT_POST, 'email');
            $alergiaalimentar = filter_input(INPUT_POST, 'alergiaalimentar'); 
            $remedio = filter_input(INPUT_POST, 'remedio');
            $alergia = filter_input(INPUT_POST, 'alergia');
            $cep = filter_input(INPUT_POST, 'cep');
        ?>
        <div class="container" id="divBusca">
        <h3 id="h1Busca">Alteração de dados</h3>
        <form action="php/salva_al.php" method="post">
            <!-- Jogamos os valores a serem editados dentro dos inputs no campo value -->
            Código: <input type="text" name="cod" readonly="readonly" class="form-control" value="<?php echo $cod; ?>"><br>
            Nome:<input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>"><br>
            CPF:<input type="text" name="cpf" maxlength="14" class="form-control" OnKeyPress="formatar('###.###.###-##', this)" value="<?php echo $cpf; ?>"><br>
            RG:<input type="text" name="rg" maxlength="10" class="form-control" OnKeyPress="formatar('##.###.###', this)" value="<?php echo $rg; ?>"><br>
            Data de Nascimento:<input type="date" name="datanasc" class="form-control" value="<?php echo $datanasc; ?>"><br>
            Telefone:<input type="text" name="contato"  maxlength="13" class="form-control" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)" value="<?php echo $contato; ?>"><br>
            E-mail:<input type="text" name="email" class="form-control" value="<?php echo $email; ?>"><br>
            Rua:<input type="text" name="rua" class="form-control" value="<?php echo $rua; ?>"><br>
            Número:<input type="text" name="nmr" class="form-control" value="<?php echo $nmr; ?>"><br>
            Bairro:<input type="text" name="bairro" class="form-control" value="<?php echo $bairro; ?>"><br>
            Cidade:<input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>"><br>
            Estado:<input type="text" name="estado" class="form-control" maxlength="2" value="<?php echo $estado; ?>"><br>
            CEP:<input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>"><br>
            Alergia Alimentar:<input type="text" class="form-control" name="alergiaalimentar" value="<?php echo $alergiaalimentar; ?>"><br>
            Remédio:<input type="text" name="remedio" class="form-control" value="<?php echo $remedio; ?>"><br>
            Alergia:<input type="text" name="alergia" class="form-control" value="<?php echo $alergia; ?>"><br>
            Nome do responsável:<input type="text" class="form-control" name="nomeresponsavel" value="<?php echo $nomeresponsavel; ?>"><br>
            Telefone do responsável:<input type="text" class="form-control" name="telefoneresponsavel" maxlength="13" placeholder="xx-xxxxx-xxxx" OnKeyPress="formatar('##-#####-####', this)"  value="<?php echo $telefoneresponsavel; ?>"><br>
            <input type="submit" class="btn btn-danger" style="width: 100%;" value="Salvar alterações"><hr>
        </form>
    </div>
    <script src="../jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/popper.js"></script>
    <script src="../js/bootstrap.js"></script>     
    </body>
</html>