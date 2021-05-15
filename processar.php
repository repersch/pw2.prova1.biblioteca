<?php

$operacao = "";
$codLivro = "";
$nomeLivro = "";
$autorLivro = "";
$numPaginas = 0;
$generoLivro = "";
$sinopseLivro = "";
$indiceLivro = 0;

//-----------------------------------------------------------
//                   RECUPERA OS DADOS
//-----------------------------------------------------------

if (isset($_GET["btnOperacao"])) {
    if (!empty($_GET["btnOperacao"])) {
        $operacao = $_GET["btnOperacao"];
    }
}

if (isset($_GET["txtCodLivro"])) {
    if (!empty($_GET["txtCodLivro"])) {
        $codLivro = $_GET["txtCodLivro"];
    }
}

if(isset($_GET["txtNomeLivro"])) {
    if (!empty($_GET["txtNomeLivro"])) {
        $nomeLivro = $_GET["txtNomeLivro"];
    }
}

if(isset($_GET["txtAutorLivro"])) {
    if (!empty($_GET["txtAutorLivro"])) {
        $autorLivro = $_GET["txtAutorLivro"];
    }
}

if(isset($_GET["numPaginas"])) {
    if (!empty($_GET["numPaginas"])) {
        $numPaginas = $_GET["numPaginas"];
    }
}

if(isset($_GET["numPaginas"])) {
    if (!empty($_GET["numPaginas"])) {
        $generoLivro = $_GET["numPaginas"];
    }
}

if(isset($_GET["txtSinopse"])) {
    if (!empty($_GET["txtSinopse"])) {
        $sinopseLivro = $_GET["txtSinopse"];
    }
}

if(isset($_GET["indice"])) {
    if (!empty($_GET["indice"])) {
        $indiceLivro = $_GET["indice"];
    }
}


//-----------------------------------------------------------
//                   VALIDAR OS DADOS
//-----------------------------------------------------------

if (empty($codLivro)) {
    echo "<h2>Código do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($nomeLivro)) {
    echo "<h2>Nome do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($autorLivro)) {
    echo "<h2>Autor do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($numPaginas)) {
    echo "<h2>Número de páginas do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($generoLivro)) {
    echo "<h2>Gênero do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($nomeLivro)) {
    echo "<h2>Nome do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

if (empty($sinopseLivro)) {
    echo "<h2>Sinopse do Livro não informado.</h2>";
    echo "<p><a href='enviar.php'>Clique aqui para voltar.</a></p>";
    die();
}

//-----------------------------------------------------------
//                   PROCESSAR OS DADOS
//-----------------------------------------------------------

$arquivoLivros = "D:\ADS\ProgramaçãoWeb2\projetos\Prova\arquivo\Livros.JSON";

switch ($operacao) {
    case "Inserir":

        // verifica se o arquivo existe e o converte em array
        if (file_exists($arquivoLivros)) {
            $livrosJSON = file_get_contents($arquivoLivros);
            $livros = json_decode($livrosJSON, true);
        }
        
        // insere os dados do livro no final do array
        $livros[] = ["CodLivro" => $codLivro, "NomeLivro" => $nomeLivro, "AutorLivro" => $autorLivro, 
                    "NumPaginas" => $numPaginas, "GeneroLivro" => $generoLivro, "SinopseLivro" => $sinopseLivro];
        
        // converte o array pra json
        $livrosJSON = json_encode($livros);
        
        // sobrescreve os dados do arquivo
        file_put_contents($arquivoLivros, $livrosJSON);
        
        header("Location: enviar.php");
        die();
    
}









?>