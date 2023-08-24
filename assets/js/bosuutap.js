var imgFeature = document.querySelector('.img-feature')
var listImg = document.querySelectorAll('.list-image img')
var prevBtn = document.querySelector('.prev')
var nextBtn = document.querySelector('.next')
var currentIndex = 0;

function updateImgByIndex(index){
    //remove active class
    document.querySelectorAll('.list-image div').forEach(item=>{
        item.classList.remove('active')
    })
    currentIndex = index
    imgFeature.src = listImg[index].getAttribute('src')
    listImg[index].parentElement.classList.add('active')
    document.getElementById('position').innerText=currentIndex+1;
}

listImg.forEach((imgElement, index)=>{
    imgElement.addEventListener('click',e=>{
        imgFeature.style.opacity = '0'
        setTimeout(()=>{
            updateImgByIndex(index)
            imgFeature.style.opacity = '1'    
        }, 400)
    })
})

prevBtn.addEventListener('click', e=>{
    if(currentIndex==0){
        currentIndex = listImg.length-1
    }else{
        currentIndex--
    }
    updateImgByIndex(currentIndex)
})

nextBtn.addEventListener('click', e=>{
    if(currentIndex==listImg.length-1){
        currentIndex = 0
    }else{
        currentIndex++
    }
    updateImgByIndex(currentIndex)
})

updateImgByIndex(0)