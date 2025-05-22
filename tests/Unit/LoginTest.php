<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        // Limpia sesión y entorno para cada test
        $_SESSION = [];
        $_POST = [];
        $_SERVER['REQUEST_METHOD'] = 'POST';
        session_start();
    }

    public function testLoginExitosoGeneraSesion()
    {
        // Credenciales válidas que existan en tu BD
        $_POST['username'] = 'hector';
        $_POST['password'] = '1234';

        // Captura headers y evita redirección
        ob_start();
        include __DIR__ . '/../myapi/login.php';
        ob_end_clean();

        // Verifica que la sesión fue establecida
        $this->assertArrayHasKey('user_id', $_SESSION);
        $this->assertArrayHasKey('username', $_SESSION);
    }

    public function testLoginFallidoNoGeneraSesion()
    {
        $_POST['username'] = 'usuario@falso.com';
        $_POST['password'] = 'clave_invalida';

        ob_start();
        include __DIR__ . '/../myapi/login.php';
        ob_end_clean();

        // Verifica que la sesión NO fue establecida
        $this->assertArrayNotHasKey('user_id', $_SESSION);
        $this->assertArrayNotHasKey('username', $_SESSION);
    }
}
