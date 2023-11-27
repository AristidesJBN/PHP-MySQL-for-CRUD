<h1>Listar Usuários</h1>
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
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->idusuario."</td>";
            print "<td>".$row->nm_usuario."</td>";
            print "<td>".$row->email."</td>";
            $data_banco =  $row->dt_nascimento;
            $formata_data = date("d/m/Y", strtotime($data_banco));
            print "<td>".$formata_data."</td>";
            print "</tr>";

        }
        print "</table>";

    }else{
        print "<p class='alert alert-danger'>Não existe registro de usuários no momento</p>";
    }
?>