<?php

require_once "DataObject.class.php";

class ManorEntry extends DataObject {

  protected $data = array(
    "manor_id" => "",
    "title" => "",
    "thumbnail" => "",
    "user_id" => ""
  );

  public static function getLogEntries( $user_id ) {
    $conn = parent::connect();
    $sql = "SELECT manor_id, title, thumbnail, user_id FROM " . TBL_MANORS . " WHERE user_id = :user_id ORDER BY manor_id DESC";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":user_id", $user_id, PDO::PARAM_INT );
      $st->execute();
      $logEntries = array();
      foreach ( $st->fetchAll() as $row ) {
        $logEntries[] = new LogEntry( $row );
      }
      parent::disconnect( $conn );
      return $logEntries;
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

// not in use yet

  public function record() {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_ACCESS_LOG . " WHERE memberId = :memberId AND pageUrl = :pageUrl";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":memberId", $this->data["memberId"], PDO::PARAM_INT );
      $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
      $st->execute();

      if ( $st->fetch() ) {
        $sql = "UPDATE " . TBL_ACCESS_LOG . " SET numVisits = numVisits + 1 WHERE memberId = :memberId AND pageUrl = :pageUrl";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":memberId", $this->data["memberId"], PDO::PARAM_INT );
        $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
        $st->execute();
      } else {
        $sql = "INSERT INTO " . TBL_ACCESS_LOG . " ( memberId, pageUrl, numVisits ) VALUES ( :memberId, :pageUrl, 1 )";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":memberId", $this->data["memberId"], PDO::PARAM_INT );
        $st->bindValue( ":pageUrl", $this->data["pageUrl"], PDO::PARAM_STR );
        $st->execute();
      }

      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function deleteAllForMember( $memberId ) {
    $conn = parent::connect();
    $sql = "DELETE FROM " . TBL_ACCESS_LOG . " WHERE memberId = :memberId";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":memberId", $memberId, PDO::PARAM_INT );
      $st->execute();
      parent::disconnect( $conn );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

}

?>
