<?php
class general{

    private $_CI;
    public function __construct()
    {
        $this->_CI = & get_instance();
    }

    function cleanArray($input){ // MJ: REMUEVE ESPACIOS EN BLANCO, ., ( Y )
		$finalData = implode(", ", array_unique(explode(", ", $input)));
		return $finalData;
    }

}
?>
