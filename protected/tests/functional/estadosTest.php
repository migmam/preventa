<?php

class estadosTest extends WebTestCase
{
	public $fixtures=array(
		'estadoses'=>'estados',
	);

	public function testShow()
	{
		$this->open('?r=estados/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=estados/create');
	}

	public function testUpdate()
	{
		$this->open('?r=estados/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=estados/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=estados/index');
	}

	public function testAdmin()
	{
		$this->open('?r=estados/admin');
	}
}
