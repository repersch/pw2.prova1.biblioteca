<?php

$operacao = "";
$codLivro = "";
$nomeLivro = "";
$autorLivro = "";
$numPaginas = 0;
$generoLivro = "";
$sinopseLivro = "";
$indiceLivro = 0;
$exemplarUnico = "";

function gravarDadosNoArquivo($arquivo, $dados) {

    // converte o array pra json
    $livrosJSON = json_encode($dados);
        
    // sobrescreve os dados do arquivo
    file_put_contents($arquivo, $livrosJSON);

}


function obterDadosDoArquivo($arquivo) {

    // Obtem os dados do arquivo 
    $livrosJSON = file_get_contents($arquivo);
        
    // Converte de Json para Array
    return json_decode($livrosJSON, true );

}


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

if(isset($_GET["generoLivro"])) {
    if (!empty($_GET["generoLivro"])) {
        $generoLivro = $_GET["generoLivro"];
    }
}

if(isset($_GET["txtSinopse"])) {
    if (!empty($_GET["txtSinopse"])) {
        $sinopseLivro = $_GET["txtSinopse"];
    }
}

if (isset($_REQUEST["rdoExemplarUnico"])) {
    $exemplarUnico = $_REQUEST['rdoExemplarUnico'];
    echo $exemplarUnico;
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

$arquivoLivros = "D:\ADS\ProgramaçãoWeb2\projetos\Prova1\Prova\arquivo\Livros.JSON";

switch ($operacao) {

    case "Inserir":

        // verifica se o arquivo existe e o converte em array
        if (file_exists($arquivoLivros)) {
            $livros = obterDadosDoArquivo($arquivoLivros);
        }
        
        // insere os dados do livro no final do array
        $livros[] = ["CodLivro" => $codLivro, 
                    "NomeLivro" => $nomeLivro, 
                    "AutorLivro" => $autorLivro, 
                    "NumPaginas" => $numPaginas, 
                    "GeneroLivro" => $generoLivro, 
                    "ExemplarUnico" => $exemplarUnico, 
                    "SinopseLivro" => $sinopseLivro];
        
        gravarDadosNoArquivo($arquivoLivros, $livros);
        
        header("Location: enviar.php");
        die();

    case "Alterar":

        // Verifica se o arquivo existe
        if (file_exists($arquivoLivros)) { 
            $livros = obterDadosDoArquivo($arquivoLivros);
        } else {
            die("O arquivo $arquivoLivros não existe");
        }

        $livros[$indiceLivro]["CodLivro"] = $codLivro;
        $livros[$indiceLivro]["NomeLivro"] = $nomeLivro;
        $livros[$indiceLivro]["AutorLivro"] = $autorLivro;
        $livros[$indiceLivro]["NumPaginas"] = $numPaginas;
        $livros[$indiceLivro]["GeneroLivro"] = $generoLivro;
        $livros[$indiceLivro]["rdoExemplarUnico"] = $exemplarUnico;
        $livros[$indiceLivro]["SinopseLivro"] = $sinopseLivro;

        gravarDadosNoArquivo($arquivoLivros, $livros);

        header("Location: enviar.php");
        die();

    case "Excluir":

        if (file_exists($arquivoLivros)) {
            $livros = obterDadosDoArquivo($arquivoLivros);
        } else {
            die("O arquivo $arquivoLivros não existe");
        }

        unset($livros[$indiceLivro]);

        gravarDadosNoArquivo($arquivoLivros, $livros);

        header("Location: enviar.php");
        die();

    case "Cancelar":

        header("Location: enviar.php");
        die();

    default:

        echo "<h2>Operação não cadastrada.</h2>";
        echo "<p><a href='enviar.php'>Clique aqui para voltar</a></p>";
        die();

}

?>
