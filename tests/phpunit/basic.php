<?php
namespace tests\tangible_plugin_playground;

class Basic_TestCase extends \WP_UnitTestCase {
  function test_plugin_function() {
    $this->assertTrue( function_exists( 'tangible_plugin_playground' ) );
  }
}
