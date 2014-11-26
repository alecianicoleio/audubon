<?php
/**
 * Class TestCae
 *
 * Enter Class Description Here
 *
 * @author Joshua Walker
 * @version 11/26/14
 */



namespace Audubon;


class TestCase extends \PHPUnit_Framework_TestCase{
    protected function setUp(){
        //set up test database thing..
        //create whole new databse with no data.
    }

    protected function tearDown(){
        //destory database from last test case.
    }
} 