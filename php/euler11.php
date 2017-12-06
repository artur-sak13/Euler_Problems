<?php
// Define Project Euler problem 11 url (as a constant)
define("URL", "https://projecteuler.net/problem=11");

/* Request the HTML of the page for problem 11 (on Project Euler),
 * parse out the problem data and assemble into a 20x20 PHP array
 * @returns array: the fomatted problem array retrieved from the Project Euler website
 */
function get_problem() {
  $doc = new DOMDocument();
  $doc->loadHTML(file_get_contents(URL));

  $problem = trim($doc->getElementsByTagName("p")->item(1)->nodeValue,"\n");
  $problem = explode("\n", $problem);

  array_walk_recursive(
    $problem, 
    function(&$str){
      $str = explode(" ", $str);
    });
  return $problem;
}

/* Find the maximum product of 4 adjacent numbers in a 20x20 
 * array (horizonal, vertical, 2-way diagonal)
 * @param array: $ary - the problem array
 * @returns integer: the maximum product of 4 adjacent numbers in the problem array
 */
function find_max_product($ary) {
  $max = 0;
  for($i=0; $i < sizeof($ary); $i++) {
    $vert = array_reduce(array_chunk(array_column($ary,$i),4),'fold_max');
    for($j=0; $j < sizeof($ary[$i])-3; $j++) {
        $horz = array_product(array_slice($ary[$i], $j,4));
        $diag  = ($i < sizeof($ary) -3) ? array_product(diag_slice($ary, $i, $j)) : 0;
        $max = max($vert, $horz, $diag, $max);
    }
  }
  return $max;
}

/* Take two 4 digit diagonal slices of the problem array 
 * (top left to bottom right, top right to bottom left)
 * @param array: $ary - a 4 row slice of the problem array
 * @param integer: $i - the current row in the problem array
 * @param integer: $j - the current column in the problem array
 * @returns array: the larger of the 2 diagonal array slices 
 */
function diag_slice($ary, $i, $j) {
  $reversed = array_reverse($ary);
  $lr_diagonal = array();
  $rl_diagonal = array();

  for($shift = 0; $shift < 4; $shift++) {
    $lr_diagonal[$shift] = $ary[$i + $shift][$j + $shift];
    $rl_diagonal[$shift] = $reversed[$i + $shift][$j + $shift];
  }
  return max($lr_diagonal, $rl_diagonal);
}

/* Find the maximium value in a column of the problem array by folding over 
 * the maximum values of 4 digit vertical "chunks" of the column
 * @param integer: $carry - maximum from previous iteration folded over for comparison (starts at zero)
 * @param array: $ary - a 4 value "chunk" of a column of the problem array
 * @returns integer: a maximum value after comparing the folded value "$carry" and the product of the current chunk
 */
function fold_max($carry, $ary) {
  return ($carry = max(array_product($ary), $carry));
}

// Entry point which prints the problem solution to STDOUT
echo find_max_product(get_problem());
?>
