<?php
/*
##  Written By Kyle Coots
##  Date 7-21-2019
##
##  This program is free software: you can redistribute it and/or modify
##  it under the terms of the GNU General Public License as published by
##  the Free Software Foundation, either version 3 of the License, or
##  (at your option) any later version.
##
##  This program is distributed in the hope that it will be useful,
##  but WITHOUT ANY WARRANTY; without even the implied warranty of
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
##  GNU General Public License for more details.
##
##  You should have received a copy of the GNU General Public License
##  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

// db connection
include 'conn.php';
$pdo = new pdo_conn('localhost', 'infinite-scroll', 'jphreak', 'hello');
$pdo->connect();

/**
 * InfinteScroll Class
 */
class InfinteScroll
{

  private $pdo;

  function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function get_items($qty, $offset)
  {

    $response = FALSE;

    $query = "SELECT `id`, `content`, `date` FROM `post` ORDER BY `id` ASC LIMIT :qty OFFSET :oset";

    try {

      $stmt = $this->pdo->prepare($query);
      $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
      $stmt->bindParam(':oset', $offset, PDO::PARAM_INT);
      $stmt->execute();

      while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        $response[] = $row;
      }

      $stmt = null;

    }catch (PDOException $e) {
      $response = $e->getMessage();
    }

    return $response;

  }

}

$qty = isset($_POST['items']) ? $_POST['items'] : 1 ;
$oset = isset($_POST['oset']) ? $_POST['oset'] : 0 ;

$is = new InfinteScroll($pdo->pdo);
$data = $is->get_items($qty, $oset);

echo json_encode($data);
