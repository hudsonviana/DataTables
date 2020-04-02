<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listar_usuario').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "proc_pesq_usuario.php",
                    "type": "POST"
                }
            });
        });
    </script>
    <title>Listagem</title>
</head>
<body>
    <h1>Listar Usuários</h1>

    <table id="listar_usuario" class="display" style="width:100%">
    
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Profissão</th>
                <th>Nascimento</th>
                <th>Sexo</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Nacionalidade</th>
            </tr>
        </thead>

    </table>
</body>
</html>