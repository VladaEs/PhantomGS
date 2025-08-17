document.addEventListener('DOMContentLoaded', function () {
    let labels = document.querySelectorAll('.SelectLabels');
    let amountPages = document.querySelectorAll('.PagesSelect');
    let priceFilter= document.querySelector('.priceFilter');
    let dateFilter= document.querySelector('.dateFilter');
    selectHandler(labels);
    selectPagesHandler(amountPages);
    priceDateFilterHandler(priceFilter, dateFilter);
    arrowPrice();
})

function selectHandler(labels) { // category filters handler
    let anchor = document.querySelector('.anchor');
    let height = labels[0].offsetHeight * labels.length;
    let itemsWrapper = document.querySelector('.items');
    let isHidden = false;
    itemsWrapper.style.display = 'none'; // set initial display as none to not show filters on top of the page

    anchor.addEventListener('click', () => {
        let calc = isHidden ? Number((height) * (-1)) : (0);
        console.log(calc)
        isHidden = !isHidden;
        itemsWrapper.style.display = 'flex';
        for (let i = 0; i < labels.length; i++) {
            labels[i].style.transform = 'translateY(' + calc + 'px)';
        }
        setTimeout(() => {
            !isHidden ? itemsWrapper.style.display = 'none' : itemsWrapper.style.display = 'flex';
        }, 300);
    })
    for (let i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function (event) {
            if (i === 0) {
                for (let k = 1; k < labels.length; k++) {
                    let checkbox = labels[k].querySelector('input[type="checkbox"]');
                    labels[k].classList.remove('activeSelect');
                    checkbox.checked = false;
                }
                labels[i].classList.add('activeSelect');
                return
            }
            labels[0].classList.remove('activeSelect');
            labels[i].classList.toggle('activeSelect');

        })

        let checkbox = labels[i].querySelector('input[type="checkbox"]');
        checkbox.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    }
}

function selectPagesHandler(amountPages) {
    
    amountPages.forEach((item) => {
        item.addEventListener('click', function (event) {
            amountPages.forEach(page => {
                page.classList.remove('activeSelect');
            })
            item.classList.add('activeSelect');
        });
    });
    let pagesWrapper = document.querySelector('.pages');
    let height = amountPages[0].offsetHeight * amountPages.length;
    let isHidden = false;
    let calc = Number(height * (-1));
    for (let i = 0; i < amountPages.length; i++) {
        amountPages[i].style.transform = 'translateY(' + calc + 'px)';
    }

    pagesWrapper.addEventListener('click', (event) => {
        event.stopPropagation();
        calc = isHidden ? Number(height * (-1)) : (0);
        console.log(calc)
        isHidden = !isHidden;
        for (let i = 0; i < amountPages.length; i++) {
            amountPages[i].style.transform = 'translateY(' + calc + 'px)';
        }
    })
}

function priceDateFilterHandler(priceUp, date){
    let priceUpState = 3;
    let dateState = 3;
            priceUp.addEventListener('click', function () {
            page = 1;
            if (priceUpState === null) {
                priceUpState = 3;
            }
            else {
                priceUpState = !priceUpState ? 1 : 0;
            }
                
                
        });
        date.addEventListener("click", function () {
            page = 1;
            if (dateState === null) {
                dateState = 3;
            }
            else {
                dateState = !dateState ? 1 : 0;
            }
           
        });
}

function arrowPrice() {// обработчик фильтра цены(вверх- вниз)
    let arrow = document.querySelectorAll('.arrowChange');
    let priceText = document.querySelectorAll('.filterSection');
    priceText.forEach(item => {
        item.addEventListener('click', function () {
            for (let i = 0; i < arrow.length; i++) {
                if (arrow[i].classList.contains('price') && item.contains(arrow[i])) {
                    arrow[i].classList.toggle('activeArrow');
                    return;
                }
                if (arrow[i].classList.contains('date') && item.contains(arrow[i])) {
                    arrow[i].classList.toggle('activeArrow');
                    return
                }
            }
        })
    })
}