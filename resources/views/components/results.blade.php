<div class="results-cover" id="resultsModal" style="display: flex;">
  <div class="results">
    <div class="results-header">
      <img src="{{ Vite::asset('resources/images/images/logo-front-modal-light.png')}}" alt="logo">
      <a href="">
        <button id="resultsClose" onclick="closeModalResults()">
          <img src="{{ Vite::asset('resources/images/icons/icon-close.png')}}" alt="close">
        </button>
      </a>
    </div>
    <div class="results-main" id="resultsMain">
      <div class="results-mode">
        <div class="results-totals title">
          <p class="totals-title">Choice mode:</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Enjoy:&nbsp;</p>
          <p class="totals-text" id="enjoyChoice">0</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Worry:&nbsp;</p>
          <p class="totals-text" id="worryChoice">0</p>
        </div>
      </div>
      <div class="results-mode">
        <div class="results-totals title">
          <p class="totals-title">Mix mode:</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Enjoy:&nbsp;</p>
          <p class="totals-text" id="enjoyMix">0</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Worry:&nbsp;</p>
          <p class="totals-text" id="worryMix">0</p>
        </div>
      </div>
      <div class="results-mode">
        <div class="results-totals title">
          <p class="totals-title">Lang mode:</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Enjoy:&nbsp;</p>
          <p class="totals-text" id="enjoyLang">0</p>
        </div>
        <div class="results-totals">
          <p class="totals-text">Worry:&nbsp;</p>
          <p class="totals-text" id="worryLang">0</p>
        </div>
      </div>
      <div class="results-mode">
        <div class="results-totals title">
          <p class="grand-title">Grand totals:</p>
        </div>
        <div class="results-totals">
          <p class="grand-text">Enjoy:&nbsp;</p>
          <p class="grand-text" id="enjoyGrand">0</p>
        </div>
        <div class="results-totals">
          <p class="grand-text">Worry:&nbsp;</p>
          <p class="grand-text" id="worryGrand">0</p>
        </div>
      </div>
    </div>
    <div class="results-button">
      <a href="">
        <button class="btn-ok" onclick="closeModalResults()">OK</button>
      </a>
      <a href="">
        <button class="btn-ok" id="getPdf" onclick="window.print()">Get PDF</button>
      </a>
    </div>
  </div>
</div>