btn1.addEventListener("click", () => {
    //console.log(text1.value);
    // var1 = parseFloat(text1.value);
    // var2 = parseFloat(text2.value);
    var1 = text1.value;
    var2 = text2.value;

    const select = document.querySelector('select').value;
    // switch (select) {
    //     case "value1":
    //         if ((isNaN(var1)) || (isNaN(var2))){    
    //             text3.value="-";
    //         }   
    //         else{
    //             text3.value=var1*var2;
    //         }
    //         break;
    //     case "value2":
    //         if ((isNaN(var1)) || (isNaN(var2))){
    //             text3.value="-";
    //         }
    //         else{
    //             text3.value=var1/var2;
    //         }
    //         break;
    //     case "value3":
    //         if ((isNaN(var1)) || (isNaN(var2))){
    //             text3.value="-";
    //         }
    //         else{
    //             text3.value=var1+var2;
    //         }
    //         break;
    //     case "value4":
    //         if ((isNaN(var1)) || (isNaN(var2))){
    //             text3.value="-";
    //         }
    //         else{
    //             text3.value=var1-var2;
    //         }
    //         break;
    //   }
    switch (select) {
        case "value1":
            text3.value = var1 * var2;
            break;
        case "value2":
            text3.value = var1 / var2;
            break;
        case "value3":
            text3.value = var1 + var2;
            break;
        case "value4":

            text3.value = var1 - var2;

            break;
    }

});

