<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@1.8.3/dist/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

</head>
<body>
    <div class="main-container-desafio">
        <div class="main-menu-btn">
            <a href="/">
                <button type="button"
                        class="mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
                    Ir para o Menu Inicial
                </button>
            </a>
        </div>

        <div class="flex flex-col items-center h-screen w-full">
            <div class="h1-title-container">
                <h1 class="text-5xl font-bold text-blue-700 text-center">
                    {{ $configuracao->configuration_title }} | {{ $jogador->player_name }}</h1>
            </div>
            <div class="w-2/3 mt-10">
                <p id="time" class="text-center text-2xl text-gray-800 font-medium mt-1"><span
                    class="rounded-full border-4 border-black p-4 border-dashed border-gray-800">{{ $tempo_config }}</span>
                </p>
                <p id="wpm" class="text-center text-4xl text-gray-800 font-medium mt-5"><span></span></p>
                <p id="inputValueDivided" class="text-center text-4xl text-gray-800 font-medium mt-5"><span></span></p>

                <p id="expected-text" class="text-gray-800 font-bold text-xl mt-10">{{ $configuracao->configuration_text }}</p>
                <textarea placeholder="Assim que clicar na àrea de texto, o tempo começará a ser descontado!"
                    id="input-text" class="w-full h-64 p-5 border border-gray-400 mt-5 text-2xl"
                    id="texto"></textarea>
            </div>

            <button class="mt-4 bg-green-500 hover:bg-green-600
                text-white font-bold py-2 px-4 rounded-full"
                id="terminar">
                Terminar Desafio
            </button>
        </div>
    </div>

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

        const expectedText = document.querySelector("#expected-text").innerText;
        const inputText = document.querySelector("#input-text");
        const expectedTextContainer = document.querySelector("#expected-text");

        inputText.addEventListener("input", function () {
            const inputValue = inputText.value;

            let expectedTextWithStyles = "";

            for (let i = 0; i < expectedText.length; i++) {
                if (i < inputValue.length) {
                    if (inputValue[i] === expectedText[i]) {
                        expectedTextWithStyles += `<span style="color: green;">${expectedText[i]}</span>`;
                    } else if (inputValue[i] !== ' ' && expectedText[i] === ' ') {
                        expectedTextWithStyles += `<span style="background-color: red;">${expectedText[i]}</span>`;
                    } else {
                        expectedTextWithStyles += `<span style="color: red;">${expectedText[i]}</span>`;
                    }
                } else {
                    expectedTextWithStyles += expectedText[i];
                }
            }
            expectedTextContainer.innerHTML = expectedTextWithStyles;
            textoComCertasErradas = expectedTextWithStyles;
        });

        let intervalId;
        let wordCount = 0;

        inputText.addEventListener("input", function () {
            const inputValue = inputText.value;
            const inputValueDividedView = document.querySelector("#inputValueDivided");
            let inputWords = inputValue.split(" ");
            wordCount = inputWords.length;
            const expectedWords = expectedText.split(" ");
            correctWords = 0;
            incorrectWords = 0;

            for (let i = 0; i < expectedWords.length; i++) {
                if (expectedWords[i] === inputWords[i]) {
                    correctWords++;
                } else {
                    incorrectWords++;
                }
                CORRECT_WORDS = correctWords;
                INCORRECT_WORDS = incorrectWords;
            }
        });

        document.getElementById("terminar").addEventListener("click", function () {
            window.location.href = `/challenge/result?wpm=${WPM}&correctWords=${CORRECT_WORDS}&incorrectWords=${INCORRECT_WORDS}&timePassed=${TIME_PASSED}&pontuacaoFinal=${PONTUACAO_FINAL}&session=${PK_Session}&jogador=${PK_Jogador}&configuracao=${PK_Configuracao}&expectedTextWithStyles=${textoComCertasErradas}`;
        });

        inputText.addEventListener("focus", function () {
            if (intervalId) {
                return;
            }

            const timeDisplay = document.querySelector("#time");
            const time = "{{ $configuracao->configuration_time }}"; // pega o valor da variável
            const timeArray = time.split(":"); // divide o tempo em horas, minutos e segundos
            let totalSeconds = parseInt(timeArray[0]) * 3600 + parseInt(timeArray[1]) * 60 + parseInt(timeArray[2]); // converte para segundos
            
            let startCronoSeconds = totalSeconds;

            intervalId = setInterval(function () {
                totalSeconds--; // decrementa o número de segundos
                let hours = Math.floor(totalSeconds / 3600); // converte para horas
                let minutes = Math.floor((totalSeconds - hours * 3600) / 60); // converte para minutos
                let seconds = totalSeconds - (hours * 3600 + minutes * 60); // segundos restantes
                // atualiza a exibição do tempo com os novos valores
                timeDisplay.innerHTML = `<span class="rounded-full border-4 border-black p-4 border-dashed border-gray-800">${("0" + minutes).slice(-2)}:${("0" + seconds).slice(-2)}</span>`;
                if (totalSeconds === 0) {
                    clearInterval(intervalId); // para a contagem quando chegar a zero
                    intervalId = null;
                    window.location.href = `/challenge/result?wpm=${WPM}&correctWords=${CORRECT_WORDS}&incorrectWords=${INCORRECT_WORDS}&timePassed=${TIME_PASSED}&pontuacaoFinal=${PONTUACAO_FINAL}&session=${PK_Session}&jogador=${PK_Jogador}&configuracao=${PK_Configuracao}`;
                }

                // Calcula o número de WPM
                const wpm = Math.round(wordCount / ((startCronoSeconds - totalSeconds) / 60));

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
</body>
</html>
