let imgAtual = 0
const imagens = document.getElementsByClassName('carrosselItem')

const imgTotal = imagens.length

function atualizaImagem() {
    for (let imagem of imagens) {
        imagem.classList.remove('itemVisivel')
        imagem.classList.add('itemInvisivel')
    }

    imagens[imgAtual].classList.add('itemVisivel')
}

document.getElementById('btnAnt')
    .addEventListener('click', () => {
        imgAtual = imgAtual === 0 ? imgTotal - 1 : imgAtual - 1   
        atualizaImagem()
})

document.getElementById('btnProx')
    .addEventListener('click', () => {
        imgAtual = imgAtual === imgTotal - 1 ? imgAtual = 0 : imgAtual + 1
        atualizaImagem() 
})
    
