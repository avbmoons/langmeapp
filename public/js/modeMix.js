let optionsMix = [];//
let taskRowsOptions = [];//
let compWordsTheme = [];//
let compOptionsMix = [];//
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
        return `<div class="item-heading">
                    <p class="heading-text" id="item${this.word_id}HeadingBase" style="font-size: 1.39vw;">${this.langName}</p>
                </div>`;
    }
}

class ItemOptionPrim {
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
        return `<div class="item-option base">
                    <p class="item-word base" id="item${this.word_id}WordBase" style="font-size: 1.25vw;">${this.translation}</p>
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
        return `<div class="item-heading">
                    <p class="heading-text" id="item${this.word_id}Comp${this.lang_id}Heading" style="font-size: 1.39vw;">${this.langName}</p>
                </div>`;
    }
}

class ItemOptionCompMix {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}OptionWord" style="display: none;">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}OptionSpell" style="font-size: 1.25vw;">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}OptionRadio" checked data-isright="true">
                    </div>                                    
                </div>`;
    }
}

class ItemOption1CompMix {
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
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option1Word" style="display: none;">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option1Spell" style="font-size: 1.25vw;">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option1Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption2CompMix {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option2">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option2Word" style="display: none;">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option2Spell" style="font-size: 1.25vw;">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option2Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption3CompMix {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option3">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option3Word" style="display: none;">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option3Spell" style="font-size: 1.25vw;">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option3Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}


class CardCompMix {
    constructor() {
        this.ctaskRows = {};
        this.ccompOptionsMix = [];//
        this.itemHeadingComp = new ItemHeadingComp();
        this.itemOptionCompMix = new ItemOptionCompMix();
        this.itemOption1CompMix = new ItemOption1CompMix();//
        this.itemOption2CompMix = new ItemOption2CompMix();//
        this.itemOption3CompMix = new ItemOption3CompMix();//
    }
    fetchCardCompMix(i, j) {
        this.ctaskRows = taskRows[i][j];
    }
    fetchCompOptionsMix(i, j) {
        this.cTheme = taskRows[i][j].theme_id;
        this.cLang = taskRows[i][j].lang_id;
        this.cWord = taskRows[i][j].word_id;
        getOptionsMix(this.cTheme, this.cLang, this.cWord);
        this.ccompOptionsMix = compOptionsMix;
    }    
    render(i, j) {
        let itemHeadingCompHtml = '';
        let itemOptionCompMixHtml = '';
        let itemOptionCompMixV1Html = '';
        let itemOptionCompMixV2Html = '';
        let itemOptionCompMixV3Html = '';

        let itemHeadingComp = new ItemHeadingComp(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        );
        
        let itemOptionCompMix = new ItemOptionCompMix(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        ); 

        // + three versions
        let itemOptionCompMixV1;
        let itemOptionCompMixV2;
        let itemOptionCompMixV3;
        let cardOptions = [];

        switch (arrSelectedCompLangs.length) {
            case 2:
                itemOptionCompMixV1 = new ItemOption1CompMix(
                    this.ccompOptionsMix[0].id,
                    this.ccompOptionsMix[0].theme_id,
                    this.ccompOptionsMix[0].word_id,
                    this.ccompOptionsMix[0].lang_id,
                    this.ccompOptionsMix[0].langName,
                    this.ccompOptionsMix[0].translation,
                    this.ccompOptionsMix[0].spell_base,
                    this.ccompOptionsMix[0].spell_eng,
                );
                this.ctaskRows = itemOptionCompMixV1;//
                itemOptionCompMixV1Html = itemOptionCompMixV1.render();//
                cardOptions[1] = itemOptionCompMixV1Html;//
                break;
            case 3:
                itemOptionCompMixV1 = new ItemOption1CompMix(
                    this.ccompOptionsMix[0].id,
                    this.ccompOptionsMix[0].theme_id,
                    this.ccompOptionsMix[0].word_id,
                    this.ccompOptionsMix[0].lang_id,
                    this.ccompOptionsMix[0].langName,
                    this.ccompOptionsMix[0].translation,
                    this.ccompOptionsMix[0].spell_base,
                    this.ccompOptionsMix[0].spell_eng,
                );

                itemOptionCompMixV2 = new ItemOption2CompMix(
                    this.ccompOptionsMix[1].id,
                    this.ccompOptionsMix[1].theme_id,
                    this.ccompOptionsMix[1].word_id,
                    this.ccompOptionsMix[1].lang_id,
                    this.ccompOptionsMix[1].langName,
                    this.ccompOptionsMix[1].translation,
                    this.ccompOptionsMix[1].spell_base,
                    this.ccompOptionsMix[1].spell_eng,
                );
                this.ctaskRows = itemOptionCompMixV1;//
                this.ctaskRows = itemOptionCompMixV2;//
                itemOptionCompMixV1Html = itemOptionCompMixV1.render();//
                itemOptionCompMixV2Html = itemOptionCompMixV2.render();//
                cardOptions[1] = itemOptionCompMixV1Html;//
                cardOptions[2] = itemOptionCompMixV2Html;//
                break;
            case 4:
                itemOptionCompMixV1 = new ItemOption1CompMix(
                    this.ccompOptionsMix[0].id,
                    this.ccompOptionsMix[0].theme_id,
                    this.ccompOptionsMix[0].word_id,
                    this.ccompOptionsMix[0].lang_id,
                    this.ccompOptionsMix[0].langName,
                    this.ccompOptionsMix[0].translation,
                    this.ccompOptionsMix[0].spell_base,
                    this.ccompOptionsMix[0].spell_eng,
                );

                itemOptionCompMixV2 = new ItemOption2CompMix(
                    this.ccompOptionsMix[1].id,
                    this.ccompOptionsMix[1].theme_id,
                    this.ccompOptionsMix[1].word_id,
                    this.ccompOptionsMix[1].lang_id,
                    this.ccompOptionsMix[1].langName,
                    this.ccompOptionsMix[1].translation,
                    this.ccompOptionsMix[1].spell_base,
                    this.ccompOptionsMix[1].spell_eng,
                );

                itemOptionCompMixV3 = new ItemOption3CompMix(
                    this.ccompOptionsMix[2].id,
                    this.ccompOptionsMix[2].theme_id,
                    this.ccompOptionsMix[2].word_id,
                    this.ccompOptionsMix[2].lang_id,
                    this.ccompOptionsMix[2].langName,
                    this.ccompOptionsMix[2].translation,
                    this.ccompOptionsMix[2].spell_base,
                    this.ccompOptionsMix[2].spell_eng,
                );
                this.ctaskRows = itemOptionCompMixV1;//
                this.ctaskRows = itemOptionCompMixV2;//
                this.ctaskRows = itemOptionCompMixV3;//
                itemOptionCompMixV1Html = itemOptionCompMixV1.render();//
                itemOptionCompMixV2Html = itemOptionCompMixV2.render();//
                itemOptionCompMixV3Html = itemOptionCompMixV3.render();//
                cardOptions[1] = itemOptionCompMixV1Html;//
                cardOptions[2] = itemOptionCompMixV2Html;//
                cardOptions[3] = itemOptionCompMixV3Html;//
                break;
        }

        this.ctaskRows = itemHeadingComp;
        this.ctaskRows = itemOptionCompMix;
        
        itemHeadingCompHtml = itemHeadingComp.render();
        itemOptionCompMixHtml = itemOptionCompMix.render();

        cardOptions[0] = itemOptionCompMixHtml;

        let cardOptionsRand = randArr(cardOptions);

        let itemCompMixHtml;

        switch (arrSelectedCompLangs.length) {
            case 1:
                itemCompMixHtml = itemHeadingCompHtml + cardOptionsRand[0];
                break;
            case 2:
                itemCompMixHtml = itemHeadingCompHtml + cardOptionsRand[0] + cardOptionsRand[1];
                break;
            case 3:
                itemCompMixHtml = itemHeadingCompHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2];
                break;
            case 4:
                itemCompMixHtml = itemHeadingCompHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2] + cardOptionsRand[3];
                break;
        }

