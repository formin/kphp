@ok
<?php

/**
 * @kphp-infer
 * @param int ...$args
 */
function get_int_args(...$args) {
    var_dump($args);
}

/**
 * @kphp-infer
 * @param string[] ...$args
 */
function get_array_args(...$args) {
    var_dump($args);
}

class Stub {
  public $x = 1;
}

/**
 * @kphp-infer
 * @param Stub ...$args
 */
function get_instance_args(...$args) {
  var_dump($args[0]->x);
  var_dump($args[1]->x);
}

interface StubInterface {
  public function foo();
}

class StubImpl1 implements StubInterface {
  public function foo() {
    var_dump("StubImpl1");
  }
}

class StubImpl2 implements StubInterface {
  public function foo() {
    var_dump("StubImpl2");
  }
}

/**
 * @kphp-infer
 * @param StubInterface ...$args
 */
function get_interface_args(...$args) {
  $args[0]->foo();
  $args[1]->foo();
}

/**
 * @kphp-infer
 * @param int ...$args
 */
function get_varg_in_phpdoc_but_array($args) {
  var_dump($args);
}

/**
 * @kphp-infer
 * @param int $arg
 * @return int ...$
 */
function return_varg_doc($arg) {
  return $arg;
}

get_int_args(1, 2, 3);
get_array_args(["hello", "world"]);
get_instance_args(new Stub, new Stub);
get_interface_args(new StubImpl2, new StubImpl1);
get_varg_in_phpdoc_but_array([1, 2]);
var_dump(return_varg_doc(1));
