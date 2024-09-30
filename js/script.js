var vol = document.querySelector("#volume");
var progress = document.querySelector("#progress");
var song = document.querySelector("#song");
const leftTime = document.querySelector("#leftTime");
const rightTime = document.querySelector("#rightTime");
const playBox = document.querySelector("#player");
const playIcon = document.querySelector("#player i"); 
const prevBtn = document.querySelector("menu .fa-step-backward"); 
const nextBtn = document.querySelector("menu .fa-step-forward"); 
const muteIcon = document.querySelector(".fa-volume-down");
const loudIcon = document.querySelector(".fa-volume-up");
const heart = document.querySelector("#favor-music");
const stopIcon = document.querySelector("#stop-music");
const loopIcon = document.querySelector("#loop-music");
const shuffleIcon = document.querySelector("#shuffle-music");
const showBtn = document.querySelector("#show-all");
const showList = document.querySelector(".playlist aside");
const mid = document.querySelector("#mid");
const playedBtn = document.querySelector("#see-all small");
const playList = document.querySelector("#played nav");
const rightSide = document.querySelector("#right");


let sec = 0; 
let min = 0;
let hr = 0;
let songIndex = 0;
let flag = true;

var songList = [
    {
        artist : "Billie Eilish",
        title : "What was I made for",
        path: "./musics/Billie_Eilish - What_Was_I_Made_For-From-The_Motion_Picture_Barbie.mp3",
        album: "The Motion Picture Barbie",
        pic: "./pics/bg.jpg",
        favourite: false
    },
    {
        artist : "Chris Brown",
        title : "Angel Numbers Ten Toes",
        path: "./musics/Chris_Brown_-_Angel_Numbers_Ten_Toes.mp3",
        album: "Ten Toes",
        pic: "./pics/dark.jpg",
        favourite: false
    },
    {
        artist : "Cysoul",
        title : "Je Tombe Aussi",
        path: "./musics/Cysoul - Je Tombe Aussi AFROMICRO.COM.mp3",
        album: "L'Amour Inconnu",
        pic: "./pics/Inspirellno.jpg",
        favourite: false
    },
    {
        artist : "Harry Styles",
        title : "As It Was",
        path: "./musics/Harry_Styles_-_As_It_Was_(mp3.pm).mp3",
        album: "The Legendary",
        pic: "./pics/bg.jpg",
        favourite: false
    },
    {
        artist : "Jidenna",
        title : "Bambi",
        path: "./musics/Jidenna-Bambi-(TunezJam.com).mp3",
        album: "Redemption",
        pic: "./pics/dark.jpg",
        favourite: false
    },
    {
        artist : "Rihanna ft Mikko Ekko",
        title : "Stay",
        path: "./musics/Rihanna-Feat.-Mikky-Ekko-Stay.mp3",
        album: "Love Always",
        pic: "./pics/Inspirellno.jpg",
        favourite: false
    },
    {
        artist : "Stephen Sanchez",
        title : "Until I Found You",
        path: "./musics/Stephen_Sanchez_-_Until_I_Found_You_(mp3.pm).mp3",
        album: "Unknown Album",
        pic: "./pics/dark.jpg",
        favourite: false
    },
    {
        artist : "XXX Tentacion",
        title : "Vice City",
        path: "./musics/XXXTENTACION_-_Vice_City.mp3",
        album: "The Hood",
        pic: "./pics/Inspirellno.jpg",
        favourite: false
    },
];

