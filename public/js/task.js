class LangsItem {
    constructor (
        id,
        code,
        title,  //langName,
        native, //langNative,
        alias,  //langAlias,
        status,
        position,
    ) {
        // this.id = id;
        // this.langName = langName;
        // this.langNative = langNative;
        // this.langAlias = langAlias;
        // this.status = status;
        // this.position = position;

        this.id = id;
        this.code = code; //
        this.title = title;
        this.native = native;
        this.alias = alias;
        this.status = status;
        this.position = position;
    }    
}

class ThemesItem {
    constructor (
        id,
        code,
        title,  //themeName,
        title_base,
        description,
        status,
    ) {
        this.id = id;
        this.code = code;
        this.title = title;
        this.title_base = title_base;
        this.description = description;
        this.status = status;
    }
}

class WordsItem {
    constructor (
        id,
        code,
        theme_id,   //idTheme,
        status, //idStatus,
        title,  //wordName,
    ) {
        // this.id = id;
        // this.idTheme = idTheme;
        // this.idStatus = idStatus;
        // this.wordName = wordName;

        this.id = id;
        this.code = code;
        this.theme_id = theme_id;
        this.status = status;
        this.title = title;
    }    
}

class LangsList {
    constructor() {
        this.arrLangs = [];
    }
    fetchLangsList(){
        this.arrLangs = langs;  // langs.filter(item => item.status == 1);
    }
    LangsList() {
        this.arrLangs.forEach(arrLangs => {
            const langsItem = new LangsItem(
                arrLangs.id,
                arrLangs.code,
                arrLangs.title,
                arrLangs.native,
                arrLangs.alias,
                arrLangs.status,
                arrLangs.position,
            );
            arrLangs += langsItem;
        });

        return this.arrLangs;        
    }
}

class ThemesList {
    constructor() {
        this.arrThemes = [];
    }
    fetchThemesList() {
        this.arrThemes = themes;
    }
    ThemesList() {
        this.arrThemes.forEach(arrThemes => {
            const themesItem = new ThemesItem(
                arrThemes.id,
                arrThemes.code,
                arrThemes.title,
                arrThemes.title_base,
                arrThemes.description,
                arrThemes.status,
            );
            arrThemes += themesItem;
        });

        return this.arrThemes;
    }
}

class WordsList {
    constructor() {
        this.arrWords = [];
    }
    fetchWordsList() {
        this.arrWords = words;
    }
    WordsList() {
        this.arrWords.forEach(arrWords => {
            const wordsItem = new WordsItem(
                arrWords.id,
                arrWords.code,
                arrWords.theme_id,
                arrWords.status,
                arrWords.title,
            );
            arrWords += wordsItem;
        });

        return this.arrWords;
    }
}

//Define selected Mode
let strSelectedMode = localStorage.getItem('modeChoice');
console.log("Users mode: " + strSelectedMode);

//Define selected PrimLang
let strSelectedPrimLang = localStorage.getItem('primLang');
console.log("Users Prim lang: " + strSelectedPrimLang);

//Define selected CompLangs
let strSelectedCompLangs = localStorage.getItem('compLangs');
console.log("Users Comp langs: " + strSelectedCompLangs);
let arrSelectedCompLangs = strSelectedCompLangs.split(',');
console.log(arrSelectedCompLangs);

//Define selected Themes
let strSelectedThemes = localStorage.getItem('themesLangs');
console.log("Users Themes: " + strSelectedThemes);
let arrSelectedThemes = strSelectedThemes.split(',');
console.log(arrSelectedThemes);

// let thisUrl = window.location.pathname;
// let urlName = thisUrl.substring(thisUrl.lastIndexOf("/") + 1);
// console.log("urlName = " +urlName);

getTaskSettings();

//Define lengths for selected CompLangs and Themes
let lengthCompLangs = arrSelectedCompLangs.length;
let lengthThemes = arrSelectedThemes.length;
console.log("CompLangs - " + lengthCompLangs + "   " + "Themes - " + lengthThemes);

const listLangs = new LangsList();
listLangs.fetchLangsList();
listLangs.LangsList();

const listThemes = new ThemesList();
listThemes.fetchThemesList();
listThemes.ThemesList();

const listWords = new WordsList();
listWords.fetchWordsList();
listWords.WordsList();

console.log(listLangs);
console.log(listThemes);
console.log(listWords);

