<?php

class Server {

    private $socket;

    public function __construct() {
        $this->socket = stream_socket_server("tcp://127.0.0.1:9000", $errNo, $errMessage, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN);
        if($this->socket === false) throw new Exception("Server Error: $errMessage");
        $this->loop();
    }

    public function loop() {
        while(true) {
            $client = stream_socket_accept($this->socket, -1, $peername);
            if($client) {
                echo "New($peername)\n";
                $clients[] = new Client($client);
            } else {
                echo "Fail.\n";
            }
        }
    }

}

class Client extends Thread {

    private $socket;

    public function __construct($socket) {
        $this->socket = $socket;
        $this->start();
    }

    public function run() {
        $client = $this->socket;
        fwrite($client, "Hello.Bye.\n");
        stream_socket_shutdown($client, STREAM_SHUT_RDWR);
        fclose($client);
    }

}

new Server();
?>
<?php

function is_file_cached($file) {
    $info = apc_cache_info();
    foreach ($info['cache_list'] as $cache) {
        if ($cache['filename'] == $file) return true;
    }
    return false;
}

?>
