<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="reto4.css">

<div class="container">
    <h1>Reto 4: Defiende tu Servidor</h1>
    <p>Asegura todos los servicios antes de que los atacantes comprometan el servidor. 
    Cuando todos estén protegidos, obtendrás la FLAG.</p>

    <table>
        <thead>
            <tr>
                <th>Puerto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="ports-table-body">
            <!-- Se llenará dinámicamente con reto4.js -->
        </tbody>
    </table>

    <h3>Logs de actividad</h3>
    <ul id="activity-log" class="logs"></ul>

    <div id="flag-box" class="flag"></div>
</div>

<script src="reto4.js"></script>
<?php include('../includes/footer.php'); ?>
