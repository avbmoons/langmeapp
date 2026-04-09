let optionsLang = [];
let taskRowsOptions = [];
let compWordsTheme = [];
let compOptionsLang = [];
let totalEnjoy = [];
let totalWorry = [];

//Classes for Prim words for modes: Plain, Choice and Mix

class ItemHeadingPrimLang {
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
        return `<div class="item-heading" style="background-color: #f7d5a1;">
                    <p class="heading-text" id="item${this.word_id}HeadingBase" style="font-size: 1.39vw;">${this.translation}</p>
                </div>`;
    }
}

class ItemOptionPrimLang {
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
        return `<div class="item-option base" style="background-color: #f2f7f7;">
                    <p class="item-word base" id="item${this.word_id}WordBase" style="font-size: 1.25vw; font-weight: 300; background-color: #f2f7f7;">${this.langName}</p>
                </div>`;
    }
}

class CardPrimLang {
    constructor() {
        this.ctaskRows = {};
        this.itemHeadingPrimLang = new ItemHeadingPrimLang();
        this.itemOptionPrimLang = new ItemOptionPrimLang();
    }
    fetchCardPrimLang(i, j) {
        this.ctaskRows = taskRows[i][j];
        
    }
    render(i) {
        let itemHeadingPrimLangHtml = '';
        let itemOptionPrimLangHtml = '';

        let itemHeadingPrimLang = new ItemHeadingPrimLang(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        );
        
        let itemOptionPrimLang = new ItemOptionPrimLang(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        ); 

        this.ctaskRows = itemHeadingPrimLang;
        this.ctaskRows = itemOptionPrimLang;
        
        itemHeadingPrimLangHtml = itemHeadingPrimLang.render();
        itemOptionPrimLangHtml = itemOptionPrimLang.render();
        let itemPrimLangHtml = itemHeadingPrimLangHtml + itemOptionPrimLangHtml;
        document.querySelector("#item"+`${i}`+"Base").innerHTML = itemPrimLangHtml;
    }
}

// //Classes for Comp words for mode Plain, Choice and Mix

class ItemHeadingCompLang {
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
        return `<div class="item-heading-lang">
                    <p class="heading-text" id="item${this.word_id}Comp${this.lang_id}Heading" style="font-size: 1.39vw;">${this.spell_eng}</p>
                </div>`;
    }
}

class ItemOptionCompLang {
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
        return `<div class="item-option-lang" id="item${this.word_id}Comp${this.lang_id}Option">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}OptionWord" style="display: none;">${this.langName}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}OptionSpell" style="font-size: 1.25vw;">${this.langName}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}OptionRadio" checked data-isright="true">
                    </div>                                    
                </div>`;
    }
}

