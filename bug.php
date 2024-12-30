function foo(array $arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'bar') {
      unset($arr[$key]); // this line may cause an error
    }
  }
  return $arr;
}

$arr = ['foo', 'bar', 'baz'];
$result = foo($arr);
print_r($result); //output: Array ( [0] => foo [2] => baz )

function foo2(array &$arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'bar') {
      unset($arr[$key]);
    }
  }
}

$arr2 = ['foo', 'bar', 'baz'];
foo2($arr2);
print_r($arr2); // output: Array ( [0] => foo [2] => baz )