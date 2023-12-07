const kraj = document.querySelector('.kraj')
const sport = document.querySelector('.sport')
const aktualnosci = document.querySelector('.aktualnosci')
const ogloszenia = document.querySelector('.ogloszenia')
const artykuly = document.querySelectorAll('.artykul')
const art1 = document.querySelector('#art1')
const art2 = document.querySelector('#art2')
const art3 = document.querySelector('#art3')
const art4 = document.querySelector('#art4')

kraj.addEventListener('click', () => {
    artykuly.forEach(item => {
        item.style.display = 'none'
    })

    art1.style.display = 'block'
})

sport.addEventListener('click', () => {
    artykuly.forEach(item => {
        item.style.display = 'none'
    })

    art2.style.display = 'block'
})

aktualnosci.addEventListener('click', () => {
    artykuly.forEach(item => {
        item.style.display = 'none'
    })

    art3.style.display = 'block'
})

ogloszenia.addEventListener('click', () => {
    artykuly.forEach(item => {
        item.style.display = 'none'
    })

    art4.style.display = 'block'
})