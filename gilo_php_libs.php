<?php
        class GiloPhpLibs{
            //Casual php setting
             function start_session(){
                return session_start();
             }

              function setTimeZone($city){
                return date_default_timezone_set($city);
              }
              function showDate($format="D/M/Y"){
                    switch($format){
                        case "D/M/Y": return date("D/M/Y");break;
                        case "D-M-Y": return date("D-M-Y");break;
                        case "d/m/y": return date("d/m/y");break;
                        case "d-m-y": return date("d-m-y");break;
                        default: return "Unrecognized Format";
                    }
              }
              function showTime($format="h:is a"){
                    switch($format){
                        case "h:is a": return date("h:is a");break;
                        case "h:is a": return date("h:is a");break;
                        default: return "Unrecognized Format";break;
                    }
              }
              function trimLong($text, $max){
                    if(strlen($text)>$max){
                       $trimmed = substr($text,0,$max).'...';
                       return $trimmed;
                    }else{
                        return $text;
                    }
              }

              function trimImageLink($image_link){
                 return substr($image_link,6);
              }
              //Database
              function db_connect($host, $uname, $pwd="", $db){
                     return mysqli_connect($host, $uname, $pwd, $db);
               }

               //get data
               function retrieveTableRows($connection, $table, $filter){
                        if($filter==true){
                            return mysqli_query($connection, "SELECT * FROM $table $filter");
                        }else{
                            return mysqli_query($connection, "SELECT * FROM $table");
                        }
               }
               function countTableRows($connection, $table, $filter){
                    if($filter==false){
                        $q = mysqli_query($connection, "SELECT COUNT(*) AS TOTAL FROM $table");
                        while($row = mysqli_fetch_array($q)){
                            return $row['TOTAL'];
                        }
                    }else{
                        $q = mysqli_query($connection, "SELECT COUNT(*) AS TOTAL FROM $table WHERE $filter");
                        while($row = mysqli_fetch_array($q)){
                            return $row['TOTAL'];
                        }
                    }
               }
        }

?>