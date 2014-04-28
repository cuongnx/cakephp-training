<?php
namespace ChatServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatServer implements MessageComponentInterface {

  protected $topics;
  protected $clients;

  public function __construct() {
    $this->clients = array();
    $this->topics = array();
  }

  public function onOpen(ConnectionInterface $conn) {
    $this->clients[$conn->resourceId] = $conn;
    echo "new connection {$conn->resourceId}\n";
  }

  public function onMessage(ConnectionInterface $from, $msg) {
    $arr = array();
    $msg = json_decode($msg, true);
    parse_str($msg["data"], $arr);
    if (!isset($arr["action"])) {
      $thid = $arr["data"]["Thread"]["id"];
      $cid = $from->resourceId;
      echo "begin broadcasting for topic {$thid} from {$cid} \n";
      $dat = array(
        "view" => $msg["view"],
        "postid" => $msg["postid"]
      );
      $this->broadcast($this->topics[$thid], $dat, $cid);
    } else {
      $this->subscribe($from, $arr["id"]);
    }
  }

  public function onClose(ConnectionInterface $conn) {
    $cid = $conn->resourceId;
    unset($this->clients[$cid]);
    foreach ($this->topics as $thid => $topic) {
      $this->topics[$thid] = array_diff($this->topics[$thid], array($cid));
    }
    echo "disconnect connection {$conn->resourceId}\n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
    echo "error: {$e->getMessage()}\n";
  }

  private function broadcast($topic, $dat, $ex) {
    foreach ($topic as $cid) {
      echo "\t to {$cid}\n";
      if ($cid != $ex) {
        $this->clients[$cid]->send(json_encode($dat));
      }
    }
  }

  private function subscribe($conn, $thid) {
    $cid = $conn->resourceId;
    if (!array_key_exists($thid, $this->topics)) {
      $this->topics[$thid] = array();
      array_push($this->topics[$thid], $cid);
      echo "subscribe {$cid} in new topic {$thid}\n";
    } else {
      $topic = $this->topics[$thid];
      if (!in_array($cid, $topic)) {
        array_push($this->topics[$thid], $cid);
        echo "subscribe {$cid} in existing topic {$thid}\n";
      }
    }

    echo "topic {$thid} has ".implode(" ", $this->topics[$thid])."\n";
  }
}
