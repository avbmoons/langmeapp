class PrimLangItem {
    constructor (
        id,
        code,   //
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
    render() {
        return `<div class="combo-list-item" name="item${this.alias}">
                    <input class="combo-list-input" type="radio" id="prim${this.alias}" name="primLang" value="${this.title} - ${this.native}" data-id=${this.id}>
                    <label for="prim${this.alias}">${this.title} - ${this.native}</label>
                </div>`;
    }
}

class CompLangItem {
    constructor (
        id,
        code,
        title,
        native,
        alias,
        status,
        position,
    ) {
        this.id = id;
        this.code = code;
        this.title = title;
        this.native = native;
        this.alias = alias;
        this.status = status;
        this.position = position;
    }
    render() {
        return `<div class="combo-list-item" name="item${this.alias}">
                    <input class="combo-list-input" type="checkbox" id="comp${this.alias}" name="compLang" value="${this.title}"  data-id=${this.id}>
                    <label for="comp${this.alias}">${this.title} - ${this.native}</label>
                </div>`;
    }
}

class AppLangItem {
    constructor (
        id,
        code,
        title,
        native,
        alias,
        status,
        position,
    ) {
        this.id = id;
        this.code = code;
        this.title = title;
        this.native = native;
        this.alias = alias;
        this.status = status;
        this.position = position;
    }
    render() {
        return `<button class="menu-item header" id="appLang${this.alias}" onclick="closeAppLangChoiceList()">${this.alias}</button>`;
    }
}

class PrimLangList {
    constructor() {
        this.clangs = [];
    }
    fetchPrimLang() {
        //this.clangs = langs.filter(item => item.status == 1);
        this.clangs = langs;    //langs.filter(item => item.status == 'active');
    }
    render() {
        let listHtmlPrimLang = '';
        this.clangs.forEach( clangs => {
            const primLangItem = new PrimLangItem(
                clangs.id,
                clangs.code,
                clangs.title,
                clangs.native,
                clangs.alias,
                clangs.status,
                clangs.position,
            );
            listHtmlPrimLang += primLangItem.render();
        });
        document.querySelector('#primLangChoiceList').innerHTML = listHtmlPrimLang;
    }
}

class CompLangList {
    constructor() {
        this.clangs = [];
    }
    fetchCompLang() {
        //this.clangs = langs.filter(item => item.status == 1);
        this.clangs = langs.filter(item => item.status == 'active');
    }
    render() {
        let listHtmlCompLang = '';
        this.clangs.forEach( clangs => {
            const compLangItem = new CompLangItem(
                clangs.id,
                clangs.code,
                clangs.title,
                clangs.native,
                clangs.alias,
                clangs.status,
                clangs.position,
            );
            listHtmlCompLang += compLangItem.render();
        });
        document.querySelector('#compLangChoiceList').innerHTML = listHtmlCompLang;
    }
}

class AppLangList {
    constructor() {
        this.clangs = [];
    }
    fetchAppLang() {
        this.clangs = langs;
    }
    render() {
        let listHtmlAppLang = '';
        for (let i=0; i<2; i++) {
            const appLangItem = new AppLangItem(
                this.clangs[i].id,
                this.clangs[i].code,
                this.clangs[i].title,
                this.clangs[i].native,
                this.clangs[i].alias,
                this.clangs[i].status,
                this.clangs[i].position,
            );
            listHtmlAppLang += appLangItem.render();
        };
        document.querySelector('#appLangChoice').innerHTML = listHtmlAppLang;
    }
}

const listPrimLang = new PrimLangList();
listPrimLang.fetchPrimLang();
listPrimLang.render();

const listCompLang = new CompLangList();
listCompLang.fetchCompLang();
listCompLang.render();

const listAppLang = new AppLangList();
listAppLang.fetchAppLang();
listAppLang.render();