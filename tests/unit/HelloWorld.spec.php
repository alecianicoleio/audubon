<?php
/**
 * @author: Daniel Jones
 * @version: 12/1/16
 */
use Audubon\Entities\HelloWorld;

describe('HelloWorld', function(){
    describe('->setName()', function(){
        beforeEach(function(){
            $this->assert = new Peridot\Leo\Interfaces\Assert();

            $this->helloWorld = new HelloWorld();
        });

        it('test that name has been set', function(){
            $name = 'Pete';
            $this->helloWorld->setName($name);

            $this->assert->equal($this->helloWorld->getName(), $name);
        });
    });
});