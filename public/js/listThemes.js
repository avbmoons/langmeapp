class ThemeItem {
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
        this.title_base = title_base,
        this.description = description,
        this.status = status;
    }
    render() {
        return `<div class="combo-list-item" name="theme${this.id}">
                    <input class="combo-list-input" type="checkbox" id="theme${this.id}" name="themeList" value="${this.title}" data-id=${this.id}>
                    <label for="theme${this.id}">${this.title}</label>
                </div>`;
    }
}

class ThemeList {
    constructor() {
        this.cthemes = [];
    }
    fetchTheme() {
        //this.cthemes = themes.filter(item => item.status == 1);
        this.cthemes = themes;  // themes.filter(item => item.status == 'active');
    }
    render() {
        let listHtmlTheme = '';
        this.cthemes.forEach( cthemes => {
            const themeItem = new ThemeItem(
                cthemes.id,
                cthemes.code,
                cthemes.title,
                cthemes.title_base,
                cthemes.description,
                cthemes.status,
            );
            listHtmlTheme += themeItem.render();
        });
        document.querySelector('#themeChoiceList').innerHTML = listHtmlTheme;
    }
}

const listTheme = new ThemeList();
listTheme.fetchTheme();
listTheme.render();
