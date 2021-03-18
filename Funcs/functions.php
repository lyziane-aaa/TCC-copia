<?php

//Funções de numeração de documentos
function extrair($doc, $text)
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
        return trim(substr($text, $pos1, $pos2 - $pos1));
    }
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

        //Caso for março, colocar o Ç normalmente
        $pos1 = strpos($data, ' de ');
        if (false === $pos1) return 'Não encontrado';
        $pos1 += strlen(' de ');
        $pos2 = strpos($data, ' de ', $pos1);

        $marco = utf8_encode(trim(substr($data, $pos1, $pos2 - $pos1)));
        if ($marco == 'março') {
            $y = date('Y');
            $data = date('d-m-Y');
            // Por algum motivo a função strftime retorna ç apenas em minúsculo, o que é um problema, porque o texto deve ser em maiúsculo
            $data = strftime("%d de MARÇO ", strtotime($data)) . "de $y";
        }
        return strtoupper('PORTARIA Nº ' . num($doc) . ', de ' . $data . '.');
    }
}

// Funções de formatação de data para o padrão br
function databr($data)
{
    //Verifica se tem 19 caracteres, ou seja, se a data e o horário estão como "2021-02-15 15:48:48"
    if (strlen($data) == 19) {

        $data = date('d/m/Y à\s h\hi\m\i\ns\s', strtotime($data));
        return $data;
    } //Verifica se tem 10 caracteres, ou seja, apenas a data, como em  "2021-02-15" 
    if (strlen($data) == 10) {
        $data = date('d/m/Y', strtotime($data));
        return $data;
    }
}

function modale($tipo)
{
    $modal = "";
    // if ($tipo == "editar_achados") {
        $modal = '
<!-- Modal -->
<div id="' . $tipo . '" tabindex="-1" data-backdrop="static" data-keyboard="false" class="modal hidden fade in" style="display:none !important; z-index: 90000 !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content" style="background-color:#161717;">
                
          <span id="visul_' . $tipo . '"></span>
        
        <div class="modal-footer">
        </div>
      </div>
    </div>
    </div>

    </div>';
    



//   if ($tipo == "bc") {

//         $modal = '<!-- Modal -->
//     <div id="editar-' . $tipo . '" tabindex="-1" data-keyboard="false" data-backdrop="static" class="modal hidden fade in" style="display:none !important; z-index: 90000 !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
//         <div class="modal-dialog">
//           <div class="modal-content">
                    
//               <span id="visul_' . $tipo . '"></span>
            
//             <div class="modal-footer">
//               <button type="button" class="btn btn-primary " onclick="window.location.reload();" data-dismiss="modal">Fechar</button>
//             </div>
//           </div>
//         </div>
//       </div>';
//     }
  

    return $modal;
}