// Load Song
function loadSongs(songIndex){
    const songImg = document.querySelector("#left aside img");
    const songArtistLabel = document.querySelector("#left aside h3");
    const songTitleLabel = document.querySelector("#left aside small");
    let songArtist = songList[songIndex].artist;
    let songTitle = songList[songIndex].title;
    let songPath = songList[songIndex].path;
    let songAlbum = songList[songIndex].album;
    let songPic = songList[songIndex].pic;
    song.src = songPath;
    songImg.src = songPic;
    songArtistLabel.innerText = songArtist;
    songTitleLabel.innerText = songTitle;
    song.onloadedmetadata = function(){ 
        progress.max = song.duration;
        progress.value = song.currentTime;
        sec = parseInt(song.duration);
        min = parseInt(sec/60);
        hr = parseInt(sec/3600);
    
        if(sec < 10 || min < 10 || hr < 10){
            if(sec<10){sec = '0'+sec;}
            else{sec = sec%60; if(sec<10){sec = '0'+sec;}}
            if(min<10){min = '0'+min;}
            if(hr<10){hr = '0'+hr;
                if(hr < 1){rightTime.innerText = min+':'+sec;}
            }
        }else{rightTime.innerText = hr+':'+min+':'+sec%60;}

        song.currentTime = 0;
        song.pause();
        playIcon.classList.remove("fa-pause-circle");
        playIcon.classList.add("fa-play-circle");
    }
}
loadSongs(songIndex);
        
for(let i = 0; i < songList.length; i++){
    const tableBody = document.querySelector("table tbody");
    let tr = document.createElement('tr');
    tr.innerHTML = `<th><small>${i+1}</small></th>
                    <td><small>${songList[i].title}</small></td>
                    <td><small>${songList[i].artist}</small></td>
                    <td><small>${songList[i].favourite}</small></td>
                    <td><small>${songList[i].album}</small></td>`;
    tableBody.appendChild(tr);
}

// Control Song
prevBtn.addEventListener('click', function(){
    if(songIndex > 0){
        songIndex--;
        loadSongs(songIndex);
    }
    else{ 
        songIndex = songList.length - 1;
        loadSongs(songIndex);
    }
});

nextBtn.addEventListener('click', function(){
    if(shuffleIcon.click()){
        songIndex = floor(Math.random() * songList.length);
    }
    if(songIndex < songList.length - 1){
        songIndex++;
        loadSongs(songIndex);
    }
    else{ 
        songIndex = 0; 
        loadSongs(songIndex);}
});

// Show-Collapse Toggle
playedBtn.addEventListener("click", function(){
    if(flag){
        flag = false;
        playList.style.height = "100%";
        rightSide.style.overflow = "scroll";
    }
    else{
        flag = true;
        playList.style.height = "200px";
        playList.style.overflow = "scroll";
        rightSide.style.overflow = "hidden";
    }
});

showBtn.addEventListener("click", function(){
    if(flag){
        flag = false;
        showList.style.height = "100%";
        mid.style.overflow = "scroll";
    }
    else{
        flag = true;
        showList.style.height = "130px";
        mid.style.overflow = "hidden";
    }
});

// Favour Song
heart.addEventListener('click', function(){
    if(flag){
        flag = false;
        heart.querySelector("i").style.color = "red";
        songList[songIndex].favourite = true;
    }
    else{
        flag = true;
        heart.querySelector("i").style.color = "#fff";
        songList[songIndex].favourite = false;
    }
});

// Stop Song
stopIcon.addEventListener('click', function(){
    song.pause();
    song.currentTime = 0;
    playIcon.classList.remove("fa-pause-circle");
    playIcon.classList.add("fa-play-circle");
    stopIcon.querySelector("i").style.color = "#00000096";
});

