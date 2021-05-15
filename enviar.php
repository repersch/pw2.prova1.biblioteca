<?php

$livros = [];

$arquivoLivros = "D:\ADS\ProgramaçãoWeb2\projetos\Prova\arquivo\Livros.JSON";

// verifica se o arquivo existe e o converte em array
if (file_exists($arquivoLivros)) {
    $livrosJSON = file_get_contents($arquivoLivros);
    $livros = json_decode($livrosJSON, true);
}
// print_r($livros);

// foreach ($livros as $livroIndice => $livro) {
//         echo "Índice: " . $livroIndice . "<br>" ;
//         echo "Código Livro: " . $livro['CodLivro'] . "<br>" ;
//         echo "Nome: " . $livro['NomeLivro'] . "<br><br>" ; 
// }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link href="css/estiloBiblioteca.css" rel="stylesheet" type="text/css"/> 
    <style>
        body {
            background-color: #81ecda;
            font-family: 'Lucida Sans'; 
        }
        h1 {
            text-align: center;
            font-size: 50px;
            font-style: italic;
        }   
        /* fieldset {
            display: inline-flexbox; 
            justify-content: space-between;
        }  */
        textarea, input, select {
            padding: 15px 25px 15px 25px;
            /* border-radius: 20px; */
            margin-top: 10px;
            font-weight: 700; 
        }
        input, select {
            width: 500px;
        }
        textarea {
            width: 450px;
            height: 150px;
        }
        div.textarea {
            float: right;
            padding: 2.5%;
            margin-right: 30px;
        }
        div.inputs {
            float: left;
            padding: 2%;
            margin-left: 30px;
        }
        legend {
            font-size: 25px;
        }
        table {
            width: auto;
            border-collapse: collapse;
            text-align: center;
            border-radius: 20px;
        }
        div.tableInfo {
            padding: 2%;
        }
        table, td, th {
            border: 1px solid black;
            padding: 15px 25px 15px 25px;  
        }  
    </style>
</head>
<body>
    <header><h1>BIBLIOTECA</h1></header>  

    <form name="inserirLivro" action="processar.php" method="GET">
    <fieldset>
            <legend>Inserir livro</legend>
            
            <!-- 4 IMPUTS -->
            <div class="inputs">
                <p>
                    Código <br><input type="text" name="txtCodLivro">
                </p>
                <p>
                    Nome <br><input type="text" name="txtNomeLivro">
                </p>
                <p>
                    Autor <br><input type="text" name="txtAutorLivro">
                </p>
                <p>
                    Número de páginas <br><input type="number" name="numPaginas">
                </p>

            </div>
            
            <!-- TEXTAREA -->
            <div class = "textarea">
                <p>
                    <!-- SELECT GENÊRO LIVRO -->
                    <select name="generoLivro"><option selected = "true" disabled>Gênero</option>
                        <option>Ficção</option>
                        <option>Bibliografia</option>
                        <option>Técnico</option>
                        <option>Romance</option>
                        <option>Terror</option>
                    </select>
                </p>
                <label for = "txtSinopse">Sinopse</label><br>
                <textarea name="txtSinopse"></textarea>
                <p>
                    <input type="submit" name="btnOperacao" value="Inserir" />
                </p>
            </div>

    </fieldset>
    </form>

    <fieldset>
        <legend>Livros</legend>
        <div class = "tableInfo" > 
            <table>
                <tr>
                    <th>Indíce</th>
                    <th>Código</th> 
                    <th>Nome</th>
                    <th>Autor</th> 
                    <th>Páginas</th>  
                    <th>Gênero</th>                 
                    <th>Sinopse</th>                 
                    <th>Alterar</th>                 
                    <th>Excluir</th>                 
                </tr> 
                <?php  foreach($livros as $indiceLivro => $livro) {  ?>
                <tr>
                    <td><?php echo $indiceLivro; ?></td>
                    <td><?php echo $livro["CodLivro"];    ?></td>
                    <td><?php echo $livro["NomeLivro"];   ?></td>
                    <td><?php echo $livro["AutorLivro"];  ?></td>
                    <td><?php echo $livro["NumPaginas"];  ?></td>
                    <td><?php echo $livro["GeneroLivro"]; ?></td>
                    <td><?php echo $livro["SinopseLivro"]; ?></td>
                    <td><a href='alterar.php?Indice=<?php  echo $indiceLivro; ?>'> <img src="Imagens/Editar.png" width="13px" height="13px">  </a>  </td>
                    <td><a href='71-JSON-Excluir.php?Indice=<?php  echo $indiceLivro; ?>'> <img src="Imagens/Excluir.png" width="13px" height="13px"> </a>  </td>
                </tr>  
                <?php    }    ?>
            </table>
        </div>
</body>
</html>