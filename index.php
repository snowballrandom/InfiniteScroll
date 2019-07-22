<!--/*
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
*/-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inifinte Scroll</title>
    <style>
      *{
        margin:0 auto;
        padding:0;
        line-height: 1.8;
      }
      .container{
        background: #333;
        margin:0 auto;
        width:800px;
      }
      .content{
        padding:10px;
      }
      span{
        display: block;
      }
      .content--post{
        margin:0px auto;
        padding: 10px;
      }
      .content--post-id{
        background-color: #899f42;
        width: 50%;
        text-align: center;
        border: thin solid #61a655;
        border-radius: 10px;
        margin: 10px auto;
      }
      .content--post-text{
        color: #fff;
        background-color: #0d244d8a;
        border: 1px solid #899f42;
        border-radius: 15px;
        padding: 20px;
        text-indent: 5px;
        box-shadow: 0px 10px 15px #000;
      }
      .content--post-date{
        color: aliceblue;
        background-color: #061515;
        border-radius: 10px;
        margin: 25px auto;
        text-align: center;
        box-shadow: 0px 0px 20px #000;
        padding: 5px;
        font-size: 12px;
      }
      .content--post-end{
        padding: 50px;
        margin: 0 auto;
        text-align: center;
        font-size: 24px;
        background-color: aliceblue;
        border-top: 2px solid #899f42;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div id="content" class=""></div>
    </div>

    <footer>

      <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>

      <script type="text/javascript" src="infinite-scroll.js" ></script>

    </footer>
  </body>
</html>