// Play-Pause Toggle
playBox.addEventListener('click', function(){
    if(playIcon.classList.contains("fa-pause-circle")){
        song.pause();
        playIcon.classList.remove("fa-pause-circle");
        playIcon.classList.add("fa-play-circle");
    }
    else{
        song.play();
        playIcon.classList.remove("fa-play-circle");
        playIcon.classList.add("fa-pause-circle");
        stopIcon.querySelector("i").style.color = "#fff";

        let rPlayedList = [];
        rPlayedList.push({
                            pic : `${songList[songIndex].pic}`,
                            title : `${songList[songIndex].title}`,
                            artist : `${songList[songIndex].artist}`,
                            time : `${new Date().toLocaleString("en-US",{hour : '2-digit', minute : 'numeric'})}`
                        });
        for(let j = 0; j < rPlayedList.length; j++){
            let rPlayedNav = document.querySelector("#right #played nav");
            let rCaption = document.querySelector("#right #caption");
            let rLi = document.createElement("li");
            rLi.classList.add("flex");
            rLi.innerHTML = `<figure style="background : url(${rPlayedList[j].pic}); background-position:center;background-size:cover;"></figure>
                             <div class="grid">
                                <p>${rPlayedList[j].title}</p>
                                <small>${rPlayedList[j].artist}</small>
                             </div>
                             <small>${rPlayedList[j].time}</small>`;
            rPlayedNav.appendChild(rLi);
            rCaption.innerHTML = `<section class="grid">
                                    <figure style="background : url(${rPlayedList[j].pic}); background-position:center;background-size:cover;"></figure>
                                    <aside class="flex">
                                        <div class="grid">
                                        <p>${rPlayedList[j].title}</p>
                                        <small>${rPlayedList[j].artist}</small>
                                        </div>
                                        <div class="grid"><i class="fa fa-plus"></i></div>
                                    </aside>
                                    </section>`;
        }
    }
});

// Loop Song
loopIcon.addEventListener('click', function(){
    if(flag){
        flag = false;
        loopIcon.querySelector("i").style.color = "#00000096";
        song.loop = true;
        shuffleIcon.click() = false;
    }
    else{
        flag = true;
        loopIcon.querySelector("i").style.color = "#fff";
        song.loop = false;
    }
});

// Shuffle Song
shuffleIcon.addEventListener('click', function(){
    // const myIndex = songIndex;
    if(flag){
        flag = false;
        shuffleIcon.querySelector("i").style.color = "#00000096";
        loopIcon.click() = false;
        songIndex = floor(Math.random() * songList.length);
    }
    else{
        flag = true;
        shuffleIcon.querySelector("i").style.color = "#fff";
        // songIndex = myIndex;
    }
});

// Song Timing & Seeking
if(song.play()){
    var newSec = 0;
    setInterval(function(){
        progress.value = song.currentTime;
        sec = parseInt(song.currentTime);
        min = parseInt(sec/60);
        hr = parseInt(sec/3600);
        
        if(sec < 10 || min < 10 || hr < 10){
            if(sec<10){sec = '0'+sec;}
            else{sec = sec%60;if(sec<10){sec = '0'+sec;}}
            if(min<10){min = '0'+min;}
            if(hr<10){hr = '0'+hr;
                if(hr < 1){leftTime.innerText = min+':'+sec;}
            }
        }
        else{leftTime.innerText = hr+':'+min+':'+sec%60;}
        // Song Ended
        if(song.currentTime == song.duration){
            song.pause();
            song.currentTime = 0;
            playIcon.classList.remove("fa-pause-circle");
            playIcon.classList.add("fa-play-circle");
            nextBtn.click() = true;
        }
    }, 500);
    progress.onchange = function(){
        playIcon.classList.remove("fa-play-circle");
        playIcon.classList.add("fa-pause-circle");
        stopIcon.querySelector("i").style.color = "#fff";
        song.play();
        song.currentTime = progress.value;
    }
}

// Volume 
muteIcon.addEventListener('click', function(){
    if(flag){
        flag = false;
        song.muted = true;
        muteIcon.classList.remove("fa-volume-down");
        muteIcon.classList.add("fa-volume-mute");
    }
    else{
        flag = true;
        song.muted = false;
        muteIcon.classList.remove("fa-volume-mute");
        muteIcon.classList.add("fa-volume-down");
    }
});
loudIcon.addEventListener('click', function(){
    flag = true;
    song.muted = false;
    muteIcon.classList.remove("fa-volume-mute");
    muteIcon.classList.add("fa-volume-down");
});
vol.onchange = function(){
    song.muted = false;
    song.volume = vol.value;
    if(vol.value == 0){
        muteIcon.classList.remove("fa-volume-down");
        muteIcon.classList.add("fa-volume-mute");
    }
    else{
        muteIcon.classList.remove("fa-volume-mute");
        muteIcon.classList.add("fa-volume-down");
    }
}