        document.querySelector("#item"+`${i}`+"Comp"+`${j}`).innerHTML = itemCompMixHtml;
    }
}

//  elements for results:
let resultEnjoy = document.getElementById("enjoy");
let resultWorry = document.getElementById("worry");

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

// Define array for "isRight == true" words in task from compWords[]

for (let i=0; i<taskRows.length; i++) {
    let optionsMixTheme = [];

    for (let j=0; j<taskRows[i].length; j++) {
        let thisTheme = taskRows[i][j].theme_id;
        let thisWord = taskRows[i][j].word_id;
        let thisLang = taskRows[i][j].lang_id;
        let optionsMixThemeLang = [];    
        for (let k=0; k<compWords.length; k++) {
            if (compWords[k].theme_id == thisTheme && compWords[k].word_id !== thisWord && compWords[k].lang_id == thisLang) {
                optionsMixThemeLang.push(compWords[k]);
            }
        }

        optionsMixTheme.push(optionsMixThemeLang);
    }
    optionsMix.push(optionsMixTheme);
}

console.log("Options Mix : ");
console.log(optionsMix);

console.log("Random option Mix: ");

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
//Define task rows with options array for mode Mix

for (let i=0; i < taskRows.length; i++) {
    let rowTheme = taskRows[i][0].theme_id;
    let rowWord = taskRows[i][0].word_id;
   
    for (let j=0; j < taskRows[i].length; j++) {
        let optionLang = taskRows[i][j].lang_id;
        let optionsMix = [];

        optionsMix[j] = taskRows[i][j];
        optionsMix[j].isRight = true;
    }

    taskRowsOptions.push(taskRows[i]);
}

