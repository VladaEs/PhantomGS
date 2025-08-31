document.addEventListener('DOMContentLoaded', () => {
    
    let leftArrow = document.getElementById('LeftArrow');
    let rightArrow = document.getElementById('RightArrow');
    let ImagesWrapper =document.querySelector('.ImagesWrapper');
    rightArrow.addEventListener("click", () => {
        ImagesWrapper.scrollLeft += 150; // ширина картинки 
    });
    leftArrow.addEventListener("click", () => {
        ImagesWrapper.scrollLeft -= 150;
    });
    let images = document.querySelectorAll('.galleryElement');
    
    setImageSize(images)

    //console.log(images);
    // images.forEach(item=>{
    //     item.addEventListener('click', ()=>{showPopUp(item)});
    // });
});


function setImageSize(images){
    if(images.length <= 0){
        return;
    }

    for(let i = 0; i< images.length; i++){
        let height= images[i].naturalHeight;
        let width = images[i].naturalWidth;
        let id = images[i].getAttribute('data-orderImage');
        let a  = document.querySelector(`[data-orderLink="${id}"]`);
        a.setAttribute('data-pswp-height', height);
        a.setAttribute('data-pswp-width', width);


    }
}
    function showPopUp(item){
        let popUp= document.querySelector('.popUp');
        let imagePopUp= document.querySelector('.popUp img');
        // if (item.naturalHeight >= item.naturalWidth) {
        //     // Если высота больше ширины, переворачиваем изображение
        //     console.log(item.naturalHeight)
        //     console.log(item.naturalWidth)
        //     imagePopUp.style.transform = 'rotate(-90deg)';
        // }
        // else{
        //     imagePopUp.style.transform = 'rotate(0deg)';
        // } //переварачивает все фотки, так как высота у них больше ширины
        let src = item.getAttribute('src');
        
        imagePopUp.setAttribute('src', src);
        popUp.classList.remove('popUpInVisible');
        popUp.addEventListener('click', ()=>{
            popUp.classList.add('popUpInVisible');
        })
    }