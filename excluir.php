<?php

$operacao = "";
$codLivro = "";
$nomeLivro = "";
$autorLivro = "";
$numPaginas = 0;
$generoLivro = "";
$sinopseLivro = "";
$exemplarUnico = "Não";
$indiceLivro = 0;

// recupera o índice
if (isset($_GET["Indice"])) {
    if (!empty($_GET["Indice"])) {
        $indiceLivro = $_GET["Indice"];
    }
}

$arquivoLivros = "D:\ADS\ProgramaçãoWeb2\projetos\Prova1\Prova\arquivo\Livros.JSON";

// recupera dados do arquivo
if (file_exists($arquivoLivros)) { 
    $livrosJSON = file_get_contents($arquivoLivros);
    $livros = json_decode($livrosJSON, true );
} else {
    die("O arquivo não existe: $arquivoLivros");
}

// recupera dados do indice solicitado
$codLivro = $livros[$indiceLivro]["CodLivro"];
$nomeLivro = $livros[$indiceLivro]["NomeLivro"];
$autorLivro = $livros[$indiceLivro]["AutorLivro"];
$numPaginas = $livros[$indiceLivro]["NumPaginas"];
$generoLivro = $livros[$indiceLivro]["GeneroLivro"];
$sinopseLivro = $livros[$indiceLivro]["SinopseLivro"];

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
        textarea, input, select {
            padding: 15px 25px 15px 25px;
            margin-top: 10px;
            font-weight: 700; 
        }
        input, select {
            width: 500px;
        }
        textarea {
            width: 450px;
            height: 250px;
        }
        div.textarea {
            float: right;
            padding: 3%;
            margin-right: 30px;
            margin-top: 20px;
        }
        div.inputs {
            float: left;
            padding: 2%;
            margin-left: 30px;
        }
        legend {
            font-size: 25px;
        }
        input.botao {
            width: 250px;
        }
    </style>
</head>
<body>
    <form name="inserirLivro" action="processar.php" method="GET">
    <fieldset>
            <legend>Excluir livro</legend>
            
            <div class="inputs">
                <p>
                    Indice <br><input type="text" name="indice" readonly value="<?php echo $indiceLivro  ?>">
                </p>
                <p>
                    Código <br><input type="text" name="txtCodLivro" value="<?php  echo $codLivro  ?>">
                </p>
                <p>
                    Nome <br><input type="text" name="txtNomeLivro" value="<?php  echo $nomeLivro  ?>">
                </p>
                <p>
                    Autor <br><input type="text" name="txtAutorLivro" value="<?php  echo $autorLivro  ?>">
                </p>
                <p>
                    Número de páginas <br><input type="number" name="numPaginas" value="<?php  echo $numPaginas  ?>">
                </p>
            </div>
            
            <div class = "textarea">
                <p>
                    <!-- SELECT GENÊRO LIVRO -->
                    <select name="generoLivro"><option disabled>Gênero</option>
                    <option selected = "true"><?php  echo $generoLivro  ?></option>
                    <option>Ficção</option>
                    <option>Bibliografia</option>
                    <option>Técnico</option>
                    <option>Romance</option>
                    <option>Terror</option>
                    </select>
                </p>
                <label for = "txtSinopse">Sinopse</label><br>
                <textarea name="txtSinopse"><?php  echo $sinopseLivro  ?></textarea>
                <h2>Deseja realmente excluir os dados?</h2>
                <p>
                    <input type="submit" class="botao" name="btnOperacao" value="Excluir" />
                    <input type="submit" class="botao" name="btnOperacao" value="Cancelar" />
                </p>
            </div>
    </fieldset>
    </form>
</body>
</html>
