<?php
  include_once __DIR__ . '/layouts/general/header.php';
?>

<div id="datos-usuario"></div>

<!-- Modal para editar datos -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Datos del Usuario</h2>
        <form id="form-edit-user">
            <input type="hidden" id="edit-id" name="id">
            <label for="edit-user">Usuario:</label>
            <input type="text" id="edit-user" name="user" required>
            <label for="edit-nombres">Nombres:</label>
            <input type="text" id="edit-nombres" name="nombres" required>
            <label for="edit-apellidos">Apellidos:</label>
            <input type="text" id="edit-apellidos" name="apellidos" required>
            <label for="edit-email">Email:</label>
            <input type="email" id="edit-email" name="email" required>
            <label for="edit-telefono">Teléfono:</label>
            <input type="text" id="edit-telefono" name="telefono" required>
            <label for="edit-dni">DNI:</label>
            <input type="text" id="edit-dni" name="dni" required>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</div>

<?php
include_once __DIR__ . '/layouts/general/footer.php';
?>
<script src="mi_perfil.js"></script>