//// Modal open-close

const setButton = document.getElementById("setButton");
const getButton = document.getElementById("getButton");

const modalSettings = document.getElementById("settings"); //[0];

const primLang = document.getElementById("primLang");
const resultPrimLang = document.getElementById("resultPrim");
const comboPrimLangsList = document.getElementById("primLangChoice");
const comboPrimLangChoiceList = document.getElementById("primLangChoiceList");
const inputPrim = document.getElementById("inputPrim");

const compLangs = document.getElementById("compLang");
const resultCompLangs = document.getElementById("resultComp");
const comboCompLangsList = document.getElementById("compLangChoice");
const comboCompLangChoiceList = document.getElementById("compLangChoiceList");
const inputComp = document.getElementById("inputComp");

const themesLangs = document.getElementById("themeList");
const resultThemesLangs = document.getElementById("resultThemes");
const comboThemesList = document.getElementById("themeChoice");
const comboThemeChoiceList = document.getElementById("themeChoiceList");
const inputThemes = document.getElementById("inputThemes");

const btnOpenPrimLang = document.getElementById("btnOpenPrimLang");
const btnOpenCompLang = document.getElementById("btnOpenCompLang");
const btnOpenThemes = document.getElementById("btnOpenThemes");

const modeButtons = document.getElementsByClassName("mode-button"); //mode buttons array

const resultMode = document.getElementById("resultMode");

const comboAppLangChoice = document.getElementById("appLangChoice");


const openModalSettings = () => {
  primLang.value = localStorage.getItem("primLang");
  console.log(primLang.value);
  resultPrimLang.value = localStorage.getItem("primLang");

  compLangs.value = localStorage.getItem("compLangs");
  console.log(compLangs.value);
  resultCompLangs.textContent = localStorage.getItem("compLangs");

  themesLangs.value = localStorage.getItem("themesLangs");
  console.log(themesLangs.value);
  resultThemesLangs.textContent = localStorage.getItem("themesLangs");

  resultMode.value = localStorage.getItem("modeChoice");
  console.log(resultMode.value);

  modalSettings.style.display = "flex";

  let modeButtonsLength = modeButtons.length;

  for (i = 0; i < modeButtonsLength; i++) {
    let item = modeButtons[i].id;

    if (item.includes(resultMode.value)) {

      modeButtons[i].checked = true;
      break;
    } else {
      const modeButtonPlain = document.getElementById("setModePlain");
      modeButtonPlain.checked = true;
    }
  }
};

const closeModalSettings = () => {
  modalSettings.style.display = "none";
};

////Combo-list open-close


const openPrimLangsChoiceList = () => {
  comboPrimLangsList.style.display = "flex";
  comboPrimLangChoiceList.style.display = "flex"; 
  const comboPrimLangRus = document.getElementById("primRus"); 

  comboPrimLangRus.checked = true; 
  btnOpenCompLang.disabled = true;
  btnOpenThemes.disabled = true;
};
const closePrimLangsChoiceList = () => {
  comboPrimLangsList.style.display = "none";
  comboPrimLangChoiceList.style.display = "none"; 
  btnOpenCompLang.disabled = false;
  btnOpenThemes.disabled = false;

  choosedItemRadio("primLang", "resultPrim");

};

const openCompLangsChoiceList = () => {
  comboCompLangsList.style.display = "flex";
  comboCompLangChoiceList.style.display = "flex"; //
  
  const comboCompLangRus = document.getElementById("compRus");  ////
  const comboCompLangEng = document.getElementById("compEng");  ////

  // as default
  const comboCompLangArm = document.getElementById("compArm"); //
  const comboCompLangGre = document.getElementById("compGre"); //
  const comboCompLangFin = document.getElementById("compFin"); //
  const comboCompLangLav = document.getElementById("compLav"); //
  // comboCompLangArm.checked = true;
  // comboCompLangGre.checked = true;
  // comboCompLangFin.checked = true;
  // comboCompLangLav.checked = true;
  btnOpenPrimLang.disabled = true;
  btnOpenThemes.disabled = true;

  let compLangsValue = compLangs.value;
  console.log("compLangsValue = " + compLangs.value);

  let arrCompLangsValue = compLangsValue.split(', ');
  console.log("arrCompLangsValue = " + arrCompLangsValue);

  let compList = [];
  compList[0] = comboCompLangRus;
  compList[1] = comboCompLangEng;
  compList[2] = comboCompLangArm;
  compList[3] = comboCompLangGre;
  compList[4] = comboCompLangFin;
  compList[5] = comboCompLangLav;

  arrCompLangsValue.forEach(item => {
    compList.forEach(element => {
      if (item == element.value) {
        element.checked = true;
      }
    });
  });

  let primLangValue = getFirstWord(primLang.value);

  switch (primLangValue) {
    case "Russian":
      comboCompLangRus.checked = false;
      comboCompLangRus.disabled = true;
      break;
    case "English":
      comboCompLangEng.checked = false;
      comboCompLangEng.disabled = true;
      break;
    case "Armenian":
      comboCompLangArm.checked = false;
      comboCompLangArm.disabled = true;
      break;
    case "Greek":
      comboCompLangGre.checked = false;
      comboCompLangGre.disabled = true;
      break;
    case "Finnish":
      comboCompLangFin.checked = false;
      comboCompLangFin.disabled = true;
      break;
    case "Latvian":
      comboCompLangLav.checked = false;
      comboCompLangLav.disabled = true;
      break;
  }

  //alert(primLangValue + " selected as Prime language.\nIf you want to compare this language,\nplease change the Prime language selection.");
};
const closeCompLangsChoiceList = () => {
  comboCompLangsList.style.display = "none";
  comboCompLangChoiceList.style.display = "none"; //
  btnOpenPrimLang.disabled = false;
  btnOpenThemes.disabled = false;

  choosedItemCheck("compLang", "resultComp");
};

  const comboTheme5 = document.getElementById("theme5"); //
  console.log("comboTheme5 = " + comboTheme5);
  
