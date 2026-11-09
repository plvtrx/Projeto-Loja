
function manageProducts() {
    alert("Gerenciar Produtos clicado!");
    // Aqui você pode implementar a lógica para gerenciar produtos
}

function manageClients() {
    alert("Gerenciar Clientes clicado!");
    // Aqui você pode implementar a lógica para gerenciar clientes
}

let search = document.getElementById('search');

if (search) {
    search.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            searchData();
        }
    });
}

function searchData() {
    let search = document.getElementById('search');

    window.location = "admClientes.php?search=" +
        encodeURIComponent(search.value);
}
