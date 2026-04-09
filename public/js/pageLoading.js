let thisUrl = window.location.pathname;
let urlName = thisUrl.substring(thisUrl.lastIndexOf("/") + 1);
console.log("urlName = " +urlName);

// for menu items settings (visibility)
let menuHeader = [];
let menuFooter = [];

menuHeader[0] = document.getElementById('menuHeaderHome');
menuHeader[1] = document.getElementById('menuHeaderTask');
menuHeader[2] = document.getElementById('menuHeaderGuide');
menuHeader[3] = document.getElementById('menuHeaderResults');
menuHeader[4] = document.getElementById('menuHeaderAbout');

menuFooter[0] = document.getElementById('menuFooterHome');
menuFooter[1] = document.getElementById('menuFooterTask');
menuFooter[2] = document.getElementById('menuFooterGuide');
menuFooter[3] = document.getElementById('menuFooterResults');
menuFooter[4] = document.getElementById('menuFooterAbout');

//console.log("menuHeader[0] = " + menuHeader[0]);

for (let i=0; i < menuHeader.length; i++) {
    if (i === 0 || i === 2 || i === 4) {
        menuHeader[i].style.display = 'flex';   // 'block';
    } else {
        menuHeader[i].style.display = 'none';
    }
}

menuHeader[1].style.display = 'flex';   //// for testing

for (let i=0; i < menuFooter.length; i++) {
    if (i === 0 || i === 2 || i === 4) {
        menuFooter[i].style.display = 'flex';
    } else {
        menuFooter[i].style.display = 'none';
    }
}

if (urlName == 'about.html') {
    menuHeader[1].style.display = 'block';
    menuFooter[1].style.display = 'block';
}
///////////

function getTask() {
    let modeChoice = localStorage.getItem('modeChoice').trim();
    //let pageName;
    switch(modeChoice) {
        case 'Plain':
            window.location.href = "../pages/taskPlain.html";
            break;
        case 'Choice':
            window.location.href = "../pages/taskChoice.html";
            break;
        case 'Lang':
            window.location.href = "../pages/taskLang.html";
            break;
        case 'Mix':
            window.location.href = "../pages/taskMix.html";
            break;
    }
}

function getTaskPage() {
    let modeChoice = resultMode.value.trim();
    console.log(modeChoice);
    let pageName = window.location.pathname.substring(thisUrl.lastIndexOf('/')+1);
    
    if (pageName == 'home.html') {
        window.location.href = "../pages/home.html";
    } else if (modeChoice == "Plain") {
        window.location.href = "../pages/taskPlain.html";
    } else if (modeChoice == "Choice") {
        window.location.href = "../pages/taskChoice.html";
    }  else if (modeChoice == "Lang")      {
        window.location.href = "../pages/taskLang.html";
    } else {
        window.location.href = "../pages/taskMix.html";
    }
}

