console.clear();
console.log('Loaded');

var API_URL = 'https://dai.vz-lab.com/api/exam/get/answer/';

document.addEventListener('keypress', function (event) {
    if (event.code == 'Backquote') {

        console.log('Key pressed');

        var
            uri = document.location.toString(),
            questionId = uri.split('#/')[1];

        if (questionId == '') {
            console.error('Can`t search question id');
            alert('Error: can`t search question id');
            return false;
        }

        var xhr = new XMLHttpRequest();

        xhr.open('POST', API_URL + questionId);
        xhr.responseType = 'json';
        xhr.send();

        xhr.onload = function () {
            var jsonResponse = xhr.response;

            if (jsonResponse.status == 'ok') {
                var answer = jsonResponse.answer;
                
                console.log('Answer: ' + answer);

                if (chooseAnswer(answer)) {
                    console.log('Answer selected');
                } else {
                    alert(answer);
                }
            } else {
                console.error(jsonResponse.result);
                alert(jsonResponse.result);
            }
        };
    }
});

function chooseAnswer(answerText) {
    var answers = document.getElementsByClassName('answers  ')[0].children;

    for (var i = 0; i < answers.length; i++) {
        var answer = answers[i];

        if (answer.querySelector('span').innerText.trim() == answerText.trim()) {
            answer.querySelector('input').click();
            return true;
        }
    }

    return false;
}