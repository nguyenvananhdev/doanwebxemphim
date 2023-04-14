//show video
let playButton = document.querySelector(".play-movie");
let video = document.querySelector(".video-container");
let myvideo = document.querySelector("#myvideo");
let closebtn = document.querySelector(".close-video");

playButton.onclick = () =>{
    // Phát video
    video.classList.add("show-video");
    myvideo.play();
}

closebtn.onclick = () =>{
    // Dừng video
    video.classList.remove("show-video");
    myvideo.pause();
}