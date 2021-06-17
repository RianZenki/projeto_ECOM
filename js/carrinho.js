function concluirCompra() {
    const modal = document.getElementById('compraConcluida')
    modal.classList.add('mostrar')
    
    setTimeout(() => {
        window.location.href = "../views/index.php"
    }, 2000)
}
