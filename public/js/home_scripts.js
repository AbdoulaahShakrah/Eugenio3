function session() {

    document.getElementById("create-session-button").addEventListener("click", function (e) {
        e.preventDefault();

        //prompt para colcoar a password
        var sessionName = prompt("Digite seu nome da sessão:");

        var password = prompt("Insira a password");

        if (password === "admin") { // Se a password estiver correta

            setTimeout(function () {
                document.getElementById("create-session-button").innerHTML = "Criar Sessão"; //Alteração do texto do botão depois da mensagem de sucesso ser apresentada
                document.getElementById("create-session-button").style.backgroundColor = ""; //Alteração da cor de background do botão da mensagem de sucesso ser apresentada
                //utilizar o post aqui com o endpoint para poder enviar o nome da sessao
                location.href = "/criar-sessao?sessionName=" + encodeURIComponent(sessionName);
                alert("sessao criada com sucesso");
                location.href = "/";
            }, 2000);
        } else { // Se a password estiver incorreta
            document.getElementById("create-session-button").innerHTML = "Senha incorreta"; //Alteração do texto do botão
            document.getElementById("create-session-button").style.backgroundColor = "red"; //Alteração da cor de background do botão

            setTimeout(function () {
                document.getElementById("create-session-button").innerHTML = "Criar Sessão"; //Alteração do texto do botão depois da mensagem de erro ser apresentada
                document.getElementById("create-session-button").style.backgroundColor = ""; //Alteração da cor de background do botão da mensagem de erro ser apresentada
            }, 2000);
        }
    });

}
