# Reverse_Shell_PHP
![image-1](https://github.com/GiovanniMatos/Reverse_Shell_PHP/assets/99231397/8e575604-ef37-4d9d-86ef-637cde8bcad2)
#
### <b>Lado do atacante:</b><br>
Na configuração de uma reverse shell, o atacante está em modo servidor e aguarda a conexão do dispositivo comprometido, que atua como cliente. Quando o dispositivo comprometido se conecta ao servidor do atacante, o atacante pode controlar remotamente o sistema comprometido.
Geralmente ferramentas como [Netcat](https://gitbook.ganeshicmc.com/redes/ferramentas/netcat) são utilizadas para que o atacante possa ficar em modo servidor aguardando uma conexão em seu IP e em determinada porta.<br>
Na imagem abaixo, a máquina atacante esta em modo servidor aguardando conexão na porta 5000, entao o arquivo "reverse-shell.php" que será executado pelo cliente (vítima) deve especificar a mesma porta.

![f68b3aba-39af-41ea-a82e-ed9b8ef83286](https://github.com/GiovanniMatos/Reverse_Shell_PHP/assets/99231397/71f1231d-198a-4552-99d6-14f38cbd31ad)


### <b>Lado da vítima:</b><br>
A vítima estará em modo cliente, onde ela fará a conexão no IP e porta do atacante, fazendo com que sua Shell seja enviada através de tal conexão e dando o controle de seu sistema ao atacante.
Tal conexão pode ser feita por meio da execução de arquivos com o código malicioso, links ou ativação de um plugin do Wordpress, há diversas formas.

![626822d9beb1b531fd597ae2_Reverse Shell in action](https://github.com/GiovanniMatos/Reverse_Shell_PHP/assets/99231397/0992005d-ff59-4a33-980e-399dc0350871)

![](https://img.shields.io/badge/PROTEÇÃO:-e41a43?style=for-the-badge&Color=white) <br>
Para o desenvolvedor, no ".htaccess" não permitir que solicitações com palavras como "bash", "python", "sh" sejam processadas pelo servidor.<br>
ex:<br>
```bash
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{QUERY_STRING} (\\|\')(?:[a-zA-Z0-9],?)*(bash|python|perl|tcl|rc|sh) [NC]
    RewriteRule .* - [F,L]
</IfModule>
```
Manter o sistema operacional e os softwares atualizados, pois atualizações frequentemente incluem correções de segurança.<br>
Usar sistemas de detecção de intrusão (IDS) e sistemas de prevenção de intrusão (IPS) para monitorar e bloquear atividades maliciosas.<br>
Usar criptografia para proteger a comunicação entre sistemas e serviços.<br>
Usar firewalls para bloquear tráfego malicioso e restringir o acesso a portas e serviços não necessários.<br>
ex:<br>
```bash
iptables -A INPUT -p tcp --dport 1234 -j DROP
```
Esse comando impede que conexões na porta 1234 sejam estabelecidas no servidor.