let arrLangsLength = listLangs.arrLangs.length;
let arrThemesLength = listThemes.arrThemes.length;
let arrWordsLength = listWords.arrWords.length;

let arrSelectedCompLangsLength = arrSelectedCompLangs.length;
let arrSelectedThemesLength = arrSelectedThemes.length;

//Define words array for mode and selected settings

let selectedMode = strSelectedMode;
console.log("Selected mode: " + selectedMode);

let arrPrimWords = [];

let selectedPrimLang =[];

for (let i=0; i<arrLangsLength; i++) {
    if (strSelectedPrimLang.includes(listLangs.arrLangs[i].title)) {
        listLangs.arrLangs[i].isPrim = 1;
        selectedPrimLang.push(listLangs.arrLangs[i]);
        break;
    } 
}

console.log("Selected Prim lang:");
console.log(selectedPrimLang);

//Define selected comp langs array
let selectedCompLangs = [];

for (let i=0; i<arrSelectedCompLangsLength; i++) {
    for (let j=0; j<arrLangsLength; j++) {
        if (listLangs.arrLangs[j].title == arrSelectedCompLangs[i].trim()) {
            listLangs.arrLangs[j].isPrim = 0;
            selectedCompLangs.push(listLangs.arrLangs[j]);
        }
    }
}

console.log("Selected Comp langs:");
console.log(selectedCompLangs);

let allSelectedLangs = selectedPrimLang.concat(selectedCompLangs);

console.log("All selected langs:");
console.log(allSelectedLangs);


//Define selected themes array

let selectedThemes = [];

for (let i=0; i<arrSelectedThemesLength; i++) {
    for (let j=0; j<arrThemesLength; j++) {
        if (listThemes.arrThemes[j].title == arrSelectedThemes[i].trim()) {
            selectedThemes.push(listThemes.arrThemes[j]);
        }
    }
}

console.log("Selected themes:");
console.log(selectedThemes);

//Define selected words array by selected themes

let selectedWords = [];

for (let i=0; i<arrSelectedThemesLength; i++) {
    for (let j=0; j<arrWordsLength; j++) {
        if (listWords.arrWords[j].theme_id == selectedThemes[i].id) {
            selectedWords.push(listWords.arrWords[j]);
        }
    }
}

console.log("Selected words:")
console.log(selectedWords);

//Define array with name = "_pattern"+"langAlias"

let patternBaseName = "_pattern" + selectedPrimLang[0].alias;

let patternsNames = [];

for (let i=0; i<listLangs.arrLangs.length; i++) {
    patternsNames[i] = "_pattern" + listLangs.arrLangs[i].alias;
}

console.log("Patterns names: ");
console.log(patternsNames);

let objPatternsNames = [];

patternsNames.forEach(patternName => {
        objPatternsNames.push(patternName);
    });

const objPatterns = {
    _patternRus: _patternRus,
    _patternEng: _patternEng,
    _patternArm: _patternArm,
    _patternGre: _patternGre,
    _patternFin: _patternFin,
    _patternLav: _patternLav
}

//console.log('_patternRus = ' + _patternRus);
//console.log("objPatterns = " + objPatterns);

let basePatterns = [];  

for (let i=0; i<objPatternsNames.length; i++) {
    basePatterns[i] = objPatterns[objPatternsNames[i]];
}

console.log("Base patterns: ");
console.log(basePatterns);

//Define base selected words array

let baseSelectedWords = [];

for (let i=0; i<basePatterns.length; i++) {
    for (let j=0; j<arrSelectedThemesLength; j++) {
        if (basePatterns[i][j].theme_id == selectedThemes[j].id) {
            baseSelectedWords.push(basePatterns[i][j]);
        }
    }
}

console.log("Base selected words:")
console.log(baseSelectedWords);

let arrPatterns = Object.entries(objPatterns);

console.log("All patterns: ");
console.log(arrPatterns);
console.log(arrPatterns[1]);

//Define pattern for Prim lang

let primPattern = [];

for (let i=0; i<selectedPrimLang.length; i++) {
    let alias = selectedPrimLang[i].alias;
    for (let j=0; j<arrPatterns.length; j++) {
        if (arrPatterns[j][0] == "_pattern" + alias) {
            primPattern.push(arrPatterns[j]);
        }
    }
    primPattern[i]['isPrim'] = 1;   // true;
}

primPattern['isPrim'] = 1;  // true;

console.log("Prim pattern:");
console.log(primPattern);

