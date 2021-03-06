<?php

$operacao = "";
$codLivro = "";
$nomeLivro = "";
$autorLivro = "";
$numPaginas = 0;
$generoLivro = "";
$exemplarUnico = "Não";
$sinopseLivro = "";
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
$exemplarUnico = $livros[$indiceLivro]["ExemplarUnico"];
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
            <legend>Alterar livro</legend>
            
            <!-- 4 IMPUTS -->
            <div class="inputs">
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
            
            <!-- TEXTAREA -->
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
                <textarea name="txtSinopse"><?php  echo $sinopseLivro  ?></textarea><br><br>

                <label name="exemplarUnico">Exemplar único</label>
                <?php if ($exemplarUnico == "Não") {
                    echo '<input type="radio" name="rdoExemplarUnico" value="Não" checked="checked"> Não';
                    echo '<input type="radio" name="rdoExemplarUnico" value="Sim"> Sim ';
                } else {
                    echo '<input type="radio" name="rdoExemplarUnico" value="Não" > Não';
                    echo '<input type="radio" name="rdoExemplarUnico" value="Sim" checked="checked"> Sim ';
                }
                ?>

                <p>
                    <input type="submit" class="botao" name="btnOperacao" value="Alterar" />
                    <input type="submit" class="botao" name="btnOperacao" value="Cancelar" />
                </p>
            </div>
    </fieldset>
    </form>
</body>
</html>
