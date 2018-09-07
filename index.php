<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TESTE DISYS</title>
</head>
<body>
    <form method="post" action="cadastrar.php">
        <?php
            include 'connection.php';

            $get_nome = "";
            $get_email = "";
            $get_senha = "";
            $get_id = "0";
            $query = "SELECT usuarios.id, usuarios.nome, usuarios.email, usuarios.senha FROM `usuarios` ";
            if (isset($_GET["id"])) {
                $get_id = $_GET["id"];
                $result_item = $objDB->query($query . "WHERE usuarios.id = " . $get_id);
                while ($get = $result_item->fetch_assoc()) {
                    $get_nome = $get["nome"];
                    $get_email = $get["email"];
                    $get_senha = $get["senha"];
                }
            }
        ?>
        <div>
            Nome: <input type="text" id="nome" name="nome" placeholder="Nome" maxlength="100" value="<?php echo $get_nome; ?>" />
            <br /> e-mail: <input type="email" id="email" name="email" placeholder="e-mail" maxlength="200" value="<?php echo $get_email; ?>" />
            <br /> Senha: <input type="password" id="senha" name="senha" placeholder="Senha" maxlength="20" value="<?php echo $get_senha; ?>" />
            <br /> <button type="submit">Salvar</button>
            <input type="hidden" id="id" name="id" value="<?php echo $get_id; ?>"/>
        </div>
        <br /><br />
        <table style="width:500px" border="1" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td style="width:35%;">Nome</td>
                    <td style="width:35%;">e-mail</td>
                    <td style="width:20%;">Senha</td>
                    <td style="width:5%;"></td>
                    <td style="width:5%;"></td>
                </tr>
            </thead>
            <?php
	            $resultado = $objDB->query($query);
                $linha = "";
                while ($item = $resultado->fetch_assoc()) {
                    $linha .= "<tr>";
                    $linha .= "<td>".$item["nome"]."</td>";
                    $linha .= "<td>".$item["email"]."</td>";
                    $linha .= "<td>".$item["senha"]."</td>";
                    $linha .= "<td><a href='index.php?id=" .$item["id"] . "'>Editar</a></td>";
                    $linha .= "<td><a href='excluir.php?id=" .$item["id"] . "'>Excluir</a></td>";
                    $linha .= "</tr>";
                }
                echo ($linha === "") ? "" : "<tbody>" . $linha . "</tbody>";
            ?>
        </table>
    </form>
</body>
</html>