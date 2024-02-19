const button = document.querySelector('button');
const popup = document.querySelector('.popup')
button.addEventListener('click',()=>{
    popup.classList.add('active');
    popup.querySelector('.popup-close').addEventListener('click', ()=>{
        popup.classList.remove('active')
        
    })
})