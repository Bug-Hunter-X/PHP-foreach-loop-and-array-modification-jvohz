function foo(array $arr) {
  // Create a new array to store the filtered elements
  $newArray = [];
  foreach ($arr as $value) {
    if ($value !== 'bar') {
      $newArray[] = $value;
    }
  }
  return $newArray;
}

function foo2(array &$arr) {
  // Iterate over a copy of the keys to avoid issues with unset.
    $keys = array_keys($arr);
    foreach ($keys as $key) {
        if ($arr[$key] === 'bar') {
            unset($arr[$key]);
        }
    }
}

$arr = ['foo', 'bar', 'baz'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => foo [1] => baz )

$arr2 = ['foo', 'bar', 'baz'];
foo2($arr2);
print_r($arr2); //Output: Array ( [0] => foo [2] => baz )