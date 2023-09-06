
<?php
/*
Ejercicio Dos
Caracciolo Ahuitz

Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/
    $mensajeVerano = "</br> Es Verano";
    $mensajeOtonio = "</br>  Es Otoño";
    $mensajeInvierno = "</br>  Es Invierno";
    $mensajePrimavera = "</br>  Es Primavera";
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $today = date("F j, Y, g:i a");       
    $mes = date("m");
    echo $today;

    switch ($mes) {
        case 1:
            echo $mensajeVerano;
            break;
            case 2:
                echo $mensajeVerano;
                break;
                case 3:
                    echo $mensajeVerano;
                    break;
                    case 4:
                        echo $mensajeOtonio;
                        break;
                        case 5:
                            echo $mensajeOtonio;
                            break;
                            case 6:
                                echo $mensajeOtonio;
                                break;
                                case 7:
                                    echo $mensajeInvierno;
                                    break;
                                    case 8:
                                        echo $mensajeInvierno;
                                        break;
                                        case 9:
                                            echo $mensajePrimavera;
                                            break;
                                            case 10:
                                                echo $mensajePrimavera;
                                                break;
                                                case 11:
                                                    echo $mensajeVerano;
                                                    break;
                                                    case 12:
                                                        echo $mensajeVerano;
                                                        break;
    }
?>
