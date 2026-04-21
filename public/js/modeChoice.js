let optionsChoice = [];
let taskRowsOptions = [];
let compWordsTheme = [];
let compOptionsChoise = [];
let totalEnjoy = [];
let totalWorry = [];

//Classes for Prim words for modes: Plain, Choice and Mix

class ItemHeadingPrim {
    constructor (
        id,
        theme_id,   //idTheme,
        word_id,    //idWord,
        lang_id,    //idLang,
        langName,
        translation,  //wordName,
        spell_base, //spellBase,
        spell_eng,  //spellEng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-heading">
                    <p class="heading-text" id="item${this.word_id}HeadingBase">${this.langName}</p>
                </div>`;
    }
}

class ItemOptionPrim {
    constructor (
        id,
        theme_id,   //idTheme,
        word_id,    //idWord,
        lang_id,    //idLang,
        langName,
        translation,    //wordName,
        spell_base, //spellBase,
        spell_eng,  //spellEng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-option base">
                    <p class="item-word base" id="item${this.word_id}WordBase">${this.translation}</p>
                </div>`;
    }
}

class CardPrim {
    constructor() {
        this.ctaskRows = {};
        this.itemHeadingPrim = new ItemHeadingPrim();
        this.itemOptionPrim = new ItemOptionPrim();
    }
    fetchCardPrim(i, j) {
        this.ctaskRows = taskRows[i][j];
        
    }
    render(i) {
        let itemHeadingPrimHtml = '';
        let itemOptionPrimHtml = '';

        let itemHeadingPrim = new ItemHeadingPrim(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        );
        
        let itemOptionPrim = new ItemOptionPrim(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        ); 

        this.ctaskRows = itemHeadingPrim;
        this.ctaskRows = itemOptionPrim;
        
        itemHeadingPrimHtml = itemHeadingPrim.render();
        itemOptionPrimHtml = itemOptionPrim.render();
        let itemPrimHtml = itemHeadingPrimHtml + itemOptionPrimHtml;
        document.querySelector("#item"+`${i}`+"Base").innerHTML = itemPrimHtml;
    }
}

// //Classes for Comp words for mode Plain, Choice and Mix

class ItemHeadingComp {
    constructor (
        id,
        theme_id,   //idTheme,
        word_id,    //idWord,
        lang_id,    //idLang,
        langName,
        translation,    //wordName,
        spell_base,
        spell_eng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-heading">
                    <p class="heading-text" id="item${this.word_id}Comp${this.lang_id}Heading">${this.langName}</p>
                </div>`;
    }
}

class ItemOptionCompChoice {
    constructor (
        id,
        theme_id,   //idTheme,
        word_id,    //idWord,
        lang_id,    //idLang,
        langName,
        translation,    //wordName,
        spell_base, //spellBase,
        spell_eng,  //spellEng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}OptionWord">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}OptionSpell">&#91;&nbsp;${this.spell_eng}&nbsp;&#93;</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}OptionRadio" checked data-isright="true">
                    </div>                                    
                </div>`;
    }
}

