document.addEventListener("DOMContentLoaded", function(){
    
        const button = document.querySelector('button');
        const popup = document.querySelector('.popup')
        button.addEventListener('click',()=>{
            popup.classList.add('active');
            popup.querySelector('.popup-close').addEventListener('click', ()=>{
                popup.classList.remove('active')
            })
        })



        let phoneValue = document.querySelector("#phone")
        
        let getNumbersPhone = function(input){
            return input.value.replace(/\D/g,"")
        }
        
        let onPhoneValueInput = function(e){
            let input = e.target,
                inputNumbers = getNumbersPhone(input),
                outputNumbers='';
                input.value = inputNumbers;
                if (['7','8'].includes(inputNumbers[0])) {
                    outputNumbers+='+7 ('
                }
                if(inputNumbers.length > 1) {
                    outputNumbers += inputNumbers.substring(1, 4)
                }
                if (inputNumbers.length > 3) {
                    outputNumbers += ') ' + inputNumbers.substring(4, 7);
                }
                if (inputNumbers.length > 6) {
                    outputNumbers += '-' + inputNumbers.substring(7, 9);
                }
                if (inputNumbers.length > 8) {
                    outputNumbers += '-' + inputNumbers.substring(9, 11);
                }
                if (inputNumbers.length > 11) {
                    return input.value = outputNumbers;
                }
           
            input.value = outputNumbers;
        }

        phoneValue.addEventListener("input", onPhoneValueInput)

});