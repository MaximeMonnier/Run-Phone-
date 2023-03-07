<?php
require_once './database/DBControler.php';

use PHPUnit\Framework\TestCase;

class DBControllerTest extends TestCase
{
    private $db;

    protected function setUp(): void
    {
        $this->db = new DBController();
    }

    protected function tearDown(): void
    {
        $this->db = null;
    }

    public function testConnection()
    {
        $this->assertInstanceOf(mysqli::class, $this->db->con);
    }
}
