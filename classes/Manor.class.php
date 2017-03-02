<?php

ini_set('display_errors', '0');     // don't show any errors...
error_reporting(E_ALL | E_STRICT);  // ...but do log them

// the ManorClass inherits from the DataObject class

require_once "DataObject.class.php";

class Manor extends DataObject {

  protected $data = array(
    "manor_id" => "",
    "latitude" => "",
    "longitude" => "",
    "title" => "",
    "description_short" => "",
    "description" => "",
    "keywords" => "",
    "admission" => "",
    "parking" => "",
    "address" => "",
    "phone" => "",
    "email" => "",
    "function" => "",
    "thumbnail" => "",
    "user_id" => ""
  );

  // A SELECT statement may include a LIMIT clause to restrict the number 
  // of rows the server returns to the client. In some cases, it is desirable 
  // to know how many rows the statement would have returned without the LIMIT, 
  // but without running the statement again.

  public static function getManors( $startRow, $numRows, $order ) {
    $conn = parent::connect();
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . TBL_MANORS . " ORDER BY $order LIMIT :startRow, :numRows";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":startRow", $startRow, PDO::PARAM_INT );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $manors = array();
      foreach ( $st->fetchAll() as $row ) {
        $manors[] = new Manor( $row );
      }
      $st = $conn->query( "SELECT found_rows() AS totalRows" );
      $row = $st->fetch();
      parent::disconnect( $conn );
      return array( $manors, $row["totalRows"] );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

  public static function getManor( $manor_id ) {
    $conn = parent::connect();
    $sql = "SELECT * FROM " . TBL_MANORS . " WHERE manor_id = :manor_id";

    try {
      $st = $conn->prepare( $sql );
      $st->bindValue( ":manor_id", $manor_id, PDO::PARAM_INT );
      $st->execute();
      $row = $st->fetch();
      parent::disconnect( $conn );
      if ( $row ) return new Manor( $row );
    } catch ( PDOException $e ) {
      parent::disconnect( $conn );
      die( "Query failed: " . $e->getMessage() );
    }
  }

}

?>

