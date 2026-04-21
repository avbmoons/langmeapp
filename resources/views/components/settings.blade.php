      <form class="modal-settings" id="settings" action="" method="get">
        <div class="info">
          <div class="info-header">
            <img src="{{ Vite::asset('resources/images/images/logo-front-modal-light.png')}}" alt="logo" />
            <p class="modal-title">Choose settings for your task</p>
            <button onclick="closeModalSettings()">
              <img src="{{ Vite::asset('resources/images/icons/icon-close.png')}}" />
            </button>
          </div>
          <div class="info-main">
            <div class="combo-block" id="primLangBlock">
              <label class="combo-label" for="primLang">Primary language:</label>
              <input class="combo-input" type="text" id="primLang" name="primLang" placeholder="Select the primary language..." readonly/>
              <button type="button" class="combo-button" id="btnOpenPrimLang" onclick="openPrimLangsChoiceList()">...</button>
              <div class="combo-list" id="primLangChoice">
                <div class="combo-list-item" name="choose">
                  <input class="combo-list-input search" id="inputPrim" type="text"/>
                  <button type="button" class="btn-choose" onclick="closePrimLangsChoiceList()">Choose</button>
                </div>
                <div class="combo-list-choice" id="primLangChoiceList"></div>
              </div>
            </div>
            <div class="combo-block" id="compLangBlock">
              <label class="combo-label" for="compLang">Compared language:</label>
              <input class="combo-input" type="text" id="compLang" name="compLangInput" placeholder="Select the compared language..." readonly/>
              <button type="button" class="combo-button" id="btnOpenCompLang" onclick="openCompLangsChoiceList()">...</button>
              <div class="combo-list" id="compLangChoice">
                <div class="combo-list-item" name="choose">
                  <input class="combo-list-input search" id="inputComp" type="text"/>
                  <button type="button" class="btn-choose" onclick="closeCompLangsChoiceList()">Choose</button>
                </div>
                <div class="combo-list-choice" id="compLangChoiceList"></div>
              </div>
            </div>
            <div class="combo-block" id="themesBlock">
              <label class="combo-label" for="themeList">Themes:</label>
              <input class="combo-input" type="text" id="themeList" name="themes" placeholder="Select themes of words..." readonly/>
              <button type="button" class="combo-button" id="btnOpenThemes" onclick="openThemesChoiceList()">...</button>
              <div class="combo-list" id="themeChoice">
                <div class="combo-list-item" name="themeList">
                  <input class="combo-list-input search" id="inputThemes" type="text"/>
                  <button type="button" class="btn-choose" onclick="closeThemesChoiceList()">Choose</button>
                </div>
                <div class="combo-list-item" name="allThemes" id="allThemesCombo">
                  <input class="combo-list-input" type="checkbox" id="allThemes" name="themeList" value="allThemes"/>
                  <label for="allThemes">All themes</label>
                </div>
                <div class="combo-list-choice" id="themeChoiceList"></div>
              </div>
            </div>
            <div class="combo-block" id="modeButtonsBlock">
              <label class="combo-label mode" for="modeChoice">Mode:</label>
              <div class="combo-block-choice" id="modeChoice"></div>
              <button type="button" class="combo-button" onclick="choosedModeItemRadio('modeButton', 'resultMode')">&check;</button>
            </div>
            <div class="combo-block" id="userChoiceBlock">
              <label class="combo-label choice" for="userChoice">Your choice:</label>
              <div class="user-choice" id="userChoice">
                <div class="user-choice-result">
                  <label class="result-label" for="resultPrim">Primary: </label>
                  <input class="result-field" type="text" id="resultPrim" name="resultPrim"/>
                </div>
                <div class="user-choice-result">
                  <label class="result-label" for="resultComp">Compared:</label>
                  <textarea class="result-field" name="resultComp" id="resultComp" readonly></textarea>
                </div>
                <div class="user-choice-result">
                  <label class="result-label" for="resultThemes">Themes:</label>
                  <textarea class="result-field" name="resultThemes" id="resultThemes" readonly></textarea>
                </div>
                <div class="user-choice-result">
                  <label class="result-label" for="resultMode">Mode: </label>
                  <input class="result-field" type="text" id="resultMode" name="resultMode"/>
                </div>
              </div>
            </div>
          </div>
          <div class="info-button">
            <button type="button" class="btn-go" id="btnSubmitTaskSettings" >Confirm</button>
          </div>
        </div>
      </form>

