# Reverse_Shell_PHP
![image-1](https://github.com/GiovanniMatos/Reverse_Shell_PHP/assets/99231397/8e575604-ef37-4d9d-86ef-637cde8bcad2)
#
### <b>Attacker side:</b><br>
When configuring a reverse shell, the attacker is in server mode and waits for the connection from the compromised device, which acts as a client. When the compromised device connects to the attacker's server, the attacker can remotely control the compromised system. Generally tools like [Netcat](https://gitbook.ganeshicmc.com/redes/ferramentas/netcat) They are used so that the attacker can be in server mode waiting for a connection on their IP and on a certain port.<br>
In the image below, the attacking machine is in server mode waiting for a connection on port 5000, so the "reverse-shell.php" file that will be executed by the client (victim) must specify the same port.

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
