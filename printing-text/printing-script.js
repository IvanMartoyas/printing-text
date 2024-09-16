function printing_text(id, text) {
        
    let Text = document.getElementById(id);
    Text.classList.add('.textPrint'); // добавляю класс со стилями

    let line = 0;
    let count = 0;
    let result = '';

    function typeLine() {
        let interval = setTimeout(
        () => {
            result += text[line][count]
            Text.innerHTML =result +'|';


        count++;
        if (count >= text[line].length) {
            count = 0;
            line++;
            if (line == text.length) {
            clearTimeout(interval);
            Text.innerHTML =result;
            return true;
            }
        }
        typeLine();
        }, getRandomInt(getRandomInt(250*2.5)))
    }

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }

    typeLine();
}