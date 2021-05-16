<?php

$livros = [];

$arquivoLivros = "D:\ADS\ProgramaçãoWeb2\projetos\Prova1\Prova\arquivo\Livros.JSON";

if (file_exists($arquivoLivros)) {
    $livrosJSON = file_get_contents($arquivoLivros);
    $livros = json_decode($livrosJSON, true);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link href="css/estiloBiblioteca.css" rel="stylesheet" type="text/css"> 
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
        textarea, input[type=text], input[type=submit], input[type=number], select {
            padding: 15px 25px 15px 25px;
            border-radius: 20px;
            margin-top: 10px;
            font-weight: 700; 
        }
        input[type=text], input[type=number], input[type=submit], select {
            width: 500px;
        }
        input[type=radio] {
            width: 50px;
        }
        textarea {
            width: 450px;
            height: 90px;
        }
        div.textarea {
            float: right;
            padding: 2%;
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
            
            <div class="textarea">
                <br>
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
                
                <!-- TEXTAREA -->
                <label for = "txtSinopse">Sinopse</label><br>
                <textarea name="txtSinopse"></textarea><br><br>

                <!-- RADIO BUTTON -->
                <label name="exemplarUnico">Exemplar único</label>
                <input type="radio" name="rdoExemplarUnico" value="Não" checked="checked"> Não
                <input type="radio" name="rdoExemplarUnico" value="Sim"> Sim 

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
                    <th>Único</th>                
                    <th>Sinopse</th>                 
                    <th>Alterar</th>                 
                    <th>Excluir</th>                 
                </tr> 
                <?php  foreach($livros as $indiceLivro => $livro) {  ?>
                <tr>
                    <td><?php echo $indiceLivro; ?></td>
                    <td><?php echo $livro["CodLivro"];      ?></td>
                    <td><?php echo $livro["NomeLivro"];     ?></td>
                    <td><?php echo $livro["AutorLivro"];    ?></td>
                    <td><?php echo $livro["NumPaginas"];    ?></td>
                    <td><?php echo $livro["GeneroLivro"];   ?></td>
                    <td><?php echo $livro["ExemplarUnico"]; ?></td>
                    <td><?php echo $livro["SinopseLivro"];  ?></td>
                    <td><a href='alterar.php?Indice=<?php  echo $indiceLivro; ?>'> <img src="Imagens/Editar.png" width="20px" height="20px">  </a>  </td>
                    <td><a href='excluir.php?Indice=<?php  echo $indiceLivro; ?>'> <img src="Imagens/Excluir.png" width="20px" height="20px"> </a>  </td>
                </tr>  
                <?php    }    ?>
            </table>
        </div>
</body>
</html>