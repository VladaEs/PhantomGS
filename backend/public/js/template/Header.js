function checkActivePage(links,pageId ){
    
    let activePageId = sessionStorage.getItem('ActivePage');
    if(!activePageId || activePageId=='null'){ 
        sessionStorage.setItem("ActivePage", pageId);
        links[0].classList.add('active');
        console.log(pageId);
    }
    else{
        console.log("worked");
        sessionStorage.setItem("ActivePage", pageId);
        links[pageId].classList.add('active');
    }
    console.log(links)

}
function headerLinkClick(){
        let links = document.querySelectorAll('.desktop li');
        
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                 event.preventDefault();// Предотвращаем стандартное действие ссылки
                 let link = this.querySelector('a').getAttribute('href');
                let pageId = this.getAttribute('data-pageId');
                console.log('data-pageId:', pageId);
                checkActivePage( links, pageId);

                location.href= link;
            });
        });
}
function scrollHeader(){
    let header = document.querySelector('header');
    document.addEventListener('wheel' , (event)=>{
        if(event.deltaY>0){
            header.classList.add('headerHidden');
        }
        else{
            header.classList.remove('headerHidden');
        }
    })
}

function includeCSS(aFile, aRel){
	let style = window.document.createElement('link')
    let head = window.document.getElementsByTagName('head')[0];
	style.setAttribute('href',aFile);
	style.setAttribute('rel', aRel || 'stylesheet') 
	head.appendChild(style)
}
window.addEventListener('DOMContentLoaded', function(){
    includeCSS('../../static/template/Header.css');
    checkActivePage( document.querySelectorAll('.desktop li'), sessionStorage.getItem("ActivePage"));
    headerLinkClick();
    scrollHeader();
    burgerMenu();
})


function burgerMenu(){
    let MenuFullScreen = document.querySelector('.MenuFullScreen');
    let burger = document.querySelector('.burgerInput');
    
    burger.addEventListener('click', (event)=>{
        if(event.currentTarget == burger){
            console.log(event.target)
            MenuFullScreen.classList.toggle('menuActive');
            console.log("hi")
    }
    });
}




