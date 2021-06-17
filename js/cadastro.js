function validar() {
   
    if (txtNome.value.length <= 3) {
        alert('Digite seu nome completo')
        txtNome.focus()
        return
    }

    if (txtEmail.value.length < 6 || txtEmail.value.indexOf("@") <=0 || txtEmail.value.lastIndexOf(".") <= txtEmail.value.indexOf("@") + 1) {
        alert("Digite o email corretamente")
        txtEmail.focus()
        return
    }

    if (txtSenha.value.length < 6) {
        alert("Digite uma senha com pelo menos 6 caracteres")
        txtSenha.focus()
        return
    }

    if (txtSenhaConf.value.length < 6 || txtSenha.value !== txtSenhaConf.value) {
        alert("Senhas Incompatível")
        txtSenhaConf.focus()
        return
    }

    if (txtCpf.value.length != 14 || txtCpf.value.indexOf(".") != 3 || txtCpf.value.indexOf(".", 4) != 7 || txtCpf.value.indexOf("-") != 11 ) {
        alert("Digite um cpf no formato (xxx.xxx.xxx-xx)")
        txtCpf.focus()
        return
    }
    
    if (txtData.value == '') {
        alert("Digite a data de nascimento")
        txtCpf.focus()
        return
    }

    if (txtFone.value != '' && (txtFone.value.length != 10 || txtFone.value.indexOf("-") != 5)) {
        alert("Digite um telefone no padrão (99999-9999)")
        txtFone.focus()
        return
    }
  
    const modal = document.getElementById('cadastroConcluido')
    modal.classList.add('mostrar')
    
    setTimeout(() => {
        window.location.href = "../views/login.html"
    }, 2000)

}