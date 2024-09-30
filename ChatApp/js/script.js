//Important Variables
var flag = true;
var msg = document.querySelectorAll(".msg");
var mid = document.getElementsByClassName('mid');
var mic = document.querySelectorAll('.tbtn.mic-btn');
var dropBtn = document.querySelector('#text button');
var sendBtn = document.querySelectorAll('.tbtn.send-btn');

// Loading, Interactive, Complete
document.addEventListener("DOMContentLoaded", () => {
    msg.forEach( msgBox => {msgBox.scrollTop = msgBox.scrollHeight});
    sendBtn.forEach( sendBtn => { sendBtn.style.display = 'none'});
    mic.forEach( mic => { mic.style.display = 'block'});
    splashScreen();
    // slideScreen(); 
    setupTabs();
    // document.querySelectorAll("#frame").forEach(chatContainer => {
    //     chatContainer.querySelector(".chat").click();
    // });
});

//Splash Screen
function splashScreen(){
    var splash = document.querySelector("#splash");
    splash.style.display = "grid";
    var show = setTimeout(function(){
        splash.style.transition = "1s opacity 2s ease-in-out";
        splash.style.display = "grid";
        splash.style.opacity = "0";
        var hide = setTimeout(function(){
            splash.style.display = "none";
        }, 3000);
    }, 0);
}
//Slide Screen
function slideScreen(){
    var splash = document.querySelector("#splash");
    splash.style.display = "grid";
    var show = setTimeout(function(){
        splash.style.transition = "1s margin 2s ease-in-out";
        splash.style.display = "grid";
        splash.style.margin = "-100vh 0";
        setTimeout(function(){
            splash.style.display = "none";
        }, 3000)
    }, 0);
}

//Toggle mic and send btn
function toggleTextBtn(e){
    var txtSize = e.value.trim().length;
    var mic = e.parentElement.parentElement.querySelector('.tbtn.mic-btn');
    var sendBtn = e.parentElement.parentElement.querySelector('.tbtn.send-btn');
    if(txtSize > 0){
        mic.style.display = 'none';
        sendBtn.style.display = 'block';
        let sender = e.parentElement.parentElement.querySelector('#send');
        e.addEventListener('keypress', function(e){
            if(e.key === "Enter"){send(sender)}
        });
    }
    else{
        mic.style.display = 'block';
        sendBtn.style.display = 'none';
    }
}
//Send Message Using Keyboard

//Send Message Using Mouse
function send(e){
    var mic = e.parentElement.parentElement.querySelector('.tbtn.mic-btn');
    var sendBtn = e.parentElement.parentElement.querySelector('.tbtn.send-btn');
    var msg = e.parentElement.parentElement.parentElement.querySelector(".msg");
    var rawTxt = e.parentElement.parentElement.querySelector(".txt");
    var t = new Date().toLocaleString("en-US", {hour : '2-digit', minute : 'numeric'});
    var tnode = document.createTextNode(t);
    var time = document.createElement('span');
    time.className = "timestamp";
    time.appendChild(tnode);
    var txt = document.createTextNode(rawTxt.value);
    var p = document.createElement('p');
    p.appendChild(txt);
    var bubble = document.createElement('div');
    bubble.className = "bubble right";
    bubble.appendChild(p);
    bubble.appendChild(time);
    if(rawTxt.value.trim().length > 0){
        msg.appendChild(bubble); 
        msg.scrollTop = msg.scrollHeight;
        rawTxt.value = "";
        mic.style.display = "block";
        sendBtn.style.display = "none";
    }
}


//Toggle dropup
function dropup(e){  
    const cont = e.parentElement.querySelector('.content');
    if(flag){
        cont.style.transform = "scaleY(1)";
        flag = false;
    }
    else{
        cont.style.transform = "scaleY(0)"; 
        document.onclick = function(point){ if(point.target !== e){ cont.style.transform = "scaleY(0)";}}
        flag = true;
    }
}
//Toggle dropdown
function dropdown(e){  
    var nav = e.parentElement.querySelector("nav");
    if(flag){
        nav.style.transform = "scaleY(1)";
        flag = false;
    }
    else{
        nav.style.transform = "scaleY(0)"; 
        document.onclick = function(point){ if(point.target !== e){ nav.style.transform = "scaleY(0)";}}
        flag = true;
    }
}


//Floating Timeline
function scroller(e){
  const dateLabels = e.querySelectorAll('.mid')
  const topLabel = e.querySelector('#date-label')
  let currentLabel = null
  dateLabels.forEach((dateLabel) => {
    if(e.scrollTop >= dateLabel.offsetTop){currentLabel = dateLabel}
  })
  if(currentLabel) {
    topLabel.style.opacity = '1'
    topLabel.innerHTML = `<p>${currentLabel.innerText}</p>`
  } else { topLabel.style.opacity = '0'}
}

//Searching 
function search(e){  
    const chat = e.parentElement.parentElement.querySelectorAll('.edit nav > div, .chat');
    let searchVal = e.value.toUpperCase();
    for(var i in chat){
        let match = chat[i].querySelector('p, h4');
        if(match){
            let txtVal = match.textContent || match.innerHTML;
            if(txtVal.toUpperCase().indexOf(searchVal) > -1){
                chat[i].style.display = "";
            }
            else{chat[i].style.display = "none"}
        }
    }
}

// Chat Tabs Toggle
function setupTabs(){
    document.querySelectorAll(".chat").forEach(chat => { 
        chat.addEventListener("click" , () => {
           const welcomeScreen = document.querySelector(".welcome");
           welcomeScreen.style.display = "none";
           const sideBar = chat.parentElement;
           const chatContainer = sideBar.parentElement.parentElement;
           const chatNumber = chat.dataset.forTab; 
           const tabToActivate = chatContainer.querySelector(`#rpane .chat-content[data-tab="${chatNumber}"]`);   
           
           sideBar.querySelectorAll(".chat").forEach( chatBtn => {
                chatBtn.classList.remove("chat-active");
           });
           chatContainer.querySelectorAll("#rpane .chat-content").forEach( tab => {
            tab.classList.remove("chat-active");
            tab.style.display = "none";
           });
    
           chat.classList.add("chat-active");
           tabToActivate.classList.add("chat-content-active");
           tabToActivate.style.display = "block";
        });
    });
}

//Sorting
