document.addEventListener('DOMContentLoaded', function () {
    let labels = document.querySelectorAll('.SelectLabels');
    let amountPages = document.querySelectorAll('.PagesSelect');
    let priceFilter= document.querySelector('.priceFilter');
    let dateFilter= document.querySelector('.dateFilter');
    sessionStorage.setItem('CurrentRequestPage', 0);// set the page number to 0
    selectHandler(labels);
    selectPagesHandler(amountPages);
    priceDateFilterHandler(priceFilter, dateFilter);
    arrowPrice();
    loadItems();
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

function loadItems(){
    intersectionObserver();
    let category= [];
    let price= "ASC";
    let date = "ASC";
    let limit = 10;
    let selectLabels= document.querySelectorAll('.SelectLabels');
    selectLabels.forEach(item=> 
        item.addEventListener('click', function(){
            let dataId = Number(item.getAttribute('data-id'));
            if(dataId == 0){
                category.length = 0;
                category = [0];
            }
            else if(!category.includes(dataId)){
                if(category[0]==0){
                    category = [];
                }
                category.push(dataId);
            }
            else{
                let index = category.indexOf(dataId);
                if(index > -1){
                    category.splice(index, 1);
                }
            }
            sessionStorage.setItem("CurrentRequestPage", 1); 
            let params = buildBodyRequest();
            sendRequest(params).then(items =>{
                drawItems(items, true);
            });
            
    }));

    let priceFilter = document.querySelector('.priceFilter');
    priceFilter.addEventListener('click', function(){
        price = price == "ASC" ? "DESC" : "ASC" ;
        sessionStorage.setItem("CurrentRequestPage", 1); 
        let params = buildBodyRequest();
        sendRequest(params).then(items =>{
            drawItems(items, true);
        });
    });
    let dateFilter = document.querySelector('.dateFilter');
    dateFilter.addEventListener('click', function(){
       date =  date == "ASC" ? "DESC" : "ASC";
       sessionStorage.setItem("CurrentRequestPage", 1); 
       let params = buildBodyRequest();
            sendRequest(params).then(items =>{
                drawItems(items, true);
            });
            
    });

    let selectPages= document.querySelectorAll('.PagesSelect');
    selectPages.forEach(item=>{
        item.addEventListener('click', function(){
            sessionStorage.setItem("CurrentRequestPage", 1); 
            let pagesAmount = item.getAttribute('data-pageAmount');
            if(limit> 100){ // prevent database overload
                return;
            }
            limit = pagesAmount;
            let params = buildBodyRequest();
            sendRequest(params).then(items =>{
                drawItems(items, true);
            });
            
        }, {once: true});
    });


        function intersectionObserver() {
        const loadingLabel = document.querySelector('.intersectionObserverDiv');
        loadingLabel.style.display = "flex";
        const options = {
            root: null,
            rootMargin: "0px",
            threshold: 0.9,
        }
        const observer = new IntersectionObserver(handleLoad, options);
        observer.observe(loadingLabel);
    }
    function handleLoad(loadingTrigger, observer) {
        if (loadingTrigger[0].intersectionRatio > 0.9) {
            if(sessionStorage.getItem("CurrentRequestPage")== null){
                sessionStorage.setItem("CurrentRequestPage", 1); 
            }
            else{
                let currState = Number(sessionStorage.getItem("CurrentRequestPage"));
                console.log(currState);
                sessionStorage.setItem("CurrentRequestPage", currState+1); 
            }    
           let params = buildBodyRequest();
            sendRequest(params).then(items =>{
                drawItems(items);
                let loadingLabel = document.querySelector('.intersectionObserverDiv');
                 if(Array.isArray(items) && items.length === 0){
                        
                        loadingLabel.textContent= "No more items left";
                        return;
                    }
                loadingLabel.textContent= "Loading ...";
            });
        }
    }


    function buildBodyRequest(){
        const params = new URLSearchParams();
        let page = sessionStorage.getItem('CurrentRequestPage') === null ? 1 : sessionStorage.getItem('CurrentRequestPage');
        
        // Handle arrays like category
        category.forEach(c => params.append("category[]", c));
        params.append("price", price);
        params.append("date", date);
        params.append("limit", limit);
        params.append("page", page);
        return params.toString();
    }
// if(sessionStorage.getItem('currentPage')== null){
//             sessionStorage.setItem('currentPage', 2);
//         }else{
//             let currentPage = sessionStorage.getItem('currentPage');
//             sessionStorage.setItem('currentPage', currentPage+1);
//         }
    
}
async function sendRequest(string){
    try{
        const response = await fetch('/products/loaditems?'+string);
        if(!response.ok){
            throw new Error("Rresponse status :" + response.status);
        }
        const result = await response.json();
        return result;
    }catch(e){
        console.error(e);
    }
}

function drawItems(items, redraw = false){
    let location = document.querySelector('.shopWrapper');

     if (redraw == true) {
        location.textContent = "";
    }

    // Очищаем содержимое места назначения
    items.forEach(item => {
            console.log(); 
        let images= [];
        images[0] = item['image_location'] + "/"+ item['image_name'];
        if(Array.isArray(item.images)){
            for(let i = 0; i< item['images'].length; i++){
                images.push(item['images'][i]['image_location'] + "/" + item['images'][i]['image_name']);
            }

        }
        
        let div = document.createElement("div");
        div.className = "Item";
        div.setAttribute('data-IdItem', item['id']);
        div.addEventListener('click', (event) => {
            scaleItem(event.currentTarget.getAttribute('data-IdItem'));

        });
        let imgWrapper = document.createElement("div");
        imgWrapper.className = "imgWrapper";

        let img = document.createElement("img");
        img.src = window.location.origin + "/storage/" +images[0]; // Предполагается, что item['image_urls'] - это массив URL изображений
        img.className = "ItemImg";

        imgWrapper.appendChild(img);
        div.appendChild(imgWrapper);

        let titleSpan = document.createElement("span");
        titleSpan.className = "ItemTitle";
        titleSpan.textContent = item['title'];

        let descriptionSpan = document.createElement("span");
        descriptionSpan.className = "ItemDescription";
        descriptionSpan.textContent = item['description'];

        let priceSpan = document.createElement("span");
        priceSpan.className = "ItemPrice";
        priceSpan.textContent = item['price'] + "£";
        priceSpan.setAttribute('data-itemId', item['id'])
        priceSpan.addEventListener('click', (event) => {
            event.stopPropagation();
            let id = event.currentTarget.getAttribute("data-itemId")
            cartBuy(+id);
        })
        div.appendChild(titleSpan);
        div.appendChild(descriptionSpan);
        div.appendChild(priceSpan);

        setTimeout(() => {
            div.classList.add('added');
            
        }, 300);
        location.appendChild(div);
    });
}

