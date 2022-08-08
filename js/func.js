// input type="text"의 필드 값 유효성을 체크하는 함수^^
function chkInputTypeText(selector, regex, errorMsg, isFocus) {
  let ele = document.querySelector(selector);
  let value = ele.value;
  if (regex.test(value)) {
    alert(errorMsg);
    isFocus && ele.focus(); // if문의 동작과 같음
    return false;
  }
  return true;
}

function wooniechkForm(options) {
    for (let i = 0; i < options.length; i++) {
    // 항목 체크
        if(options[i].type == 'text'){
            if (!chkInputTypeText(optionsp[i].selector, options[i].regex, options[i].errorMsg, options[i].isFocus)) {
                return false;
            }
        }
    }
  return true;
}