class ItemOption1CompChoice {
    constructor (
        id,
        theme_id,
        word_id,
        lang_id,
        langName,
        translation,
        spell_base,
        spell_eng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option1">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option1Word">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option1Spell">&#91;&nbsp;${this.spell_eng}&nbsp;&#93;</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option1Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption2CompChoice {
    constructor (
        id,
        theme_id,
        word_id,    //idWord,
        lang_id,    //idLang,
        langName,
        translation,    //wordName,
        spell_base,
        spell_eng,
    ) {
        this.id = id;
        this.theme_id = theme_id;
        this.word_id = word_id;
        this.lang_id = lang_id;
        this.langName = langName;
        this.translation = translation;
        this.spell_base = spell_base;
        this.spell_eng = spell_eng;
    }
    render() {
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option2">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option2Word">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option2Spell">&#91;&nbsp;${this.spell_eng}&nbsp;&#93;</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option2Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class CardCompChoice {
    constructor() {
        this.ctaskRows = {};
        this.ccompOptionsChoice = [];//
        this.itemHeadingComp = new ItemHeadingComp();
        this.itemOptionCompChoice = new ItemOptionCompChoice();
        this.itemOption1CompChoice = new ItemOption1CompChoice();//
        this.itemOption2CompChoice = new ItemOption2CompChoice();//
    }
    fetchCardCompChoice(i, j) {
        this.ctaskRows = taskRows[i][j];
    }
    fetchCompOptionsChoice(i, j) {
        this.cTheme = taskRows[i][j].theme_id;  //idTheme;
        this.cLang = taskRows[i][j].lang_id;    //idLang;
        this.cWord = taskRows[i][j].word_id;    //idWord;
        getOptionsChoice(this.cTheme, this.cLang, this.cWord);
        this.ccompOptionsChoice = compOptionsChoise;
    }    
    render(i, j) {
        let itemHeadingCompHtml = '';
        let itemOptionCompChoiceHtml = '';
        let itemOptionCompChoiceV1Html = '';
        let itemOptionCompChoiceV2Html = '';

        let itemHeadingComp = new ItemHeadingComp(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,    //idTheme,
            this.ctaskRows.word_id, //idWord,
            this.ctaskRows.lang_id, //idLang,
            this.ctaskRows.langName,
            this.ctaskRows.translation, //wordName,
            this.ctaskRows.spell_base,  //spellBase,
            this.ctaskRows.spell_eng,   //spellEng,
        );
        
        let itemOptionCompChoice = new ItemOptionCompChoice(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        ); 

        // + two versions

        let itemOptionCompChoiceV1 = new ItemOption1CompChoice(
            this.ccompOptionsChoice[0].id,
            this.ccompOptionsChoice[0].theme_id,
            this.ccompOptionsChoice[0].word_id,
            this.ccompOptionsChoice[0].lang_id,
            this.ccompOptionsChoice[0].langName,
            this.ccompOptionsChoice[0].translation,
            this.ccompOptionsChoice[0].spell_base,
            this.ccompOptionsChoice[0].spell_eng,
        );

        let itemOptionCompChoiceV2 = new ItemOption2CompChoice(
            this.ccompOptionsChoice[1].id,
            this.ccompOptionsChoice[1].theme_id,
            this.ccompOptionsChoice[1].word_id,
            this.ccompOptionsChoice[1].lang_id,
            this.ccompOptionsChoice[1].langName,
            this.ccompOptionsChoice[1].translation,
            this.ccompOptionsChoice[1].spell_base,
            this.ccompOptionsChoice[1].spell_eng,
        );

        this.ctaskRows = itemHeadingComp;
        this.ctaskRows = itemOptionCompChoice;
        this.ctaskRows = itemOptionCompChoiceV1;
        this.ctaskRows = itemOptionCompChoiceV2;
        
        itemHeadingCompHtml = itemHeadingComp.render();
        itemOptionCompChoiceHtml = itemOptionCompChoice.render();
        itemOptionCompChoiceV1Html = itemOptionCompChoiceV1.render();
        itemOptionCompChoiceV2Html = itemOptionCompChoiceV2.render();

        let cardOptions = [];
        cardOptions[0] = itemOptionCompChoiceHtml;
        cardOptions[1] = itemOptionCompChoiceV1Html;
        cardOptions[2] = itemOptionCompChoiceV2Html;
        let cardOptionsRand = randArr(cardOptions);

        let itemCompChoiceHtml = itemHeadingCompHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2];

        document.querySelector("#item"+`${i}`+"Comp"+`${j}`).innerHTML = itemCompChoiceHtml;
    }
}

//  elements for results:
let resultEnjoy = document.getElementById("enjoy");
let resultWorry = document.getElementById("worry");

let resultEnjoy2 = document.getElementById("enjoy2");
let resultWorry2 = document.getElementById("worry2");

console.log("resultEnjoy2 = " + resultEnjoy2.textContent);

let valueEnjoy = resultEnjoy.textContent;
let valueWorry = resultWorry.textContent;

function totalsEnjoy() {
    totalEnjoy.push(valueEnjoy);
    return totalEnjoy;
}
function totalsWorry() {
    totalWorry.push(valueWorry);
    return totalWorry;
}

// row render

for (let i=0; i<taskRows.length; i++) {
    let optionsChoiceTheme = [];

    for (let j=0; j<taskRows[i].length; j++) {
        let thisTheme = taskRows[i][j].theme_id;    //idTheme;
        let thisWord = taskRows[i][j].word_id;  //idWord;
        let thisLang = taskRows[i][j].lang_id;  //idLang;
        let optionsChoiceThemeLang = [];    
        for (let k=0; k<compWords.length; k++) {
            if (compWords[k].theme_id == thisTheme && compWords[k].word_id !== thisWord && compWords[k].lang_id == thisLang) {
                optionsChoiceThemeLang.push(compWords[k]);
            }
        }

        optionsChoiceTheme.push(optionsChoiceThemeLang);
    }
    optionsChoice.push(optionsChoiceTheme);
}

console.log("Options Choice : ");
console.log(optionsChoice);

console.log("Random option Choice: ");

//Function for test row render

function cardCompChoiceDom() {
    for (let j=0; j<taskRows[0].length; j++) {
        let wordNum = taskRows[0][j].word_id;   //idWord;
        compOptionsChoise = [];
    if (taskRows[0][j].lang_id == selectedPrimLang[0].id) {
           const cardPrimHtml = new CardPrim();
           cardPrimHtml.fetchCardPrim(0, j);
           cardPrimHtml.render();
        } else {            
            let parentItem = document.getElementById("item");
            let item = document.createElement("div");
            item.classList.add("item-card");
            item.setAttribute('name', 'itemCardComp'+`${j}`+'Choice');
            item.setAttribute('id', 'item'+'Comp'+`${j}`);
            parentItem.appendChild(item);
            const cardCompChoiceHtml = new CardCompChoice();
            item = cardCompChoiceHtml;
            item.fetchCardCompChoice(0,j);
            item.fetchCompOptionsChoice(0,j);//
            item.render(j);
            
            let cardLang = document.getElementsByName("itemCardComp"+`${j}`+"Choice");
            let cardItemOptions = cardLang[0].getElementsByClassName("item-option");
            let cardLangRadios = cardLang[0].getElementsByClassName("option-radio");

            for (let m=0; m < cardLangRadios.length; m++) {
                cardLangRadios[m].name = 'item' + wordNum + 'Comp' + `${j}`;//
            }
            
            let radioChecked = randEl(cardLangRadios);
            radioChecked.checked = true;

            for (let n=0; n < cardLangRadios.length; n++) {
                cardLangRadios[n].addEventListener('click', function() {
                    if (cardLangRadios[n].getAttribute('data-isright') == "false") {
                        cardItemOptions[n].style.backgroundColor = "#fccfe0";
                    } else {
                        cardItemOptions[n].style.backgroundColor = "#c2fceb";
                    }
                });
            }
            console.log(cardLangRadios[1].getAttribute('data-isright'));
        }
    }
}

//Function get element from array by random index
function randEl(array) {
    const randIndex = Math.floor(Math.random() * array.length);
    return array[randIndex];    // randElement;
}

function randArr(array) {
    for (let i=array.length-1; i > 0; i--){
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

///////////////////////
//Define task rows with options array for mode Choice

for (let i=0; i < taskRows.length; i++) {
    let rowTheme = taskRows[i][0].theme_id; //idTheme;
    let rowWord = taskRows[i][0].word_id;   //idWord;
   
    for (let j=0; j < taskRows[i].length; j++) {
        let optionLang = taskRows[i][j].lang_id;    //idLang;
        let optionsChoice = [];

        optionsChoice[j] = taskRows[i][j];
        optionsChoice[j].isRight = true;
    }

    taskRowsOptions.push(taskRows[i]);
}

console.log("Task rows options :");
console.log(taskRowsOptions);

//Function get random comp options from comp words array by theme and lang

function getOptionsChoice(themeId, langId, wordId) {
    compOptionsChoise = [];
    compWordsTheme = [];
    for (let k=0; k < compWords.length; k++) {
        if (compWords[k].lang_id !== langId) {
            continue;
        } else if (compWords[k].theme_id == themeId && wordId !== compWords[k].word_id) {
            compWordsTheme.push(compWords[k]);//
        } else { continue;}         
    }
  
    let option1 = randEl(compWordsTheme);
    let newCompWordsTheme = compWordsTheme.filter(item => item !== option1);
    let option2 = randEl(newCompWordsTheme);
    option1.isRight = false;
    option2.isRight = false;
    compOptionsChoise.push(option1, option2);
    return compOptionsChoise;
}

// //Example for get random comp options

//Function for Rows counter
let rowsList = document.getElementsByClassName("task-mode");
let rowsNum = rowsList.length;
console.log("Rows num = " + rowsNum);

////Function for  any rows render

// array - example from taskRows[]
console.log('All rows number (taskRows.length) : ' + taskRows.length);
let taskRowsTest = [];
let arrNum = (taskRows.length - 1);   

for (let m=0; m <= arrNum; m++) {
    taskRowsTest[m] = taskRows[m];
}

console.log("array Task rows test for render: ");
console.log(taskRowsTest);
console.log("taskRowsTest length : " + taskRowsTest.length);

function createRow(index) {
    let rowsBlock = document.getElementById("taskModeChoice");
    let rowItem = document.createElement("div");    // create row i
    rowItem.classList.add("task-mode");//
    rowItem.setAttribute('name', 'row'+`${index}`);
    rowItem.setAttribute('id', 'item'+`${index}`);
    rowsBlock.appendChild(rowItem);
}

function rowsCompChoiceDom() {
    for (let i=0; i < (arrNum+1); i++) {

        for (let j=0; j<taskRowsTest[i].length; j++) {
            let wordNum = taskRowsTest[i][j].word_id;   //idWord;
            compOptionsChoise = [];
        if (taskRowsTest[i][j].lang_id == selectedPrimLang[0].id) {
            createRow(i);
            let parentItem = document.getElementById("item"+`${i}`);
            let itemPrim = document.createElement("div");   // create row's Prim card
            itemPrim.classList.add("item-card-base");
            itemPrim.setAttribute('name', 'item' + `${i}` + 'CardBase');
            itemPrim.setAttribute('id', 'item' + `${i}` + 'Base');
            parentItem.appendChild(itemPrim);

            const cardPrimHtml = new CardPrim();
            cardPrimHtml.fetchCardPrim(i, j);
            cardPrimHtml.render(i);
            } else {

                let parentItem = document.getElementById("item"+`${i}`);
                let item = document.createElement("div");   // create lang's card i,j
                item.classList.add("item-card");
                item.setAttribute('name', 'item'+`${i}`+'CardComp'+`${j}`+'Choice');
                item.setAttribute('id', 'item'+`${i}`+'Comp'+`${j}`);
                parentItem.appendChild(item);
                const cardCompChoiceHtml = new CardCompChoice();    // render lang's card i,j
                item = cardCompChoiceHtml;
                item.fetchCardCompChoice(i,j);
                item.fetchCompOptionsChoice(i,j);//
                item.render(i,j);
                
                let cardLang = document.getElementsByName("item"+`${i}`+"CardComp"+`${j}`+"Choice");
                let cardItemOptions = cardLang[0].getElementsByClassName("item-option");
                let cardLangRadios = cardLang[0].getElementsByClassName("option-radio");

                for (let m=0; m < cardLangRadios.length; m++) {
                    cardLangRadios[m].name = 'item' + `${i}` + wordNum + 'Comp' + `${j}`;//
                }
                
                let radioChecked = randEl(cardLangRadios);
                radioChecked.checked = true;

                for (let n=0; n < cardLangRadios.length; n++) {
                    cardLangRadios[n].addEventListener('click', function() {
                        if (cardLangRadios[n].getAttribute('data-isright') == "false") {
                            cardItemOptions[n].style.backgroundColor = "#fccfe0";
                            valueWorry++;
                            resultWorry.textContent = valueWorry;
                            resultWorry2.textContent = valueWorry;
                        } else {
                            cardItemOptions[n].style.backgroundColor = "#c2fceb";
                            valueEnjoy++;
                            resultEnjoy.textContent = valueEnjoy;
                            resultEnjoy2.textContent = valueEnjoy;
                        }
                    });
                }
            }
        }
    }
}

function pageRowsCompChoiceDom(firstIndex, lastIndex) {
    for (let i=firstIndex; i < (lastIndex); i++) {
        for (let j=0; j<taskRowsTest[i].length; j++) {
            let wordNum = taskRowsTest[i][j].word_id;   //idWord;
            compOptionsChoise = [];
        if (taskRowsTest[i][j].lang_id == selectedPrimLang[0].id) {
            createRow(i);
            let parentItem = document.getElementById("item"+`${i}`);
            let itemPrim = document.createElement("div");   // create row's Prim card
            itemPrim.classList.add("item-card-base");
            itemPrim.setAttribute('name', 'item' + `${i}` + 'CardBase');
            itemPrim.setAttribute('id', 'item' + `${i}` + 'Base');
            parentItem.appendChild(itemPrim);

            const cardPrimHtml = new CardPrim();
            cardPrimHtml.fetchCardPrim(i, j);
            cardPrimHtml.render(i);
            } else {

                let parentItem = document.getElementById("item"+`${i}`);
                let item = document.createElement("div");   // create lang's card i,j
                item.classList.add("item-card");

                item.setAttribute('name', 'item'+`${i}`+'CardComp'+`${j}`+'Choice');
                item.setAttribute('id', 'item'+`${i}`+'Comp'+`${j}`);
                parentItem.appendChild(item);

                const cardCompChoiceHtml = new CardCompChoice();    // render lang's card i,j
                item = cardCompChoiceHtml;
                item.fetchCardCompChoice(i,j);
                item.fetchCompOptionsChoice(i,j);//
                item.render(i,j);
                
                let cardLang = document.getElementsByName("item"+`${i}`+"CardComp"+`${j}`+"Choice");

                let cardItemOptions = cardLang[0].getElementsByClassName("item-option");
                let cardLangRadios = cardLang[0].getElementsByClassName("option-radio");

                for (let m=0; m < cardLangRadios.length; m++) {
                    cardLangRadios[m].name = 'item' + `${i}` + wordNum + 'Comp' + `${j}`;//
                }
           
                let radioChecked = randEl(cardLangRadios);
                radioChecked.checked = true;

                for (let n=0; n < cardLangRadios.length; n++) {
                    cardLangRadios[n].addEventListener('click', function() {

                        if (cardLangRadios[n].getAttribute('data-isright') == "false") {
                            cardItemOptions[n].style.backgroundColor = "#fccfe0";
                            valueWorry++;
                            resultWorry.textContent = valueWorry;
                            resultWorry2.textContent = valueWorry;

                        } else {
                            cardItemOptions[n].style.backgroundColor = "#c2fceb";
                            valueEnjoy++;
                            resultEnjoy.textContent = valueEnjoy;
                            resultEnjoy2.textContent = valueEnjoy;
                        }
                    });
                }
            }
        }
    }
}

/// Save totals by Exit button

let exitChoice = document.getElementById("exitChoice");
let totalsChoice = [];

setResultsChoice();

function setResultsChoice() {    
    exitChoice.addEventListener('click', () => {
        totalsEnjoy();
        totalsWorry();
        totalsChoice.push(totalEnjoy, totalWorry);
        localStorage.setItem('totalsChoice', totalsChoice);
    });
}

