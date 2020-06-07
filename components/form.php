<?php

    function displayCheckbox( $array, $name, $class, $property, $value, $checked_values_array = null, $disabled_values_array = null ){

        $output = '';
        $disabled = '';
        if(is_array($checked_values_array)){

            $i=0;

            if( is_array($array) ){
                $count = 1;
                foreach ($array as $single){

                    $checked = '';
                    $output .= "<div class='".$class."'>";


                    if(isset($array[$i])){
                        if(isset($checked_values_array[$i])) {
                            if($checked_values_array[$i] == $single[$value]){
                                $checked = 'checked';
                                $i++;
                            }

                        }
                    }

                    if(is_array($disabled_values_array)){
                        if(in_array($single[$value], $disabled_values_array)){
                            $disabled = "disabled";
                        }else{
                            $disabled = "";
                        }
                    }

                    $output .= "<input id='".$name."".$count."' type='checkbox' class='custom-control-input attendenceBox' name='".$name."[]' value='".$single[$value]."' ". $checked ." ". $disabled ."   />";
                    $output .= "<label class='custom-control-label' for='".$name."".$count."'>".$single[$property]."</label>";
                    $output .= "</div>";
                    $count++;
                }
            }else{
                $output .= "<p>No categories entered yet.</p>";
            }

        }else{
            if( is_array($array) ){
                $count = 1;
                foreach ($array as $single){
                    if(is_array($disabled_values_array)){
                        if(in_array($single[$value], $disabled_values_array)){
                            $disabled = "disabled";
                        }else{
                            $disabled = "";
                        }
                    }
                    $output .= "<div class='".$class."'>";
                    $output .= "<input id='".$name."".$count."' type='checkbox' class='custom-control-input' name='".$name."[]' value='".$single[$value]."'  />";
                    $output .= "<label class='custom-control-label' for='".$name."".$count."'>".$single[$property]."</label>";
                    $output .= "</div>";
                    $count++;
                }
            }else{
                $output .= "<p>No categories entered yet.</p>";
            }
        }

        return $output;
    }

    function displaySelect( $array, $properties, $value, $selected ){

		$output = '';

		if( is_array($array) ){
			foreach ( $array as $single ){

				if( $single[$value] == $selected ){
					$output .= "<option value='".$single[$value]."' selected >{$single[$properties]}</option>";
				}else{
					$output .= "<option value='".$single[$value]."'>{$single[$properties]}</option>";
				}
			}
		}else{
			$output .= "<option>No any option</option>";
		}
		return $output;
    }

    function displayText( $type, $name, $placeholder = '', $value = '', $label, $id = null, $required = "true" ){

        $output = "";
        $for = "";
        $idVal = "";
    
        if(!is_null($id)){
            $for = " for = '". $id ."'";
            $idVal = "id = '". $id ."'";
        }
        
        if($label){
            
    
            $output = "
    
                <div class='form-group'>
                    <label". $for .">". $label ."</label>
                    <input autocomplete='false' class='form-control' type='". $type ."' name='". $name ."' value='". $value ."' placeholder = '". $placeholder ."' ". $id ." required = '". $required ."' />
                </div>
    
            ";
        }else{

            $output = "
    
                <div class='form-group'>
                    <input autocomplete='false' class='form-control' type='". $type ."' name='". $name ."' value='". $value ."' placeholder = '". $placeholder ."' ". $id ." required = '". $required ."' />
                </div>
    
            ";


        }

       

        return $output;

    }
    
