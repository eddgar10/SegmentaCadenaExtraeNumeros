 <?php
/*MODULO QUE EXTRAE NUMEROS TELEFONICOS DEL CAMPO REFERENCIAS CONFORMADO POR #,CADENA 

//DESCOMPONER CADENA:
//https://www.anerbarrena.com/php-explode-4656/*/

include __DIR__ . '/db_connect.php';

$nombretabla = "RELACIONADOSTMP_".date('d_m_Y_g_i');

if(isset($_POST['import_data']))
    {
    
    // VALIDACION DE QUE EL ARCHIVO CARGADO ES UN FORMATO CSV O SIMILAR
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.ms-excel');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes))
            {

            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                $csv_file = fopen($_FILES['file']['tmp_name'], 'r');

                
                    $sql = "CREATE TABLE $nombretabla (
                        cuenta varchar(10),
                        r1 varchar(10),
                        r2 varchar(10),
                        r3 varchar(10),
                        r4 varchar(10),
                        r5 varchar(10),
                        r6 varchar(10),
                        r7 varchar(10),
                        r8 varchar(10),
                        r9 varchar(10),
                        r10 varchar(10),
                        r11 varchar(10),
                        r12 varchar(10),
                        r13 varchar(10),
                        r14 varchar(10),
                        r15 varchar(10))";
                if (mysqli_query($conn, $sql))
                    {
                      echo "Tabla $nombretabla creada";
                    } 
                else
                    {
                    echo "Error creating table: " . mysqli_error($conn);
                    }

                // MANEJO DATOS DE ARCHIVO CSV CARGADO PREVIAMENTE
                while(($emp_record = fgetcsv($csv_file)) !== FALSE)
                    {
                     //SEGMENTA CADENA DE CAMPO 22 EN UN ARRAY DELIMITADO POR EL CARACTER ',' PASAR PARA ARRIBA Y HACER 1 SOLA CONSULTA SQL PARA LA INSERCION DE LOS DATOS YA PROCESADOS NUMERO DE CUENTA Y RELACIONADOS EN r1
                        $cadena = $emp_record[22]; //el valor obtenido de csv pasa a un string
                        $array = explode(",", $cadena); //string es convertido a arreglo de strings cada elemento se obtiene por ',' como delimitador
                        $tam = count($array);   //tamaño de arreglo para operacion en ciclo
                        $totalnumeros = $tam/2;      //muestra numeros relacionados incluidos en el arreglo
                        echo "<br> $emp_record[0] $totalnumeros relacionado: ";
                        //ELIMINAMOS TODO TEXTO DEL ARREGLO QUE SE UBICA EN LAS POSICIONES IMPARES DE LOS INDICES
                        for ($i=0; $i < $tam; $i++) 
                            {
                            if ( $i % 2 != 0)
                                {
                                    $array[$i] = "";
                                }                            
                            }
                        print_r ($array);

                        switch ($totalnumeros)
                            {
                            case '1':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta, r1) 
                                    VALUES('".$emp_record[0]."','".$array[0]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'2':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2)
                                    VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'3':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3)
                                    VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'4':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4)
                                    VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'5':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5)
                                    VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'6':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'7':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'8':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'9':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'10':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'11':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."','".$array[20]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'12':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."','".$array[20]."','".$array[22]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;                        
                            case'13':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."','".$array[20]."','".$array[22]."','".$array[24]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'14':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."','".$array[20]."','".$array[22]."','".$array[24]."','".$array[26]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                            case'15':
                                    $mysql_insert = "INSERT INTO $nombretabla(cuenta,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15) VALUES('".$emp_record[0]."','".$array[0]."','".$array[2]."','".$array[4]."','".$array[6]."','".$array[8]."','".$array[10]."','".$array[12]."','".$array[14]."','".$array[16]."','".$array[18]."','".$array[20]."','".$array[22]."','".$array[24]."','".$array[26]."','".$array[28]."')";
                                    mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                                    break;
                                }
                // UNE TODOS LOS ELEMENTOS A 1 CADAENA QUED FUERA YA QUE SE MANEJARA POR SWITCH CASE EN BASE AL TAMAÑO DEL ARRAL QUE VA DE 1 A 15
                        // $cadenarelaionados = implode($array);
                        //echo "$cadenarelacionados";
                    
                       //INSERCION DE DATOS NUMERO DE CUENTA Y FILA DE RELACIONADAS DENTRO DE SWITCH CASE A CRITERIO DEL TAMAÑO DEL VECTOR $ARRAY EL CUAL CONTIENE EL TOTAL DE NUMEROS RELACIONADOS CORRESPONDIENTES A LA CUENTA
                        
        /*               $mysql_insert = "INSERT INTO $nombretabla(cuenta, r0)
                                                VALUES('".$emp_record[0]."','".$cadenarelacionados."')";                    
                        mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                        
*/
                    //CONFIGURACION DE COLUMNA RELACIONADOS LIMPIEZA DE TEXTO, Y CARGA CONJUNTO DE NUMEROS EN 1 SOLO REGISTRO SQL
                    
                       
                    /*    $mysql_insert = "INSERT INTO $nombretabla(r1)
                                                 VALUES('".$cadenarelacionados."')";                   
                        mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));*/
                        } 

                /* EJEMPLO IMPLODE
                $array_equipo = array('portero', 'laterales', 'centrales', 'mediocentros', 'interiores', 'delanteros');
                $cadena_equipo2 = implode($array_equipo);
                echo "<br><br>El equipo sin parámetro string es el siguiente: " .$cadena_equipo2;
                El equipo sin parámetro string es el siguiente: porterolateralescentralesmediocentrosinterioresdelanteros                    
                */
                }
        fclose($csv_file);
        $import_status = '?import_status=success';
            } 
        else
            {
                $import_status = '?import_status=error';
            }
    } 
    else 
        {
            $import_status = '?import_status=invalid_file';
        }

header("Location: index.php".$import_status);

?>