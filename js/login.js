function iniciaModal(modalId) {
    const modal = document.getElementById(modalId)
    if (modal) {
        modal.classList.add('mostrar')
        modal.addEventListener('click', (e) => {
            if(e.target.id == modalId || e.target.id == 'fechar') {
                modal.classList.remove('mostrar')
            }
        })
    }
} 

const recuperar = document.getElementById('recSenha')

recuperar.addEventListener('click', () => {
    iniciaModal('modalRecuperarSenha')
})
