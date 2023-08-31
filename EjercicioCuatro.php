<?php
/*
Ejercicio Cuatro
Caracciolo Ahuitz

Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/
$operador = '+';
$numeroUno = 10;
$numeroDos = 2;

switch ($operador) {
    case '+':
        $suma = $numeroUno + $numeroDos;
        echo "La suma es {$suma}"; 
        break;
    
    case '-':
        $resta = $numeroUno - $numeroDos;
        echo "La resta es {$resta}";
        break;
    case '/':
        $division = $numeroUno / $numeroDos;
        echo "La division es {$division}";
        break;
    case '*':
        $multiplicacion = $numeroUno * $numeroDos;
        echo "La multiplicacion es {$multiplicacion}";
        break;
}

?>