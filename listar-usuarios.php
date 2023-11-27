<h1>Listar Usuários</h1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezCZ/Rz0TZHQlmLCO8Rr7qT+IAqAxFn4Dm/EePPnpd2WrG8JvG70OKZKZfwwQPyC" crossorigin="anonymous">

<?php 
    $sql = "SELECT * FROM usuario";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0){
        print "<table class='table'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>E-mail</th>";
            print "<th>Data de nascimento</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idusuario."</td>";
            print "<td>".$row->nm_usuario."</td>";
            print "<td>".$row->email."</td>";
            $data_banco =  $row->dt_nascimento;
            $formata_data = date("d/m/Y", strtotime($data_banco));
            print "<td>".$formata_data."</td>";
                print "<td>
                <button onclick=\"
                location.href='?page=editar&idusuario=".$row->idusuario."';
                \" class='btn btn-success'>Editar</button>

                <button onclick=\"
                if(confirm('Tem certeza que deseja excluir?')){
                    location.href='?page=salvar&acao=excluir&idusuario=".$row->idusuario."';
                }else{
                    false;
                }
                \" class='btn btn-danger'>Excluir</button>
                </td>";
            print "</tr>";

        }
        print "</table>";

    }else{
        print "<p class='alert alert-danger'>Não existe registro de usuários no momento</p>";
    }
?>