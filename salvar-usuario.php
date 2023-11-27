<?php 
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $dt_nascimento = $_POST["dt_nascimento"];

            $sql = "INSERT INTO usuario (nm_usuario, email, senha, dt_nascimento) VALUES (
                '{$nome}', '{$email}', '{$senha}', '{$dt_nascimento}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com sucesso!')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar')</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;

        case 'editar':
            # code...
            break;

        case 'excluir':
            # code...
            break;

    }
?>