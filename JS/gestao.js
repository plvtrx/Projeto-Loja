function manageProducts() {
    alert("Gerenciar Produtos clicado!");
    // Aqui você pode implementar a lógica para gerenciar produtos
}

function manageClients() {
    alert("Gerenciar Clientes clicado!");
    // Aqui você pode implementar a lógica para gerenciar clientes
}

let search = document.getElementById('search');

search.addEventListener('keydown', (e)=>{
    if (event.key === "Enter"){
        searchData();
    }
})

function searchData(){
    window.location ="admClientes.php?search="+search.value;
}