<?php

class preventaTest extends WebTestCase
{
	public $fixtures=array(
		'preventas'=>'preventa',
	);

	public function testShow()
	{
		$this->open('?r=preventa/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=preventa/create');
	}

	public function testUpdate()
	{
		$this->open('?r=preventa/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=preventa/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=preventa/index');
	}

	public function testAdmin()
	{
		$this->open('?r=preventa/admin');
	}
}
