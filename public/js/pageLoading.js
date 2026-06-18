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

for (let i=0; i < menuHeader.length; i++) {
    if (i === 0 || i === 2 || i === 4) {
        menuHeader[i].style.display = 'flex';   // 'block';
    } else {
        menuHeader[i].style.display = 'none';
    }
}

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

function getTaskPage() {
    let modeChoice = resultMode.value.trim();
        switch(modeChoice) {
            case "Plain":
                window.location.href = "{{ route('taskPlain') }}";
                break;
            case "Choice":
                window.location.href = "{{ route('taskChoice') }}";
                break;
            case "Lang":
                window.location.href = "{{ route('taskLang') }}";
                break;
            case "Mix":
                window.location.href = "{{ route('taskMix') }}";
                break;
        }
}

