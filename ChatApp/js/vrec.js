var flag = true; 
// #text #recx, #text .timer, .tlapse
var tSec = 0; var tMin = 0;

function blink(e){
    var mic = e;
    var recx = e.parentElement.querySelector("#text #recx");
    var playx = e.parentElement.querySelector("#text #playx");
    var sendBtn = e.parentElement.querySelector('.tbtn.send-btn');
    var txtIn = e.parentElement.querySelector('#txt-in');
    var dropBtn = e.parentElement.querySelector("#text button");
    var pDel = e.parentElement.querySelector('.p-del');
    var rDel = e.parentElement.querySelector('.r-del');
    var playRec = e.parentElement.querySelector('.play-btn');
    var pauseRec = e.parentElement.querySelector('.pause-btn');
    var tlapse = e.parentElement.querySelector('.tlapse');
    var dot = e.parentElement.querySelector(".rec-dot");
    mic.style.display = 'none';
    txtIn.style.display = 'none';
    dropBtn.style.display = 'none';
    sendBtn.style.display = 'block';
    recx.style.display = 'flex';
    playx.style.display = 'none';
    var beep = setInterval(function(){
        dot.style.transition = "opacity 0.2s";
        dot.style.opacity = "0";
        (tSec<10)?tlapse.innerText = tMin+":0"+tSec:tlapse.innerText = tMin+":"+tSec; ; 
        if(tSec == 59){ tSec = -1; tMin++;
            if(tMin == 23){ tMin = -1;}
        }
        setTimeout(function(){
            dot.style.transition = "opacity 0.2s";
            dot.style.opacity = "1";
        }, 500); tSec++;
    }, 1000);
    recording(mic, pauseRec, playRec);
    rDel.addEventListener('click', function(){
        tSec = 0; tMin = 0;
        recx.style.display = 'none';
        playx.style.display = 'none';
        mic.style.display = 'block';
        txtIn.style.display = 'block';
        sendBtn.style.display = 'none';
        dropBtn.style.display = 'block';
        clearInterval(beep);
    });
    pDel.addEventListener('click', function(){
        tSec = 0; tMin = 0;
        recx.style.display = 'none';
        playx.style.display = 'none';
        mic.style.display = 'block';
        txtIn.style.display = 'block';
        sendBtn.style.display = 'none';
        dropBtn.style.display = 'block';
        clearInterval(beep);
    });
    pauseRec.addEventListener('click', function(){
        mic.style.display = 'block';
        txtIn.style.display = 'none';
        dropBtn.style.display = 'none';
        sendBtn.style.display = 'block';
        recx.style.display = 'none';
        playx.style.display = 'flex';
        clearInterval(beep);
    });
}

function recording(mic, pauseRec, playRec){
    let audioRecorder;
    let audioChunks = [];
    navigator.mediaDevices.getUserMedia({audio:true})
    .then(stream => {
            audioRecorder = new MediaRecorder(stream);
            audioRecorder.addEventListener('dataavailable', e => {audioChunks.push(e.data)});
            mic.addEventListener('click', () => {//audioChunks = []; 
                audioRecorder.start()});
            pauseRec.addEventListener('click', () => {audioRecorder.pause()});
            playRec.addEventListener('click', () => {
                audioRecorder.stop();
                const blobObj = new Blob(audioChunks, {type: 'audio/webm'});
                const audioUrl = URL.createObjectURL(blobObj);
                const audio = new Audio(audioUrl);
                audio.play();
            });
    }).catch(err => {console.log('Error: '+ err);});
}

    
// .then(stream => {
//     audioRecorder = new MediaRecorder(stream);
//     audioRecorder.addEventListener('dataavailable', e => {audioChunks.push(e.data);});
//     mic.addEventListener('click', () => {audioChunks = []; audioRecorder.start();});
//     pauseRec.addEventListener('click', () => {audioRecorder.stop();});
//     playRec.addEventListener('click', () => {
//         const blobObj = new Blob(audioChunks, {type: 'audio/webm'});
//         const audioUrl = URL.createObjectURL(blobObj);
//         const audio = new Audio(audioUrl);
//         audio.play();
//     });
// }).catch(err => {console.log('Error: '+ err);});
     