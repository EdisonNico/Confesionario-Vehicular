function showTab(tabName) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => {
        tab.style.display = 'none'; // Ocultar todas las pestañas
    });
    document.getElementById(tabName + '-tab').style.display = 'block'; // Mostrar la pestaña seleccionada
}

document.addEventListener("DOMContentLoaded", obtenerCoches);

function obtenerCoches() {
    fetch('../controller/cochesadmincontroller.php?accion=listar')
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector("#tabla-coches tbody");
            tbody.innerHTML = "";

            data.forEach(coche => {
                const estatusLabel = coche.estatus === 'Disponible'
                    ? '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Disponible</span>'
                    : '<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Vendido</span>';

                const fila = `
                    <tr>
                        <td class="border px-6 py-4 whitespace-nowrap">${coche.id}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">
                            <img src="./imagenes/${coche.modelo.replace(/\s+/g, '')}.jpg" alt="Miniatura" style="height: 24px; width: auto;">
                        </td>
                        <td class="border px-6 py-4 whitespace-nowrap">${coche.modelo}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">${coche.marca}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">${coche.anio}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">$${Number(coche.precio).toLocaleString()}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">${estatusLabel}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">
                            <button onclick="editarCoche(${coche.id})" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fa-solid fa-pen-to-square" style="color: #0036e6ff;"></i></button>
                            <button onclick="eliminarCoche(${coche.id})" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash" style="color: #db0016;"></i></button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += fila;
            });
        });
}

function showhidecoches() {
    const form = document.querySelector(".formaddcoche");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}
function cerrarFormulario() {
    const form = document.getElementsByClassName("formaddcoche")[0];
    form.style.display = "none";

    document.getElementsByClassName("addcoche")[0].reset();
}

function agregarCoche() {

    const datos = {
        marca: document.getElementById("marca").value,
        modelo: document.getElementById("modelo").value,
        tipo: document.getElementById("tipo").value,
        kilometraje: document.getElementById("kilometraje").value,
        anio: document.getElementById("anio").value,
        precio: document.getElementById("precio").value,
        estatus: document.getElementById("estatus").value
    };

    fetch('../controller/cochesadmincontroller.php?accion=agregar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
        .then(res => res.json())
        .then(data => {
            console.log("Vehículo agregado:", data);
            obtenerCoches(); // recarga la tabla
        })
        .catch(error => console.error('Error al agregar vehículo:', error));
}

function confirmarCoche() {
    const id = document.getElementById("id-coche").value;

    const datos = {
        id,
        marca: document.getElementById("marca").value,
        modelo: document.getElementById("modelo").value,
        tipo: document.getElementById("tipo").value,
        kilometraje: document.getElementById("kilometraje").value,
        anio: document.getElementById("anio").value,
        precio: document.getElementById("precio").value,
        estatus: document.getElementById("estatus").value
    };

    const url = id ? '../controller/cochesadmincontroller.php?accion=actualizar'
        : '../controller/cochesadmincontroller.php?accion=agregar';

    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
        .then(res => res.json())
        .then(() => {
            obtenerCoches(); // actualiza tabla
            resetFormulario(); // limpia formulario
        })
        .catch(error => console.error('Error:', error));
}
function editarCoche(id) {
    fetch(`../controller/cochesadmincontroller.php?accion=listar`)
        .then(response => response.json())
        .then(data => {
            const coche = data.find(c => c.id === id);
            if (coche) {
                document.getElementById("id-coche").value = coche.id;
                document.getElementById("marca").value = coche.marca;
                document.getElementById("modelo").value = coche.modelo;
                document.getElementById("tipo").value = coche.tipo;
                document.getElementById("kilometraje").value = coche.kilometraje;
                document.getElementById("anio").value = coche.anio;
                document.getElementById("precio").value = coche.precio;
                document.getElementById("estatus").value = coche.estatus;

                document.querySelector(".formaddcoche").style.display = "block";
            }
        });
}

function eliminarCoche(id) {
    if (confirm("¿Seguro que deseas eliminar este coche?")) {
        fetch(`../controller/cochesadmincontroller.php?accion=eliminar&id=${id}`)
            .then(res => res.json())
            .then(() => obtenerCoches());
    }
}
/*
funciones tabla usuarios */
document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM cargado");
  obtenerUsuarios();
});

function obtenerUsuarios() {
    fetch('../controller/usuariosadmincontroller.php?accion=listar')
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector("#tabla-usuarios tbody");
            tbody.innerHTML = "";

            data.forEach(usuario => {
                const rolLabel = usuario.rol === 'Cliente'
                    ? '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Cliente</span>'
                    : '<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Admin</span>';

                const fila = `
                    <tr>
                        <td class="border px-6 py-4 whitespace-nowrap">${usuario.id}</td>
                        
                        <td class="border px-6 py-4 whitespace-nowrap">${usuario.nombre}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">${usuario.correo}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">${rolLabel}</td>
                        <td class="border px-6 py-4 whitespace-nowrap">
                            <button onclick="editarUsuario(${usuario.id})" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fa-solid fa-pen-to-square" style="color: #0036e6ff;"></i></button>
                            <button onclick="eliminarUsuario(${usuario.id})" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash" style="color: #db0016;"></i></button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += fila;
            });
        });
}

function showhidesuario() {
    const form = document.querySelector(".formaddusuario");
    form.style.display = (form.style.display === "block") ? "none" : "block";
}
function cerrarFormulario() {
    const form = document.getElementsByClassName("formaddusuario")[0];
    form.style.display = "none";

    document.getElementsByClassName("addusuario")[0].reset();
}
/*
function agregarUsuario() {

    const datos = {
        nombre: document.getElementById("nombre").value,
        correo: document.getElementById("correo").value,
        contrasenia: document.getElementById("contrasenia").value,
        rol: document.getElementById("rol").value
    };

    fetch('../controller/usuariosadmincontroller.php?accion=agregar', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
        .then(res => res.json())
        .then(data => {
            console.log("Usuario agregado:", data);
            obtenerUsuarios(); // recarga la tabla
        })
        .catch(error => console.error('Error al agregar Usuario:', error));
}*/

function confirmarUsuario() {
    const id = document.getElementById("id-usuario").value;

    const datos = {
        id,
        nombre: document.getElementById("nombre").value,
        correo: document.getElementById("correo").value,
        contrasenia: document.getElementById("contrasenia").value,
        rol: document.getElementById("rol").value
    };

    const url = id ? '../controller/usuariosadmincontroller.php?accion=actualizar'
        : '../controller/usuariosadmincontroller.php?accion=agregar';

    fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos)
    })
        .then(res => res.json())
        .then(() => {
            obtenerUsuarios(); // actualiza tabla
            cerrarFormulario();

        })
        .catch(error => console.error('Error:', error));
}

function editarUsuario(id) {
    fetch(`../controller/usuariosadmincontroller.php?accion=listar`)
        .then(response => response.json())
        .then(data => {
            const usuario = data.find(c => c.id === id);
            if (usuario) {
                document.getElementById("id-usuario").value = usuario.id;
                document.getElementById("nombre").value = usuario.nombre;
                document.getElementById("correo").value = usuario.correo;
                document.getElementById("contasenia").value = usuario.contrasenia;
                document.getElementById("rol").value = usuario.rol;

                document.querySelector(".formaddusuario").style.display = "block";
            }
        });
}

function eliminarUsuario(id) {
    if (confirm("¿Seguro que deseas eliminar este coche?")) {
        fetch(`../controller/usuariosadmincontroller.php?accion=eliminar&id=${id}`)
            .then(res => res.json())
            .then(() => obtenerUsuarios());
    }
}


