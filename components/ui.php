<?php

    function displayAlert( $value, $class ){

        $output = '';

        $output .= '
                    <div class="alert '.$class.'  alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        '. $value .'
                    </div>
                ';

        return $output;

    }

    function displayRedirectMessage($array, $var, $if, $else, $out = ''){

        if($out !== ''){
            return $out;
        }

        $output = "";
        if(isset($array[$var])){

            if($var == true){
                $output = displayAlert($if, 'alert-success');
            }else{
                $output = displayAlert($else, 'alert-danger');
            }

        }

        return $output;

    }

    function displayRecord( $array, $table_fields, $options = array() ){
        $output = '';
        $size = sizeof($options);
        global $cryptor;
        $j = 0;
        if( is_array($array) ){
            foreach ( $array as $key ){
                $output .= "<tr>";

                for( $i=0; $i<sizeof($table_fields); $i++ ){
                    $j=0;

                    if(is_array($table_fields[$i])){
                        $output .= "<td>";
                        for($k=0;$k<sizeof($table_fields[$i]);$k++){
                            $attr = $table_fields[$i][$k];
                            $output .= $key[$attr] . " ";
                        }
                        $output .= "</td>";
                        continue;
                    }


                    $attr = $table_fields[$i];
                    $keyAttr = $key[$attr];
                    if(is_array($keyAttr)){
                        $output .= "<td>";
                        $output .= implode(", ", $keyAttr);
                        $output .= "</td>";
                    }else{
                        $output .= "<td>{$keyAttr}</td>";
                    }



                    if( is_array($options) ){
                        if($i==sizeof($table_fields)-1){
                            $attr = $table_fields[$i];
                            $output .= "<td>";
                            foreach ($options as $option){
                                $j++;
                                $output .= "<a class='".$option['class']."' href='".SERVER_ROOT.$option['path']."?id=".$cryptor->encrypt($key['id'])."'>{$option['option']}</a>";
                            }
                            $output .= "</td>";
                            $i++;
                        }
                    }


                }
                $output .= "</tr>";
            }
        }else{
            $output .= "<p class='No record found'></p>";
        }
        return $output;
    }

    function displayOutput( $getval ){

		$output = "";

		if($_GET[$getval] === "success"){
			$output = displayAlert("Record " . $getval . "ed successfully", "alert-success");
		}else{
			$output = displayAlert("Error in " . $getval . "ing" . " record", "alert-danger");
		}

		return $output;

	}