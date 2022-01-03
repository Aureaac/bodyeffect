<?php


    function limpiar_dato($dato){
        $limpia = "";

        if($dato && $dato != " "){
            
            //DIVIDO LA CADENA POR LOS ESPACIOS QUE TENGA
            $parts = preg_split("/[\s*]+/",$dato);
            
            $palabras = 0;
            
            foreach($parts as $subcadena){ 
                //ELIMINO LOS ESPACIOS QUE TENGA
                $subcadena = trim($subcadena); 
                //LUEGO LOS VUELVO A UNIR OMITO SOLO LOS QUE UNICAMENTE SEAN ESPACIOS
                if($subcadena != "" && $subcadena != " "){
                    $limpia .= $subcadena;
                }
                
                $palabras++;
                if($palabras < count($parts) && $parts[$palabras] != " " && $parts[$palabras] != "")
                    $limpia .= " ";
            }
            
            $limpia = strtoupper(str_replace(array('á', 'é', 'í', 'ó', 'ú', 'Á',  'É',  'Í',  'Ó',  'Ú'), array('a', 'e', 'i', 'o', 'u', 'A',  'E',  'I',  'O',  'U'), $limpia));
        }

        return $limpia ? $limpia : null ;
	}
	
	function chat( $idsolicitud, $mensaje, $usuario ){
		$CI = get_instance();
	    $CI->load->model('Consulta');
		$CI->Consulta->insertar_observacion( $idsolicitud, $mensaje, $usuario );
	}

    function log_sistema( $idusuario, $idsolicitud, $movimiento ){
		$CI = get_instance();
        $CI->load->model('Consulta');
        
        $data = array(
            "idusuario" => $idusuario,
            "idsolicitud" => $idsolicitud,
            "tipomov" => $movimiento,
            "fecha" => date("Y-m-d H:i:s")
        );

		$CI->Consulta->insertar_log( $data );
    }

	   function encriptar($texto_encriptar){
        return openssl_encrypt($texto_encriptar, 'AES-128-CBC', 'S1ST3MA_6E5T0R_RH_C1UD4D_MAD3RA5', 0, '8102cdmqsd0912vs');
        // return openssl_encrypt($texto_encriptar, 'AES-128-CBC', 'S1ST3MA_b0D1_3FFEC7-9102', 0, '8102dyeCDM0912vs');
    }
    
    function desencriptar($texto_desencriptar){
        return openssl_decrypt($texto_desencriptar, 'AES-128-CBC', 'S1ST3MA_6E5T0R_RH_C1UD4D_MAD3RA5', 0, '8102cdmqsd0912vs');
    }
		// return openssl_decrypt($texto_desencriptar, 'AES-128-CBC', 'S1ST3MA_b0D1_3FFEC7-9102', 0, '8102dyeCDM0912vs');
	 

?>