//Define patterns for Comp langs

let compPatterns = [];

for (let i=0; i<selectedCompLangs.length; i++) {
    let alias = selectedCompLangs[i].alias;
    for (let j=0; j<arrPatterns.length; j++) {
        if (arrPatterns[j][0] == "_pattern" + alias) {
            compPatterns.push(arrPatterns[j]);
        }
    }
    compPatterns[i]['isPrim'] = 0;  // false;
}

console.log("Comp patterns:");
console.log(compPatterns);

//Define Prim pattern filtered by selected themes

let primPatternSelectedThemes = [];

let patternWordsLength;

primPatternFilterBySelectedThemes();

console.log("Prim pattern filtered by selected themes: ");
console.log(primPattern);

//Define Comp patterns filtered by selected themes

compPatternsFilterBySelectedThemes();

console.log("Comp patterns filtered by selected themes: ");
console.log(compPatterns);

function primPatternFilterBySelectedThemes() {
    let primPatternSelectedThemes = [];

    let patternWordsLength;

    for (let i=0; i<primPattern.length; i++) {
        let patternLength = primPattern[i].length;

        for (let j=0; j<patternLength; j++){

            if (Array.isArray(primPattern[i][j])) {
                patternWordsLength = primPattern[i][j].length;

                for (let k=0; k<selectedThemes.length; k++) {

                    for (let m=0; m<patternWordsLength; m++) {

                        if (primPattern[i][j][m].theme_id == selectedThemes[k].id) {

                            primPatternSelectedThemes.push(primPattern[i][j][m]);
                        }
                    }
                }
                primPattern[i][j] = primPatternSelectedThemes;
            } else { continue }
        }
    }
    return primPattern;
}

function compPatternsFilterBySelectedThemes() {
    let patternWordsLength;
    for (let i=0; i<compPatterns.length; i++) {
        let patternLength = compPatterns[i].length;

        for (let j=0; j<patternLength; j++) {
            patternWordsLength = compPatterns[i][j].length;

            if (Array.isArray(compPatterns[i][j])) {
                let compPatternSelectedThemes = [];////
                for (let k=0; k<selectedThemes.length; k++) {

                    for (let m=0; m<patternWordsLength; m++) {
                    
                        if (compPatterns[i][j][m].theme_id == selectedThemes[k].id) {
                            compPatternSelectedThemes.push(compPatterns[i][j][m]);
                        }
                    }
                }
                compPatterns[i][j] = compPatternSelectedThemes;
            } else { continue }
        }
    }
    return compPatterns;
}

//Define task row

let taskPatterns = [].concat(primPattern, compPatterns);

console.log("Task patterns : ");
console.log(taskPatterns);

let taskRows = [];
let primWords = [];
let compWords = [];

for (let i=0; i<taskPatterns.length; i++) {
    if (taskPatterns[i].isPrim == 1) {  // true) {

        for (let j=0; j<taskPatterns[i][1].length; j++) {
            primWords.push(taskPatterns[i][1][j]);
        }
    } else {
        for (let j=0; j<taskPatterns[i][1].length; j++) {
            compWords.push(taskPatterns[i][1][j]);
        }
    }
}

console.log("Prim words: ");
console.log(primWords);
console.log("Comp words: ");
console.log(compWords);

for (let i=0; i<primWords.length; i++) {
    let wordRow = [];
    wordRow.push(primWords[i]);
    for (let j=0; j<compWords.length; j++) {
        if (primWords[i].word_id == compWords[j].word_id) {
            wordRow.push(compWords[j]);
        }
    }
    taskRows.push(wordRow);
}

console.log("Task rows: ");
console.log(taskRows);

console.log("Selected Prim lang id = " + selectedPrimLang[0].id);

function getTaskSettings(){
    if (urlName == 'taskPlain' || urlName == 'taskChoice' || urlName == 'taskLang' || urlName == 'taskMix') {
        console.log('this task = ' + urlName);
        let taskPrimLang = document.getElementById('taskPrimLang');
        let taskCompLangs = document.getElementById('taskCompLangs');
        let taskThemes = document.getElementById('taskThemes');

        taskPrimLang.textContent = strSelectedPrimLang;
        taskCompLangs.textContent = arrSelectedCompLangs;
        taskThemes.textContent = arrSelectedThemes;
    } else {
        console.log('No task');
    }
}

//getTaskSettings();





