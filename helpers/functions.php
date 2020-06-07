<?php

    function redirect($location) {
        header("Location: $location");
    }

    function sanitize($data){
        str_replace("'", "", $data);
        str_replace('"', '', $data);
        $data = preg_replace("/[^A-Za-z0-9,-@_. ]/", "", $data);
        $data = trim(stripcslashes(strip_tags(htmlentities(htmlspecialchars($data)))));
        return $data;
	}

	function authenticateFile($type){
		
		$arr = explode('/', $type);

		if($arr[0] === 'image'){
			return true;
		}

		return false;

	}


    function getInsertedId($obj, $property, $value, $isNo){
		$array = $obj::search($property, $value, $isNo);
		return $array->id;
	}
	
    
    function addSrNo($result, $isAssociative){
		if(is_array($result)){
			for($i=0;$i<sizeof($result);$i++){
				if($isAssociative){
					$result[$i]["SrNo"] = $i+1;
				}else{
					$result[$i]->SrNo = $i+1;
				}
			}
		}

		return $result;
    }
    
    function groupByAggregate($result, $groupBy, $aggregate, $pushAttr){
		$output = array();
		for($i=0;$i<sizeof($aggregate);$i++){
			$res[$aggregate[$i]] = array();
			$str[$aggregate[$i]] = array();
			$temp[$aggregate[$i]] = array();
		}

		$currentId = $result[0][$groupBy];
		foreach($result as $row){
			for($i=0;$i<sizeof($aggregate);$i++){
				if($currentId !== $row[$groupBy]){
					for($j=0;$j<sizeof($aggregate);$j++){
						$res[$aggregate[$j]] = $str[$aggregate[$j]];
						$res["count_".$aggregate[$j]] = sizeof($str[$aggregate[$j]]);
					}
					array_push($output, $res);
					for($j=0;$j<sizeof($aggregate);$j++){
						$str[$aggregate[$j]] = array();
					}
				}

				if(!in_array($row[$groupBy], $temp[$aggregate[$i]])){
					array_push($temp[$aggregate[$i]], $row[$groupBy]);
					$currentId = $row[$groupBy];
					for($j=0;$j<sizeof($pushAttr);$j++){
						$res[$pushAttr[$j]] = $row[$pushAttr[$j]];
					}
				}

				if(!in_array($row[$aggregate[$i]], $str[$aggregate[$i]])){
					array_push($str[$aggregate[$i]], $row[$aggregate[$i]]);
				}
			}

			$currentId = $row[$groupBy];
		}

		for($i=0;$i<sizeof($aggregate);$i++){
			$res[$aggregate[$i]] = $str[$aggregate[$i]];
			$res["count_".$aggregate[$i]] = sizeof($str[$aggregate[$i]]);
		}

		array_push($output, $res);
		return $output;
	}

	function formInputValidation($object, $key, $array, $value){
		for($i=0;$i<sizeof($key);$i++){
			$attr = $key[$i];
			$val = $value[$i];
			if(isset($array[$val])){
				$object->$attr = sanitize($array[$val]);
			}
		}
		return $object;
	}

	function encrypt($data){
		return openssl_encrypt($data, CIPHER, ENCRYPTION_KEY, ENCRYPTION_OPTIONS, ENCRYPTION_VECTOR);
	}

	function decrypt($encryptMessage){
		return openssl_decrypt ($encryptMessage, CIPHER, DECRYPTION_KEY, ENCRYPTION_OPTIONS, ENCRYPTION_VECTOR); 
	}

	