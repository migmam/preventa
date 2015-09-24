<?php

class historicoTest extends WebTestCase
{
	public $fixtures=array(
		'historicos'=>'historico',
	);

	public function testShow()
	{
		$this->open('?r=historico/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=historico/create');
	}

	public function testUpdate()
	{
		$this->open('?r=historico/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=historico/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=historico/index');
	}

	public function testAdmin()
	{
		$this->open('?r=historico/admin');
	}
}
