
let $inputs = document.querySelectorAll('#question-card.d-flex input');

let $arrowRight = document.querySelector('#arrow-right');
let $arrowLeft = document.querySelector('#arrow-left');

let $questionCardDisplayFlex = document.querySelector('#question-card.d-flex');


function onRadioClick(e) {
    $arrowRight.disabled = false;
}
$inputs.forEach(input => {
    input.addEventListener('click', onRadioClick);
});

$arrowRight.addEventListener('click', event => {
    $arrowLeft.disabled = false;

    $questionCardDisplayFlex.setAttribute('class', 'd-none');
    $questionCardDisplayFlex.nextElementSibling.setAttribute('class', 'd-flex flex-column');
  
    $inputs.forEach(input => {
        input.removeEventListener('click', onRadioClick);
    }); 

    $inputs = document.querySelectorAll('#question-card.d-flex input');

    $isOneInputChecked = false;
    $inputs.forEach(input => {
        if(input.checked === true) {
            $isOneInputChecked = true;
        } 
    });

    if($isOneInputChecked === true && $inputs[$inputs.length - 1].getAttribute('value') !== 'Submit') {
        $arrowRight.disabled = false;
    } else {
        $arrowRight.disabled = true;
    }

    if($inputs[$inputs.length - 1].getAttribute('value') !== 'Submit') {    
        $inputs.forEach(input => {
            input.addEventListener('click', onRadioClick);
        });
    }
   
    $questionCardDisplayFlex = document.querySelector('#question-card.d-flex');
});

$arrowLeft.addEventListener('click', event => {
    $questionCardDisplayFlex.previousElementSibling.setAttribute('class', 'd-flex flex-column');
    $questionCardDisplayFlex.setAttribute('class', 'd-none');

    if($questionCardDisplayFlex.firstElementChild.getAttribute('id') === 'question-1') {
        $arrowLeft.disabled = true;
    } else {
        $arrowLeft.disabled = false;
    }

    $arrowRight.disabled = false;

    $questionCardDisplayFlex = document.querySelector('#question-card.d-flex');
});



