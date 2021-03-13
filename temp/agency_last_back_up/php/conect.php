<?php 
                     $hostname = 'localhost';
                     $username = 'defiska_12117115';
                     $passwordname = 'RkPWivM5';
                     $basename = 'defiska_12117115';
                     $conn = new mysqli($hostname, $username, $passwordname, $basename) or die 
                     ('Невозможно открыть базу');
                     if ($conn->connect_errno) {
                        echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                    }

?>