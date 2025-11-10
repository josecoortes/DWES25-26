<?php
namespace app\Models;
abstract class Cliente
{
    private string $nombre;
    private string $email;

    public function __construct(string $nombre, string $email)
    {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getnombre(): string
    {
        return $this->nombre;
    }

    public function getPrecio(): float
    {
        return $this->email;
    }

    public function setnombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setPrecio(string $email): void
    {
        $this->email = $email;
    }

    public function __toString()
    {
        return $this->nombre . " ( " . $this->email . " )<br>";
    }
}
