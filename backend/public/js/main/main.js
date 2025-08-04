window.addEventListener('load', function(){
    videoAnimation();
    videoAnimation();
    videoAboutControls();
})


const videoAnimation = () => {
    let links=[];
    if(window.innerWidth >=800){
        links = ['../../public/Videos/VideoMain1.mp4', '../../public/Videos/VideoMain2.mp4', '../../public/Videos/VideoMain3.mp4'];
    }
    else{
        links = ['../../public/Videos/VideoMain1.webm', '../../public/Videos/VideoMain2.webm', '../../public/Videos/VideoMain3.webm'];
    }
    
    let videoSource = document.querySelector('.VideoSource');
    let VideoFrame = document.querySelector('.VideoFrame');
    let currentIndex = 0;

    const videoAnimationFunctionality = () => {
        VideoFrame.addEventListener('ended', () => {
            currentIndex = (currentIndex + 1) % links.length; // Increment index circularly
            VideoFrame.classList.add("VideoHidden");
            
            videoSource.setAttribute('src', links[currentIndex]);
            
            setTimeout(()=>{
                VideoFrame.classList.add("VideoVisible");
                VideoFrame.classList.remove("VideoHidden");
                VideoFrame.load();
            },500)
            
            
            //VideoFrame.play();
            
             
        });
    }

    videoAnimationFunctionality();
}

const videoAboutControls=()=>{
    let playBtn = document.querySelector('.PlayBtn');
    let videoAbout= document.querySelector('.VideoPreview');
    let soundBtn= document.querySelector('.MuteBtn');
    let isPlaying= false;
    let isSoundOn= false;
    function togglePlay(){
        playBtn.classList.toggle('HiddenClass');
        isPlaying = !isPlaying;
        if(isPlaying=== false){
            videoAbout.pause();
            return;
        }
            videoAbout.play();
        
    }
    function toggleSound(){
        
        isSoundOn = !isSoundOn;
        if(isSoundOn=== false){
            videoAbout.muted = true;
            soundBtn.setAttribute('src', '../../public/Images/soundOff.png');        
            return;
        }
        videoAbout.muted = false;
        soundBtn.setAttribute('src', '../../public/Images/soundOn.png');
    }
   
    videoAbout.addEventListener('click',togglePlay);
    playBtn.addEventListener('click',togglePlay);
    soundBtn.addEventListener('click', toggleSound);
}
