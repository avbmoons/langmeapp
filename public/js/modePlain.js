let optionsPlain = [];
let taskRowsOptions = [];
let compWordsTheme = [];
let compOptionsPlain = [];

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
        return `<div class="item-heading" style="height: 40%;">
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
        return `<div class="item-option base" style="height: 60%;">
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
        return `<div class="item-heading" style="height: 40%;">
                    <p class="heading-text" id="item${this.word_id}Comp${this.lang_id}Heading">${this.langName}</p>
                </div>`;
    }
}

class ItemOptionCompPlain {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option" style="height: 60%;">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}OptionWord">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}OptionSpell">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block" style="display: none;">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}OptionRadio" checked data-isright="true">
                    </div>                                    
                </div>`;
    }
}

class ItemOption1CompPlain {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option1" style="display: none;">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option1Word">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option1Spell">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block" style="display: none;">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option1Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class ItemOption2CompPlain {
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
        return `<div class="item-option" id="item${this.word_id}Comp${this.lang_id}Option2" style="display: none;">
                    <div class="option-word-block">
                        <p class="option-word" id="item${this.word_id}Comp${this.lang_id}Option2Word">${this.translation}</p>
                        <p class="option-spell" id="item${this.word_id}Comp${this.lang_id}Option2Spell">${this.spell_eng}</p>
                    </div>
                    <div class="option-radio-block" style="display: none;">
                        <input class="option-radio" name="item${this.word_id}Comp${this.lang_id}" type="radio" id="item${this.word_id}Comp${this.lang_id}Option2Radio" data-isright="false">
                    </div>                                    
                </div>`;
    }
}

class CardCompPlain {
    constructor() {
        this.ctaskRows = {};
        this.ccompOptionsChoice = [];//
        this.itemHeadingComp = new ItemHeadingComp();
        this.itemOptionCompPlain = new ItemOptionCompPlain();
        this.itemOption1CompPlain = new ItemOption1CompPlain();//
        this.itemOption2CompPlain = new ItemOption2CompPlain();//
    }
    fetchCardCompPlain(i, j) {
        this.ctaskRows = taskRows[i][j];
    }
    fetchCompOptionsPlain(i, j) {
        this.cTheme = taskRows[i][j].theme_id;
        this.cLang = taskRows[i][j].lang_id;
        this.cWord = taskRows[i][j].word_id;
        getOptionsPlain(this.cTheme, this.cLang, this.cWord);
        this.ccompOptionsPlain = compOptionsPlain;
    }    
    render(i, j) {
        let itemHeadingCompHtml = '';
        let itemOptionCompPlainHtml = '';
        let itemOptionCompPlainV1Html = '';
        let itemOptionCompPlainV2Html = '';

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
        
        let itemOptionCompPlain = new ItemOptionCompPlain(
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

        let itemOptionCompPlainV1 = new ItemOption1CompPlain(
            this.ccompOptionsPlain[0].id,
            this.ccompOptionsPlain[0].theme_id,
            this.ccompOptionsPlain[0].word_id,
            this.ccompOptionsPlain[0].lang_id,
            this.ccompOptionsPlain[0].langName,
            this.ccompOptionsPlain[0].translation,
            this.ccompOptionsPlain[0].spell_base,
            this.ccompOptionsPlain[0].spell_eng,
        );

        let itemOptionCompPlainV2 = new ItemOption2CompPlain(
            this.ccompOptionsPlain[1].id,
            this.ccompOptionsPlain[1].theme_id,
            this.ccompOptionsPlain[1].word_id,
            this.ccompOptionsPlain[1].lang_id,
            this.ccompOptionsPlain[1].langName,
            this.ccompOptionsPlain[1].translation,
            this.ccompOptionsPlain[1].spell_base,
            this.ccompOptionsPlain[1].spell_eng,
        );

        this.ctaskRows = itemHeadingComp;
        this.ctaskRows = itemOptionCompPlain;
        this.ctaskRows = itemOptionCompPlainV1;
        this.ctaskRows = itemOptionCompPlainV2;
        
        itemHeadingCompHtml = itemHeadingComp.render();
        itemOptionCompPlainHtml = itemOptionCompPlain.render();
        itemOptionCompPlainV1Html = itemOptionCompPlainV1.render();
        itemOptionCompPlainV2Html = itemOptionCompPlainV2.render();

        let cardOptions = [];
        cardOptions[0] = itemOptionCompPlainHtml;
        cardOptions[1] = itemOptionCompPlainV1Html;
        cardOptions[2] = itemOptionCompPlainV2Html;
        let cardOptionsRand = randArr(cardOptions);

        let itemCompPlainHtml = itemHeadingCompHtml + cardOptionsRand[0] + cardOptionsRand[1] + cardOptionsRand[2];

        document.querySelector("#item"+`${i}`+"Comp"+`${j}`).innerHTML = itemCompPlainHtml;
    }
}

//  elements for results:
let resultEnjoy = document.getElementById("enjoy");
let resultWorry = document.getElementById("worry");

let valueEnjoy = resultEnjoy.textContent;
let valueWorry = resultWorry.textContent;
console.log("Enjoy: " + valueEnjoy);
console.log("Worry: " + valueWorry);

let totalEnjoy = [];
let totalWorry = [];



for (let i=0; i<taskRows.length; i++) {
    let optionsPlainTheme = [];

    for (let j=0; j<taskRows[i].length; j++) {
        let thisTheme = taskRows[i][j].theme_id;
        let thisWord = taskRows[i][j].word_id;
        let thisLang = taskRows[i][j].lang_id;
        let optionsPlainThemeLang = [];    
        for (let k=0; k<compWords.length; k++) {
            if (compWords[k].theme_id == thisTheme && compWords[k].word_id !== thisWord && compWords[k].lang_id == thisLang) {
                optionsPlainThemeLang.push(compWords[k]);
            }
        }

        optionsPlainTheme.push(optionsPlainThemeLang);
    }
    optionsPlain.push(optionsPlainTheme);

}

console.log("Options Plain : ");
console.log(optionsPlain);

console.log("Random option Plain: ");


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

    let rowTheme = taskRows[i][0].theme_id;
    let rowWord = taskRows[i][0].word_id;
   
    for (let j=0; j < taskRows[i].length; j++) {
        let optionLang = taskRows[i][j].lang_id;
        let optionsPlain = [];

        optionsPlain[j] = taskRows[i][j];
        optionsPlain[j].isRight = true;
    }

    taskRowsOptions.push(taskRows[i]);
}

console.log("Task rows options :");
console.log(taskRowsOptions);

//Function get random comp options from comp words array by theme and lang

function getOptionsPlain(themeId, langId, wordId) {
    compOptionsPlain = [];
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
    compOptionsPlain.push(option1, option2);

    return compOptionsPlain;
}

//Function for Rows counter
let rowsList = document.getElementsByClassName("task-mode");
let rowsNum = rowsList.length;
console.log("Rows num = " + rowsNum);

////Function for  any rows render

// array - example from taskRows[]
console.log('All rows number (taskRows.length) : ' + taskRows.length);
let taskRowsTest = [];
let arrNum = (taskRows.length - 1);   // numbering of rows in the render list == (arrNum+1)

for (let m=0; m <= arrNum; m++) {
    taskRowsTest[m] = taskRows[m];
}

console.log("array Task rows test for render: ");
console.log(taskRowsTest);
console.log("taskRowsTest length : " + taskRowsTest.length);


function createRow(index) {
    let rowsBlock = document.getElementById("taskModePlain");
    let rowItem = document.createElement("div");    // create row i
    rowItem.classList.add("task-mode");//
    rowItem.setAttribute('name', 'row'+`${index}`);
    rowItem.setAttribute('id', 'item'+`${index}`);
    rowsBlock.appendChild(rowItem);
}


function pageRowsCompPlainDom(firstIndex, lastIndex) {
    for (let i=firstIndex; i < (lastIndex); i++) {
        for (let j=0; j < (taskRowsTest[i].length); j++) {
            let wordNum = taskRowsTest[i][j].word_id;
            compOptionsPlain = [];
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

                item.setAttribute('name', 'item'+`${i}`+'CardComp'+`${j}`+'Plain');
                item.setAttribute('id', 'item'+`${i}`+'Comp'+`${j}`);
                parentItem.appendChild(item);

                const cardCompPlainHtml = new CardCompPlain();    // render lang's card i,j
                item = cardCompPlainHtml;
                item.fetchCardCompPlain(i,j);
                item.fetchCompOptionsPlain(i,j);//
                item.render(i,j);
                
                let cardLang = document.getElementsByName("item"+`${i}`+"CardComp"+`${j}`+"Plain");

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