console.log("Task rows options :");
console.log(taskRowsOptions);

//Function get random comp options from comp words array by theme and lang

function getOptionsMix(themeId, langId, wordId) {
    compOptionsMix = [];
    compWordsTheme = [];

    for (let k=0; k < compWords.length; k++) {
        if (wordId !== compWords[k].word_id) {
            continue;
        } else if (compWords[k].theme_id == themeId && compWords[k].lang_id !== langId) {
            compWordsTheme.push(compWords[k]);//
        } else { continue;}         
    }

    let option1;
    let option2;
    let option3;
    let newCompWordsTheme;
    let otherNewCompWordsTheme;

    switch (arrSelectedCompLangs.length) {
        case 2:
            option1 = randEl(compWordsTheme);
            compOptionsMix.push(option1);
            break;
        case 3:
            option1 = randEl(compWordsTheme);
            newCompWordsTheme = compWordsTheme.filter(item => item !== option1);
            option2 = randEl(newCompWordsTheme);
            compOptionsMix.push(option1, option2);
            break;
        case 4:
            option1 = randEl(compWordsTheme);
            newCompWordsTheme = compWordsTheme.filter(item => item !== option1);
            option2 = randEl(newCompWordsTheme);
            otherNewCompWordsTheme = compWordsTheme.filter(item => item !== option1 && item !== option2);
            option3 = randEl(otherNewCompWordsTheme);
            option1.isRight = false;
            option2.isRight = false;
            option3.isRight = false;
            compOptionsMix.push(option1, option2, option3);
            break;
    }
   
    return compOptionsMix;
}

// //Example for get random comp options

console.log(compOptionsMix);

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
    let rowsBlock = document.getElementById("taskModeMix");
    let rowItem = document.createElement("div");    // create row i
    rowItem.classList.add("task-mode");//
    rowItem.setAttribute('name', 'row'+`${index}`);
    rowItem.setAttribute('id', 'item'+`${index}`);
    rowsBlock.appendChild(rowItem);
}


function pageRowsCompMixDom(firstIndex, lastIndex) {
    for (let i=firstIndex; i < (lastIndex); i++) {
        for (let j=0; j<taskRowsTest[i].length; j++) {
            let wordNum = taskRowsTest[i][j].word_id;
            compOptionsMix = [];
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

                item.setAttribute('name', 'item'+`${i}`+'CardComp'+`${j}`+'Mix');
                item.setAttribute('id', 'item'+`${i}`+'Comp'+`${j}`);
                parentItem.appendChild(item);

                const cardCompMixHtml = new CardCompMix();    // render lang's card i,j
                item = cardCompMixHtml;
                item.fetchCardCompMix(i,j);
                item.fetchCompOptionsMix(i,j);//
                item.render(i,j);
                
                let cardLang = document.getElementsByName("item"+`${i}`+"CardComp"+`${j}`+"Mix");

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

                        } else {
                            cardItemOptions[n].style.backgroundColor = "#c2fceb";
                            valueEnjoy++;
                            resultEnjoy.textContent = valueEnjoy;
                        }
                    });
                }

            }
        }
    }
}

/// Save totals by Exit button

let exitMix = document.getElementById("exitMix");
let totalsMix = [];

setResultsMix();

function setResultsMix() {    
    exitMix.addEventListener('click', () => {
        totalsEnjoy();
        totalsWorry();
        totalsMix.push(totalEnjoy, totalWorry);
        localStorage.setItem('totalsMix', totalsMix);
    });
}

