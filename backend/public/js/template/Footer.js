function footerClickHandler(){
    let infoBlocks= document.querySelectorAll('.InfoFooter');
    infoBlocks.forEach(item=>{
        item.addEventListener('click',()=> footerAllFunctions(item));
    })
}
function footerAllFunctions(item){

    showLabelCopied(item);
    copyDataClipboard(item);
}
function showLabelCopied(item) {
    const hint = document.createElement('span');
    hint.classList.add('copyHandler');
    hint.textContent = "Copied to clipboard";
    item.appendChild(hint);

    const firstPromise = new Promise((resolve) => {
        setTimeout(() => {
            hint.classList.add('copyActive');
            resolve();
        }, 300);
    });

    firstPromise.then(() => {
        return new Promise((resolve) => {
            setTimeout(() => {
                hint.classList.remove('copyActive'); // Удаление элемента hint
                resolve(); // Разрешение промиса
            }, 1300);
        });
    });
}
function copyDataClipboard(item){
    const textArea = document.createElement("textarea");
    textArea.value = item.getAttribute('data-value');
        
    // Move textarea out of the viewport so it's not visible
    textArea.style.position = "absolute";
    textArea.style.left = "-999999px";
        
    document.body.prepend(textArea);
    textArea.select();

    try {
        document.execCommand('copy');
    } catch (error) {
        console.error(error);
    } finally {
        textArea.remove();
    }
}
function includeCSS(aFile, aRel){
	let style = window.document.createElement('link')
    let head = window.document.getElementsByTagName('head')[0];
	style.setAttribute('href',aFile);
	style.setAttribute('rel', aRel || 'stylesheet') 
	head.appendChild(style)
}

window.addEventListener('load', function(){
    footerClickHandler();
    includeCSS('../../static/template/Footer.css');
})
