<?php
class Usuario {
    private $id;
    private $usuario;
    private $password;
    private $nombre;
	private $ap1;
	private $ap2;
	private $telefono;
    
    public function getId() {return $this->id; }
    public function getUsuario() {return $this->usuario; }
    public function getPassword() {return $this->password; }
    public function getNombre() {return $this->nombre; }
	public function getAp1() {return $this->ap1; }
	public function getAp2() {return $this->ap2; }
	public function getTelefono() {return $this->telefono; }

    public function __construct($row) {
        $this->id = $row['id'];
        $this->usuario = $row['usuario'];
        $this->password = $row['password'];
        $this->nombre = $row['nombre'];
		$this->ap1 = $row['ap1'];
		$this->ap2 = $row['ap2'];
		$this->telefono = $row['tfno'];
    }
}
?>
