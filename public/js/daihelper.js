"use strict";

console.clear();
console.log('Loaded');

const API_URL = 'https://dai.vz-lab.com/api/exam/get/answer/';

document.addEventListener('keypress', function (event) {
    if (event.code == 'Backquote') {

        console.log('Key pressed');

        let
            uri = document.location.toString(),
            questionId = uri.split('#/')[1];

        if (questionId == '') {
            console.error('Can`t search question id');
            alert('Error: can`t search question id');
            return false;
        }

        fetch(API_URL + questionId)
            .then(function (response) {
                return response.json();
            })
            .then(function (jsonResponse) {
                let answer = jsonResponse.answer;

                if (jsonResponse.status == 'ok') {
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
            });
    }
});

function chooseAnswer(answerText) {
    let answers = document.getElementsByClassName('answers  ')[0].children;

    for (let answer of answers) {
        if (answer.querySelector('span').innerText.trim() == answerText.trim()) {
            answer.querySelector('input').click();
            return true;
        }
    }

    return false;
}