window.onload = function () {
    var screen  = document.getElementById('screen'),
        keypad  = document.getElementById('keypad'),
        buttons = keypad.getElementsByTagName('button');

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].onclick = function () {
            if(this.value == "clear") {
                screen.value = null;
            } else {
                if (this.value == "BtnSign"){
                    //TODO: fix bug(if more than one number)
                    var array = screen.value.split("");
                    console.log(array);

                    var arrayLastElement = array[array.length-1];

                    if(array[array.length-2] == "-"){
                        array[array.length-1] = " (";
                        array[array.length-1] += arrayLastElement-arrayLastElement*2;
                        array[array.length-1] += ") ";
                    } else {
                        array[array.length-1] = arrayLastElement-arrayLastElement*2;
                    }

                    screen.value = array.join("");
                }else if (this.value) {
                    screen.value = screen.value + this.value;
                } else {
                    screen.value = screen.value + this.innerHTML;
                }
            }
            return false;
        };
    }
};