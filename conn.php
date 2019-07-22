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

/**
 * DB Connection
 */
class pdo_conn
{
  static $pdo;
  private $dsn;
  private $user;
  private $pass;

  function __construct($host,$db_name,$user,$pass)
  {
    //$dsn = 'mysql:host=localhost; dbname=infinite-scroll';
    $this->dsn = 'mysql:host='.$host.'; dbname='.$db_name;
    $this->user = $user;
    $this->pass = $pass;
  }

  public function connect()
  {
    try
    {
      $this->pdo = new PDO($this->dsn,$this->user,$this->pass);
    }
    catch (PDOException $ex)
    {
      $this->pdo = 'Connection Error: ' . $ex->getMessage();
    }
  }

}

?>
