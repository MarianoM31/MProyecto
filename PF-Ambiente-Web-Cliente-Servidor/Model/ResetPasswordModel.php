<?php
class ResetPasswordModel {
    private $db;

    public function __construct() {
        
        $this->db = new mysqli('localhost', 'usuario', 'contraseña', 'tu_base_de_datos');
    }

    public function buscarPorToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE reset_token = ? AND reset_expiry > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarContrasena($correo, $nuevaContrasena) {
        $stmt = $this->db->prepare("UPDATE usuarios SET Contrasena = ?, reset_token = NULL, reset_expiry = NULL WHERE Correo_Electronico = ?");
        $stmt->bind_param("ss", $nuevaContrasena, $correo);
        $stmt->execute();
    }
}
?>
