function submitForm(event) {
    event.preventDefault();
  
    // ...
  
    fetch('../editProfile.action.php', {
      method: 'POST',
      body: new FormData(form)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(response.statusText);
      }
      return response.text();
    })
    .then(data => {
      if (data === 'O nome de usuário já está em uso.') {
        // Exibe a mensagem de erro na página
        errorMessage.innerText = data;
        errorMessage.style.display = 'block';
      } else {
        // Continua com a edição do perfil
        form.submit();
      }
    })
    .catch(error => {
      // Exibe uma mensagem de erro genérica se ocorrer um erro de rede
      errorMessage.innerText = 'Ocorreu um erro ao editar o perfil.';
      errorMessage.style.display = 'block';
    });
  }
  