const openThemesChoiceList = () => {
  comboThemesList.style.display = "flex";
  comboThemeChoiceList.style.display = "flex"; //
  //// Themes as default
  const comboTheme5 = document.getElementById("theme5"); //
  console.log("comboTheme5 = " + comboTheme5);
  const comboTheme6 = document.getElementById("theme6"); //
  const comboTheme7 = document.getElementById("theme7"); //
  const comboTheme8 = document.getElementById("theme8"); //
  comboTheme5.checked = true;
  comboTheme6.checked = true;
  comboTheme7.checked = true;
  comboTheme8.checked = true;
  btnOpenPrimLang.disabled = true;
  btnOpenCompLang.disabled = true;

  
};
const closeThemesChoiceList = () => {
  comboThemesList.style.display = "none";
  comboThemeChoiceList.style.display = "none"; //
  btnOpenPrimLang.disabled = false;
  btnOpenCompLang.disabled = false;

  choosedItemCheck("themeList", "resultThemes");
};

const openAppLangChoiceList = () => {
  comboAppLangChoice.style.display = "flex";
};
const closeAppLangChoiceList = () => {
  comboAppLangChoice.style.display = "none";
};

function choosedItemRadio(radioName, resultName) {
  const arrItems = document.getElementsByName(radioName);
  for (const item of arrItems) {
    if (item.checked == true) {
      document.getElementById(radioName).value = item.value;
      document.getElementById(resultName).value = "";
      document.getElementById(resultName).value += item.value + "\n";
      break;
    }
  }
}

function choosedItemCheck(checkName, resultName) {
  const arrItems = document.getElementsByName(checkName);
  const arrItemsChecked = [];
  for (const item of arrItems) {
    if (item.checked == true) {

      arrItemsChecked.push(item.value);
    }
  }
  console.log(arrItemsChecked);
  document.getElementById(checkName).value = "";
  document.getElementById(resultName).value = "";
  arrItemsChecked.forEach((itemChecked) => {
    document.getElementById(checkName).value += itemChecked + ",";
  });
  document.getElementById(resultName).value +=
    arrItemsChecked.join(", ") + "\n"; // to "#userChoice"
}

function choosedModeItemRadio(radioName, resultName) {
  const arrItems = document.getElementsByName(radioName);
  for (const item of arrItems) {
    if (item.checked == true) {
      document.getElementById(resultName).value = "";
      document.getElementById(resultName).value += item.value + "\n";
      break;
    }
  }
}

function submitTaskSettings() {

  let strPrimLang = document.getElementById("resultPrim").value;
  console.log(strPrimLang);
  localStorage.setItem("primLang", strPrimLang);

  let strCompLangsN = document.getElementById("resultComp").value;
  let strCompLangs = strCompLangsN.replace(/\n/g, "");
  console.log(strCompLangs);
  localStorage.setItem("compLangs", strCompLangs);

  let strThemesN = document.getElementById("resultThemes").value;
  let strThemes = strThemesN.replace(/\n/g, "");
  console.log(strThemes);
  localStorage.setItem("themesLangs", strThemes);

  let strModeChoice = document.getElementById("resultMode").value;
  console.log(strModeChoice);
  localStorage.setItem("modeChoice", strModeChoice);

  //getTaskPage();
  closeModalSettings();
}

function getFirstWord(str) {
  const firstWord = str.trim().split(' ')[0];
  return firstWord;
}
