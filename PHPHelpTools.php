<?php

class PHPHelpTools {

  /**
   * @see http://php.net/manual/en/function.array-splice.php#111204
   *
   * @param $input
   * @param $offset
   * @param $length
   * @param $replacement
   */
  public static function array_splice_assoc(&$input, $offset, $length, $replacement) {
    $replacement = (array) $replacement;
    $key_indices = array_flip(array_keys($input));
    if (isset($input[$offset]) && is_string($offset)) {
      $offset = $key_indices[$offset];
    }
    if (isset($input[$length]) && is_string($length)) {
      $length = $key_indices[$length] - $offset;
    }

    $input = array_slice($input, 0, $offset, TRUE)
      + $replacement
      + array_slice($input, $offset + $length, NULL, TRUE);
  }


  /**
   * @see https://stackoverflow.com/a/2699153/8018195
   */
  public static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
  }

  /**
   * If you just need to know if two arrays' values are exactly the same
   * (regardless of keys and order).
   *
   * @see http://php.net/manual/en/function.array-diff.php#110572
   *
   * @param $arrayA
   * @param $arrayB
   *
   * @return bool
   */
  public static function array_identical_values($arrayA, $arrayB) {
    sort($arrayA);
    sort($arrayB);

    return $arrayA == $arrayB;
  }

}





/****************************** EXAMPLES **************************************/

/*


$input = array('a'=> "red", 'b'=> "green", 'c' => "blue", 'd' => "yellow");
PHPHelpTools::array_splice_assoc($input,'b', 1, ['afaf' => "black", 'erer'=>"maroon"]);


***********************************************



array_sort_by_column($array, 'order');



**********************************************


*/