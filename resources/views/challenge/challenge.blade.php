<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body class="bg-light">

    <div class="main-container-desafio">

        <div class="d-flex flex-column justify-content-center align-items-center h-100 p-4">

            <!-- Título -->
            <div class="h1-title-container mb-4">
                <h1 class="display-4 text-primary text-center font-weight-bold">
                    {{ $configuracao->configuration_title }} | {{ $jogador->player_name }}
                </h1>
            </div>

            <!-- Contador de Tempo -->
            <div class="w-75 mb-4">
                <p id="time" class="text-center text-xl text-dark font-weight-bold mt-3">
                    <span class="rounded-circle border-4 border-dark p-4">{{ $tempo_config }}</span>
                </p>
            </div>

            <!-- WPM e Texto do Desafio -->
            <div class="w-75 mb-4 text-center">
                <p id="wpm" class="text-4xl text-dark font-weight-bold mt-5"></p>
                <p id="inputValueDivided" class="text-4xl text-dark font-weight-bold mt-5"></p>
                <p id="expected-text" class="text-dark font-weight-bold fs-3 mt-4">{{ $configuracao->configuration_text }}</p>
            </div>

            <!-- Área de Texto para Digitação -->
            <textarea placeholder="Assim que clicar na área de texto, o tempo começará a ser descontado!"
                id="input-text" class="form-control w-75 mx-auto h-64 p-3 text-xl border border-primary mt-4"></textarea>

            <!-- Botão para Terminar o Desafio -->
            <button class="btn btn-success btn-lg mt-4 w-75" id="terminar">
                Terminar Desafio
            </button>
        </div>
    </div>

    <!--Script para verificação de erros e acertos do teste-->
    <script>
        let CORRECT_WORDS = 0;
        let INCORRECT_WORDS = 0;
        let WPM = 0;
        let TIME_PASSED = 0;
        let PONTUACAO_FINAL = 0;
        const PK_Configuracao = "{{ $configuracao->configuration_id }}";
        const PK_Jogador = "{{ $jogador->player_id }}";
        const PK_Session = "{{ $session->session_id }}";
        let textoComCertasErradas = "";
        let intervalId;
        //let wordCount = 0;

        const expectedText = document.querySelector("#expected-text").innerText;
        const inputText = document.querySelector("#input-text");
        const expectedTextContainer = document.querySelector("#expected-text");


        inputText.addEventListener("input", function() {
            const inputValue = inputText.value.trim();

            let correctWords = 0;
            let incorrectWords = 0;
            let expectedTextWithStyles = "";

            const PUNCTUATION = /[.,!?;:"']/g; // Expressão regular para remover pontuação
            const expectedWords = expectedText.split(/\s+/); // Divide o texto esperado em palavras
            const inputWords = inputValue.split(/\s+/); // Divide o texto digitado em palavras

            let expectedIndex = 0;
            let inputIndex = 0;

            while (expectedIndex < expectedWords.length) {
                let expectedWord = expectedWords[expectedIndex];
                let cleanExpectedWord = expectedWord.replace(PUNCTUATION, ""); // Remove pontuação apenas para verificação
                let inputWord = inputWords[inputIndex] || ""; // Palavra digitada (ou vazia se não digitada)
                let cleanInputWord = inputWord.replace(PUNCTUATION, ""); // Remove pontuação para comparação

                if (cleanInputWord === cleanExpectedWord) {
                    // Palavra correta → Verde
                    expectedTextWithStyles += `<span">${expectedWord}</span> `;
                    correctWords++;
                    inputIndex++; // Avança no input
                } else if (inputWord === "") {
                    // Palavra ausente → Vermelha
                    expectedTextWithStyles += `<span">${expectedWord}</span> `;
                    incorrectWords++;
                } else {
                    // Palavra errada → Cada caractere avaliado
                    for (let i = 0; i < expectedWord.length; i++) {
                        if (i < inputWord.length && inputWord[i] === expectedWord[i]) {
                            expectedTextWithStyles += `<span>${expectedWord[i]}</span>`;
                        } else {
                            expectedTextWithStyles += `<span>${expectedWord[i]}</span>`;
                        }
                    }
                        
                    expectedTextWithStyles += " "; // Adiciona espaço no final da palavra
                    incorrectWords++;
                    inputIndex++; // Avança no input
                }

                expectedIndex++; // Avança no texto esperado
            }

            // Atualiza os contadores globais
            CORRECT_WORDS = correctWords;
            INCORRECT_WORDS = incorrectWords;

            // Atualiza o texto esperado com cores corretas
            expectedTextContainer.innerHTML = expectedTextWithStyles.trim();
        });








        document.getElementById("terminar").addEventListener("click", function() {
            window.location.href = `/challenge/result?wpm=${WPM}&correctWords=${CORRECT_WORDS}&incorrectWords=${INCORRECT_WORDS}&timePassed=${TIME_PASSED}&pontuacaoFinal=${PONTUACAO_FINAL}&session=${PK_Session}&jogador=${PK_Jogador}&configuracao=${PK_Configuracao}&expectedTextWithStyles=${textoComCertasErradas}`;
        });

        inputText.addEventListener("focus", function() {
            if (intervalId) {
                return;
            }

            const timeDisplay = document.querySelector("#time");
            const time = "{{ $configuracao->configuration_time }}"; // pega o valor da variável
            const timeArray = time.split(":"); // divide o tempo em horas, minutos e segundos
            let totalSeconds = parseInt(timeArray[0]) * 3600 + parseInt(timeArray[1]) * 60 + parseInt(timeArray[2]); // converte para segundos

            let startCronoSeconds = totalSeconds;

            intervalId = setInterval(function() {
                totalSeconds--; // decrementa o número de segundos
                let hours = Math.floor(totalSeconds / 3600); // converte para horas
                let minutes = Math.floor((totalSeconds - hours * 3600) / 60); // converte para minutos
                let seconds = totalSeconds - (hours * 3600 + minutes * 60); // segundos restantes
                // atualiza a exibição do tempo com os novos valores
                timeDisplay.innerHTML = `<span class="rounded-circle border-4 border-dark p-4">${("0" + minutes).slice(-2)}:${("0" + seconds).slice(-2)}</span>`;
                if (totalSeconds === 0) {
                    clearInterval(intervalId); // para a contagem quando chegar a zero
                    intervalId = null;
                    window.location.href = `/challenge/result?wpm=${WPM}&correctWords=${CORRECT_WORDS}&incorrectWords=${INCORRECT_WORDS}&timePassed=${TIME_PASSED}&pontuacaoFinal=${PONTUACAO_FINAL}&session=${PK_Session}&jogador=${PK_Jogador}&configuracao=${PK_Configuracao}`;
                }

                // Calcula o número de WPM
                const wpm = Math.round(CORRECT_WORDS / ((startCronoSeconds - totalSeconds) / 60));

                // VARIÁVEL PARA PASSAR wpm
                // VARIÁVEL DE TEMPO PASSADO PARA PASSAR totalSeconds
                // VARIÁVEL DE PALAVRAS CORRETAS correctWords
                // VARIÁVEL DE PALAVRAS INCORRETAS incorrectWords
                WPM = wpm;
                TIME_PASSED = formatTime(startCronoSeconds - totalSeconds);
                console.log(TIME_PASSED);

                let pontuacaoFinal = WPM + (CORRECT_WORDS * 10) - (INCORRECT_WORDS * 5);

                PONTUACAO_FINAL = pontuacaoFinal;

            }, 1000);
        });

        function formatTime(seconds) {
            let m = Math.floor(seconds % 3600 / 60);
            let s = Math.floor(seconds % 60);
            return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>