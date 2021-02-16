<?php
function extrair($doc,$text)
{
    if ($doc == 'port') {

    
    $pos1 = strpos($text, 'º ');
    if (false === $pos1) return 'Não encontrado';
    $pos1 += strlen('º ');
    $pos2 = strpos($text, ',', $pos1);
    return trim(substr($text, $pos1, $pos2 - $pos1));
}
    if ($doc == 'ofc') {
        $pos1 = strpos($text, 'º ');
        if (false === $pos1) return 'Não encontrado';
        $pos1 += strlen('º ');
        $pos2 = strpos($text, '/D', $pos1);
        return trim(substr($text, $pos1, $pos2 - $pos1));}
}
function numdoc($doc, $cargo)
{
    //Função que verifica a numeraçao do doc
    function num($doc)
    {
        $doclow = strtolower($doc);

        $conn = mysqli_connect('localhost', 'root', '', 'gremio');
        mysqli_set_charset($conn, "utf8");
        $query = "SELECT num_doc_$doclow FROM documentos_$doclow  ORDER BY num_doc_$doclow DESC LIMIT 1";
        $query_a = mysqli_query($conn, $query);
        $num = mysqli_fetch_assoc($query_a);
        if (isset($num)) {
           // Configurar a numeração 

            if (isset($num["num_doc_$doclow"])) {
                $num_exp = explode("/", $num["num_doc_$doclow"]);
             
                $num_a = intval($num_exp['0']);

                if ($num_exp['1'] == date('Y')) {
                    $num_a = $num_a + 1;
                } else {
                    $num_a = 1;
                }

                $numdoc = $num_a . '/' . date('Y');
            } else {
                $numdoc = '1/' . date('Y');
            }
        } else {
            $numdoc = '1/' . date('Y');
        }
        return $numdoc;
    } //fim da num

    function diretoria($cargo)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'gremio');
        mysqli_set_charset($conn, "utf8");
        $query = "SELECT sigla_diretoria from usuarios_diretorias 
        join usuarios_cargos 
        on usuarios_cargos.cargo_diretoria = usuarios_diretorias.id_diretoria WHERE nome_cargo = '$cargo'";
        $query_a = mysqli_query($conn, $query);
        $sigla = mysqli_fetch_assoc($query_a);
        return $sigla['sigla_diretoria'];
    }


    if ($doc == 'ata') {

        return num($doc);
    }
    if ($doc == 'ata_ass') {

        return num($doc);
    }

    if ($doc == 'ofc') {

        return strtoupper('OFÍCIO nº ' . num($doc) . '/' . diretoria($cargo) . '/GEVP');
    }
    if ($doc == 'port') {
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Fortaleza');
        $data = date('d-m-Y');

        $data = strftime("%d de %B de %Y", strtotime($data));
        return strtoupper('PORTARIA Nº ' . num($doc) . ', de ' . $data . '.');
    }
}