class ItemOption1CompLang {
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
        return `<div class="item-option-lang" id="item${this.word_id}Comp${this.lang_id}Option1">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option1Word" style="display: none;">${this.langName}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option1Spell" style="font-size: 1.25vw;">${this.langName}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option1Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption2CompLang {
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
        return `<div class="item-option-lang" id="item${this.word_id}Comp${this.lang_id}Option2">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option2Word" style="display: none;">${this.langName}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option2Spell" style="font-size: 1.25vw;">${this.langName}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option2Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption3CompLang {
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
        return `<div class="item-option-lang" id="item${this.word_id}Comp${this.lang_id}Option3">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option3Word" style="display: none;">${this.langName}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option3Spell" style="font-size: 1.25vw;">${this.langName}</p>
                    </div>
                    <div class="option-radio-block">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option3Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class CardCompLang {
    constructor() {
        this.ctaskRows = {};
        this.ccompOptionsLang = [];//
        this.itemHeadingCompLang = new ItemHeadingCompLang();
        this.itemOptionCompLang = new ItemOptionCompLang();
        this.itemOption1CompLang = new ItemOption1CompLang();
        this.itemOption2CompLang = new ItemOption2CompLang();
        this.itemOption3CompLang = new ItemOption3CompLang();
    }
    fetchCardCompLang(i, j) {
        this.ctaskRows = taskRows[i][j];
    }
    fetchCompOptionsLang(i, j) {
        this.cTheme = taskRows[i][j].theme_id;
        this.cLang = taskRows[i][j].lang_id;
        this.cWord = taskRows[i][j].word_id;
        getOptionsLang(this.cTheme, this.cLang, this.cWord);
        this.ccompOptionsLang = compOptionsLang;
    }    
    render(i, j) {
        let itemHeadingCompLangHtml = '';
        let itemOptionCompLangHtml = '';
        let itemOptionCompLangV1Html = '';
        let itemOptionCompLangV2Html = '';
        let itemOptionCompLangV3Html = '';

        let itemHeadingCompLang = new ItemHeadingCompLang(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        );
        
        let itemOptionCompLang = new ItemOptionCompLang(
            this.ctaskRows.id,
            this.ctaskRows.theme_id,
            this.ctaskRows.word_id,
            this.ctaskRows.lang_id,
            this.ctaskRows.langName,
            this.ctaskRows.translation,
            this.ctaskRows.spell_base,
            this.ctaskRows.spell_eng,
        ); 
        console.log("itemOptionCompLang.constructor.name = " + itemOptionCompLang.constructor.name);

        // + three versions
        let itemOptionCompLangV1;
        let itemOptionCompLangV2;
        let itemOptionCompLangV3;
        let cardOptions = [];

        switch (arrSelectedCompLangs.length) {
            case 2:
                itemOptionCompLangV1 = new ItemOption1CompLang(
                    this.ccompOptionsLang[0].id,
                    this.ccompOptionsLang[0].theme_id,
                    this.ccompOptionsLang[0].word_id,
                    this.ccompOptionsLang[0].lang_id,
                    this.ccompOptionsLang[0].langName,
                    this.ccompOptionsLang[0].translation,
                    this.ccompOptionsLang[0].spell_base,
                    this.ccompOptionsLang[0].spell_eng,
                );                
                this.ctaskRows = itemOptionCompLangV1;
                itemOptionCompLangV1Html = itemOptionCompLangV1.render();
                cardOptions[1] = itemOptionCompLangV1Html;
                break;
            case 3:
                itemOptionCompLangV1 = new ItemOption1CompLang(
                    this.ccompOptionsLang[0].id,
                    this.ccompOptionsLang[0].theme_id,
                    this.ccompOptionsLang[0].word_id,
                    this.ccompOptionsLang[0].lang_id,
                    this.ccompOptionsLang[0].langName,
                    this.ccompOptionsLang[0].translation,
                    this.ccompOptionsLang[0].spell_base,
                    this.ccompOptionsLang[0].spell_eng,
                );

                itemOptionCompLangV2 = new ItemOption2CompLang(
                    this.ccompOptionsLang[1].id,
                    this.ccompOptionsLang[1].theme_id,
                    this.ccompOptionsLang[1].word_id,
                    this.ccompOptionsLang[1].lang_id,
                    this.ccompOptionsLang[1].langName,
                    this.ccompOptionsLang[1].translation,
                    this.ccompOptionsLang[1].spell_base,
                    this.ccompOptionsLang[1].spell_eng,
                );
                this.ctaskRows = itemOptionCompLangV1;//
                this.ctaskRows = itemOptionCompLangV2;//
                itemOptionCompLangV1Html = itemOptionCompLangV1.render();//
                itemOptionCompLangV2Html = itemOptionCompLangV2.render();//
                cardOptions[1] = itemOptionCompLangV1Html;//
                cardOptions[2] = itemOptionCompLangV2Html;//
                break;
            case 4:
                itemOptionCompLangV1 = new ItemOption1CompLang(
                    this.ccompOptionsLang[0].id,
                    this.ccompOptionsLang[0].theme_id,
                    this.ccompOptionsLang[0].word_id,
                    this.ccompOptionsLang[0].lang_id,
                    this.ccompOptionsLang[0].langName,
                    this.ccompOptionsLang[0].translation,
                    this.ccompOptionsLang[0].spell_base,
                    this.ccompOptionsLang[0].spell_eng,
                );

                itemOptionCompLangV2 = new ItemOption2CompLang(
                    this.ccompOptionsLang[1].id,
                    this.ccompOptionsLang[1].theme_id,
                    this.ccompOptionsLang[1].word_id,
                    this.ccompOptionsLang[1].lang_id,
                    this.ccompOptionsLang[1].langName,
                    this.ccompOptionsLang[1].translation,
                    this.ccompOptionsLang[1].spell_base,
                    this.ccompOptionsLang[1].spell_eng,
                );

                itemOptionCompLangV3 = new ItemOption3CompLang(
                    this.ccompOptionsLang[2].id,
                    this.ccompOptionsLang[2].theme_id,
                    this.ccompOptionsLang[2].word_id,
                    this.ccompOptionsLang[2].lang_id,
                    this.ccompOptionsLang[2].langName,
                    this.ccompOptionsLang[2].translation,
                    this.ccompOptionsLang[2].spell_base,
                    this.ccompOptionsLang[2].spell_eng,
                );
                this.ctaskRows = itemOptionCompLangV1;//
                this.ctaskRows = itemOptionCompLangV2;//
                this.ctaskRows = itemOptionCompLangV3;//
                itemOptionCompLangV1Html = itemOptionCompLangV1.render();//
                itemOptionCompLangV2Html = itemOptionCompLangV2.render();//
                itemOptionCompLangV3Html = itemOptionCompLangV3.render();//
                cardOptions[1] = itemOptionCompLangV1Html;//
                cardOptions[2] = itemOptionCompLangV2Html;//
                cardOptions[3] = itemOptionCompLangV3Html;//
                break;
        }


        this.ctaskRows = itemHeadingCompLang;
        this.ctaskRows = itemOptionCompLang;
        
        itemHeadingCompLangHtml = itemHeadingCompLang.render();
        itemOptionCompLangHtml = itemOptionCompLang.render();

        cardOptions[0] = itemOptionCompLangHtml;

        let cardOptionsRand = randArr(cardOptions);

        let itemCompLangHtml;

        switch (arrSelectedCompLangs.length) {
            case 1:
                itemCompLangHtml = itemHeadingCompLangHtml + cardOptionsRand[0];
                break;
            case 2:
                itemCompLangHtml = itemHeadingCompLangHtml + cardOptionsRand[0] + cardOptionsRand[1];
                break;
            case 3:
                itemCompLangHtml = itemHeadingCompLangHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2];
                break;
            case 4:
                itemCompLangHtml = itemHeadingCompLangHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2] + cardOptionsRand[3];
                break;
        }

        document.querySelector("#item"+`${i}`+"Comp"+`${j}`).innerHTML = itemCompLangHtml;
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

for (let i=0; i<taskRows.length; i++) {
    let optionsLangTheme = [];

    for (let j=0; j<taskRows[i].length; j++) {
        let thisTheme = taskRows[i][j].theme_id;
        let thisWord = taskRows[i][j].word_id;
        let thisLang = taskRows[i][j].lang_id;
        let optionsLangThemeLang = [];    
        for (let k=0; k<compWords.length; k++) {
            if (compWords[k].theme_id == thisTheme && compWords[k].word_id !== thisWord && compWords[k].lang_id == thisLang) {
                optionsLangThemeLang.push(compWords[k]);
            }
        }

        optionsLangTheme.push(optionsLangThemeLang);
    }
    optionsLang.push(optionsLangTheme);
}

console.log("Options Lang : ");
console.log(optionsLang);

console.log("Random option Lang: ");

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
//Define task rows with options array for mode Lang

for (let i=0; i < taskRows.length; i++) {
    let rowTheme = taskRows[i][0].theme_id;
    let rowWord = taskRows[i][0].word_id;
   
    for (let j=0; j < taskRows[i].length; j++) {
        let optionsLang = [];

        optionsLang[j] = taskRows[i][j];
        optionsLang[j].isRight = true;
    }

    taskRowsOptions.push(taskRows[i]);
}

console.log("Task rows options :");
console.log(taskRowsOptions);

//Function get random comp options from comp words array by theme and lang

function getOptionsLang(themeId, langId, wordId) {
    compOptionsLang = [];
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
            compOptionsLang.push(option1);
            break;
        case 3:
            option1 = randEl(compWordsTheme);
            newCompWordsTheme = compWordsTheme.filter(item => item !== option1);
            option2 = randEl(newCompWordsTheme);
            compOptionsLang.push(option1, option2);
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
            compOptionsLang.push(option1, option2, option3);
            break;
    }

    return compOptionsLang;
}

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

//rowsCompChoiceDom();

function createRow(index) {
    let rowsBlock = document.getElementById("taskModeLang");
    let rowItem = document.createElement("div");    // create row i
    rowItem.classList.add("task-mode");//
    rowItem.setAttribute('name', 'row'+`${index}`);
    rowItem.setAttribute('id', 'item'+`${index}`);
    rowsBlock.appendChild(rowItem);
}


function pageRowsCompLangDom(firstIndex, lastIndex) {
    for (let i=firstIndex; i < (lastIndex); i++) {
        for (let j=0; j<taskRowsTest[i].length; j++) {
            let wordNum = taskRowsTest[i][j].word_id;
            compOptionsLang = [];
        if (taskRowsTest[i][j].lang_id == selectedPrimLang[0].id) {
            createRow(i);
            let parentItem = document.getElementById("item"+`${i}`);
            let itemPrim = document.createElement("div");   // create row's Prim card
            itemPrim.classList.add("item-card-base");
            itemPrim.setAttribute('name', 'item' + `${i}` + 'CardBase');
            itemPrim.setAttribute('id', 'item' + `${i}` + 'Base');
            parentItem.appendChild(itemPrim);

            const cardPrimLangHtml = new CardPrimLang();
            cardPrimLangHtml.fetchCardPrimLang(i, j);
            cardPrimLangHtml.render(i);
            } else {

                let parentItem = document.getElementById("item"+`${i}`);
                let item = document.createElement("div");   // create lang's card i,j
                item.classList.add("item-card");

                item.setAttribute('name', 'item'+`${i}`+'CardComp'+`${j}`+'Lang');
                item.setAttribute('id', 'item'+`${i}`+'Comp'+`${j}`);
                parentItem.appendChild(item);

                const cardCompLangHtml = new CardCompLang();    // render lang's card i,j
                item = cardCompLangHtml;
                item.fetchCardCompLang(i,j);
                item.fetchCompOptionsLang(i,j);//
                item.render(i,j);
                
                let cardLang = document.getElementsByName("item"+`${i}`+"CardComp"+`${j}`+"Lang");

                let cardItemOptions = cardLang[0].getElementsByClassName("item-option-lang");
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

let exitLang = document.getElementById("exitLang");
let totalsLang = [];

setResultsLang();

function setResultsLang() {    
    exitLang.addEventListener('click', () => {
        totalsEnjoy();
        totalsWorry();
        totalsLang.push(totalEnjoy, totalWorry);
        localStorage.setItem('totalsLang', totalsLang);
    });
}

