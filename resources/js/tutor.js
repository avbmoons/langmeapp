const goButton = document.getElementById('goButton');
const tutorCover = document.getElementById('tutorCover');
const indexCover = document.getElementById('indexCover');

const slides = document.querySelector('.tutor');

const slider = document.querySelectorAll('.tutor-main');
const dots = document.querySelectorAll('.dot-step');

const btnPrev = document.getElementById('tutorPrev');
const btnNext = document.getElementById('tutorNext');

let slideIndex = 0;

let currentSlide = 0;

const openTutor = () => {
  indexCover.style.display = 'none';
  tutorCover.style.display = 'flex';
  showSlides();
};

const closeTutorPages = () => {
  tutorCover.style.display = 'none';
}

function showSlides() {
  let slider = document.querySelectorAll('.tutor-main');
  let dots = document.querySelectorAll('.dots');
  let tutorCover = document.getElementById('tutorCover');
  let tutorCoverStyle = window.getComputedStyle(tutorCover);
  let tutorCoverDisplay = tutorCoverStyle.display;

  for (let i = 0; i < slider.length; i++) {
    slider[i].style.display = 'none';
    dots[i].style.fill = '#DAE6E8';
  }
  slideIndex++;
  if (slideIndex >= slider.length) {
    clearInterval();
    window.location.href = "{{ route('home') }}";
  }
  slider[slideIndex - 1].style.display = 'flex';
  dots[slideIndex - 1].style.fill = '#f5a836';
  if (tutorCoverDisplay == 'flex') {
    setTimeout(showSlides, 3000); //
  }
}

function showSlidesPages() {
  let slider = document.querySelectorAll('.tutor-main');
  let dots = document.querySelectorAll('.dots');
  let tutorCover = document.getElementById('tutorCover');
  let tutorCoverStyle = window.getComputedStyle(tutorCover);
  let tutorCoverDisplay = tutorCoverStyle.display;

  for (let i = 0; i < slider.length; i++) {
    slider[i].style.display = 'none';
    dots[i].style.fill = '#DAE6E8';
  }
  slideIndex++;
  if (slideIndex > slider.length) {
    clearInterval();
    window.location.href = 'home.html';
  }
  slider[slideIndex - 1].style.display = 'flex';
  dots[slideIndex - 1].style.fill = '#f5a836';
  if (tutorCoverDisplay == 'flex') {
    setTimeout(showSlidesPages, 5000); //
  }
}

let indexValue = 1;

function btnSlide(e) {
  showSlideManual(indexValue = e);
}
function sideSlide(e) {
  showSlideManual(indexValue += e);
}
function showSlideManual(e) {
  let img = document.querySelectorAll('.tutor-main');
  let slider = document.querySelectorAll('.dot-step');
  let dots = document.querySelectorAll('.dots');

  if (e > img.length) {
    indexValue = 1;
  }
  if (e < 1) {
    indexValue = img.length;
  }

  for (let i=0; i < img.length; i++) {
    img[i].style.display = 'none';
  }

  for (let i=0; i < slider.length; i++) {
    dots[i].style.fill = '#DAE6E8';
  }

  img[indexValue - 1].style.display = 'flex';
  dots[indexValue - 1].style.fill = '#f5a836'; 
}

const openTutorPages = () => {
  tutorCover.style.display = 'flex';
  showSlideManual(indexValue);
};

function getThisPage() {
   let pageUrl = window.location.pathname.substring(thisUrl.lastIndexOf('/')+1);
    console.log("pageUrl = " + pageUrl);

    switch (pageUrl) {         
        case "/":
            window.location.href = "{{ route('home') }}";
            break;
        case "home":
            window.location.href = "{{ route('home') }}";
            break;
        case "taskChoice":
            window.location.href = "{{ route('taskChoice') }}";
            break;
        case "taskLang":
            window.location.href = "{{ route('taskLang') }}";
            break;
        case "taskMix":
            window.location.href = "{{ route('taskMix') }}";
            break;
        case "taskPlain":
            window.location.href = "{{ route('taskPlain') }}";
            break;
        case "about":
            window.location.href = "{{ route('about') }}";
            break;
    } 
}
