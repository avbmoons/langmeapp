class ModeItem {
    constructor (
        id,
        code,
        title,  //modeName,
        description,
        status,
    ) {
        this.id = id;
        this.code = code;
        this.title = title;
        this.description = description;
        this.status = status;
    }
    render() {
        return `<input type="radio" class="mode-button" name="modeButton" class="mode-button" id="setMode${this.title}" data-id=${this.id} value=${this.title}>
                <label for="setMode${this.title}" class="mode-button-label">${this.title}</label>`;
    }
}

class ModeList {
    constructor() {
        this.cmodes = [];
    }
    fetchMode() {
        //this.cmodes = modes.filter(item => item.status == 1);
        this.cmodes = modes;    // modes.filter(item => item.status == 'active');
    }
    render() {
        let listHtmlMode = '';
        this.cmodes.forEach( cmodes => {
            const modeItem = new ModeItem(
                cmodes.id,
                cmodes.code,
                cmodes.title,
                cmodes.description,
                cmodes.status,
            );
            listHtmlMode += modeItem.render();
        });
        document.querySelector('#modeChoice').innerHTML = listHtmlMode;
    }
}

const listMode = new ModeList();
listMode.fetchMode();
listMode.render();
